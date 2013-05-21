<div>Привет, <strong><?=(isset($username)) ? $username : 'Незнакомец'?></strong>
    <?php if(isset($roles)){?>
    <small>(Роли:<em>
            <?php
                $text_roles = '';
                foreach($roles as $role)
                {
                    $text_roles .= '<abbr class="ttd" rel="tooltip" title="'.$role->description.'">'.$role->name.'</abbr>, ';
                }
                $text_roles = substr($text_roles, 0 , -2);
                echo $text_roles;
            ?>
        </em>)</small>
    <?php
    }
    ?><br>
    <?=HTML::anchor('logout', 'Выйти из системы', array('class' => 'btn btn-small'))?>
</div>