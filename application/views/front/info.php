<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 27.05.13
 * Time: 18:40
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="span12">
    <h1>Подробная информация о сообщении</h1>
    <div class="row-fluid">
        <div class="span6">
            <table class="table table-striped">
                <tbody>
                <?php
                if(!isset($material))
                {
                    ?>
                    <tr><td colspan="2">Не передан материал</td></tr>
                    <?php
                }
                else
                {
                    ?>
                    <tr>
                        <td class="first"><span>№ КРСП</span></td>
                        <td><?=$material->krsp_num?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Дата регистрации сообщения</span></td>
                        <td><?=date('d.m.Y H:i:s', strtotime($material->registration_date))?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Источник сообщения</span></td>
                        <td><?=$material->source->text?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Краткая фабула</span></td>
                        <td><?=$material->plot?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Характеристики сообщения</span></td>
                        <td><?php
                            $chars = $material->characteristic->find_all();
                            ?>
                            <ul>
                                <?php
                                foreach($chars as $char){
                                    ?>
                                    <li><?=$char->text?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="first"><span>Статья УК</span></td>
                        <td><?=$material->article->value.' - '.$material->article->text?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Следователь</span></td>
                        <td><?=$material->inv->name?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Решение по сообщению</span></td>
                        <td><?=$material->decree->text?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Дата принятия решения</span></td>
                        <td><?=date('d.m.Y H:i:s', strtotime($material->decree_date))?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Срок рассмотрения сообщения</span></td>
                        <td><?=$material->period->days.' дня(ей)'?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Причина отказа</span></td>
                        <td><?=$material->failure_cause->text?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>Дата отмены решения</span></td>
                        <td><?=date('d.m.Y H:i:s', strtotime($material->decree_cancel_date))?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>(ДОП) Следователь</span></td>
                        <td><?=$material->extra_inv->name?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>(ДОП) Срок рассмотрения</span></td>
                        <td><?=$material->extra_period->days.' дня(ей)'?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>(ДОП) Решение по сообщению</span></td>
                        <td><?=$material->extra_decree->text?></td>
                    </tr>
                    <tr>
                        <td class="first"><span>(ДОП) Дата принятия решения</span></td>
                        <td><?=date('d.m.Y H:i:s', strtotime($material->extra_decree_date))?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-actions">
        <a class="btn" href="/">Назад</a>
        <?php
        if(isset($material) AND isset($auth) AND ($auth->logged_in($roles['front_edit']) OR $auth->logged_in('admin')))
        {
            ?>
            <a class="btn btn-primary" href="/material/edit/<?=$material->id?>">Редактировать</a>
            <?php
        }
        ?>
        <?php
        if(isset($material) AND isset($auth) AND $auth->logged_in('admin'))
        {
            ?>
            <a class="btn btn-info" href="/material/logs/<?=$material->id?>">Посмотреть логи изменения сообщения</a>
        <?php
        }
        ?>

    </div>
</div>