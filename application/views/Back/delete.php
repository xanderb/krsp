<script type="text/javascript">
    $(function(){
       $('button#delete').click(function($e){
           if(confirm('Вы действительно хотите удалить значение?')){
                return true;
           }else{
                document.location.href = "<?=$back_path?>";
                return false;
           }
       });
    });
</script>


    <p><a class="btn" href="<?=$back_path?>"><?=$back_path_text?></a></p>
    <?php
    echo Form::open('', array('id' => 'period-form'));
    echo Form::hidden('id', (isset($id)) ? $id: NULL);
    ?>
    <button class="btn btn-danger" id="delete" name="delete"><?=$delete_text?></button>
    <?php
    echo Form::close();
    ?>
