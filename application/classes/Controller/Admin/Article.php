<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 23.04.13
 * Time: 17:15
 * To change this template use File | Settings | File Templates.
 */

class Controller_Admin_Article extends Controller_Back implements Controller_Admin_Crud {
    public $t_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
        ),
        array(
            'text'  => 'Номер, часть, пункт статьи',
            'field' => 'value'
        ),
        array(
            'text'  => 'Описание статьи',
            'field' => 'text',
        ),
        array(
            'text'  => 'Порядок сортировки',
            'field' => 'sort'
        ),
    );

    public $badges = array(
        array(
            'text'  => 'Всего статей в базе',
            'class' => 'badge-info'
        ),
    );


    public $menu_to_cp = array(
        array(
            'href'  => '/admin/',
            'text'  => '<i class="icon-arrow-left icon-white"></i> Вернуться в контрольную панель'
        ),
        array(
            'href'  => '/admin/material',
            'text'  => '<i class="icon-th-list icon-white"></i> Материалы',
            'class' => 'btn-info'
        )
    );

    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/admin/article',
            'type' => 'n'
        ),

    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/admin/article/add',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-pencil"></i> Редактировать',
            'href'  => '/admin/article/edit',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-trash"></i> Удалить',
            'href'  => '/admin/article/delete',
            'type'  => 'y'
        ),
    );

    public function action_index()
    {
        $this->addScript('admin-table');
        $page = Request::$current->param('page');
        $total_items = ORM::factory('Article')->find_all()->count();

        $table_view = View::factory('/back/table');
        $table_view->sub_admin_menus = $this->sub_menus;    //Меню выводимое над таблицей
        $table_view->t_headers = $this->t_headers;  //Имя полей в таблице и их текстовое описание
        $table_view->caption = "Статьи";

        $article = ORM::factory('Article')
            ->order_by('sort', 'ASC')
            ->limit($this->config->items_per_page)
            ->offset((isset($page) ? ($page-1)*$this->config->items_per_page : 0))
            ->find_all();
        $table_view->datas = $article;
        $table_view->badges = $this->badges;
        $table_view->total_items = array($total_items);

        if(ceil($total_items / $this->config->items_per_page) > 1){
            $table_view->paginator = Help::render_paginator('article', $this->back_menu[0]['href'], $page, $total_items); //добавление постраничной навигации
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Статьи УК РФ'; //заголовок выводимый на страницу в h1
        $admin_view->content = $table_view;
        $admin_view->admin_menus = $this->menu_to_cp;

        $this->template->body = $admin_view;
    }

    public function action_add()
    {
        $this->addScript('admin-form');
        if(isset($_POST['text']))
        {
            $text = Arr::get($_POST, 'text');
            $value = Arr::get($_POST, 'value');
            $article = ORM::factory('Article');
            $article->value = $value;
            $article->text = $text;

            $last_article = ORM::factory('Article')->order_by('sort', 'DESC')->find();
            $article->sort = $last_article->sort + 1;
            try
            {
                $article->save();
                $content = View::factory('/back/accept');
                $content->message = 'Запись успешно добавлена';
                $content->back_path = '/admin/article';
                $content->back_path_text = 'Вернуться назад к статьям';
            }
            catch (ORM_Validation_Exception $e)
            {
                $content = View::factory('/back/edit_article');
                $content->sub_menus = $this->back_menu;
                $content->data = $article;
                $content->legend = 'Форма добавления статьи';
                $content->error = $e->errors('validation');
            }
        }
        else
        {
            $content = View::factory('/back/edit_article');
            $content->legend = 'Форма добавления статьи';
            $content->sub_menus = $this->back_menu;
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Добавление статьи';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_edit()
    {
        $this->addScript('admin-form');
        if(isset($_POST['text'])){
            $id = Arr::get($_POST, 'id');
            $text = Arr::get($_POST, 'text');  //TODO сделать nr2br для сохранения html-ных переносов строк
            $value = Arr::get($_POST, 'value');
            $sort =  Arr::get($_POST, 'sort');
            $article = ORM::factory('Article', $id);
            $article->value = $value;
            $article->text = $text;
            $article->sort = $sort;

            if($article->save()){
                $content = View::factory('/back/accept');
                $content->message = 'Запись успешно изменена';
                $content->back_path = '/admin/article';
                $content->back_path_text = 'Вернуться назад к списку статей';
            }else{
                $content = View::factory('/back/edit_article');
                $content->sub_menus = $this->back_menu;
                $content->data = $article;
                $content->legend = 'Форма редактирования статьи';

                $content->error = "Ошибка при сохранении. Введены не правильные данные или нет доступа к базе данных. Повторите попытку позже!";
            }
        }else{
            $id = $this->request->param('id');
            if(!isset($id)){
                $content = View::factory('/back/error');
                $content->message = 'Необходимо выбрать строку для редактирования';
                $content->back_path = '/admin/article';
                $content->back_path_text = 'Вернуться назад';
            }else{
                $content = View::factory('/back/edit_article');
                $content->sub_menus = $this->back_menu;
                $content->legend = 'Форма редактирования статьи';

                $article = ORM::factory('Article', $id);
                $content->data = $article;
            }
        }


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Редактирование статей';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_delete()
    {
        $id = Request::$current->param('id');
        if(isset($_POST['id'])){
            $article = ORM::factory('Article', $id);
            try{
                $article->delete();
                $content = View::factory('back/accept');
                $content->message = 'Запись успешно удалена';
                $content->back_path = '/admin/article';
                $content->back_path_text = 'Вернуться назад к списку статей';
            }catch(Exception $e){
                $content = View::factory('/back/error');
                $content->message = $e->getMessage();
                $content->back_path = '/admin/article';
                $content->back_path_text = 'Вернуться назад';
            }
        }else{
            if(!isset($id)){
                $content = View::factory('/back/error');
                $content->message = 'Необходимо выбрать строку для удаления';
                $content->back_path = '/admin/article';
                $content->back_path_text = 'Вернуться назад';
            }else{
                $article = ORM::factory('Article', $id);
                $content = View::factory('/back/delete');
                $content->id = $id;
                $content->delete_text = "Удалить статью ".$article->value." \"".$article->text."\" из списка статей";
                $content->back_path = '/admin/article';
                $content->back_path_text = 'Вернуться назад';
            }
        }


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Удаление статьи';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }
}