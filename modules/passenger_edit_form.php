<h3>Данные пассажира</h3>
<label>Имя: </label><input type="text" id="name" value="<?=(isset($_POST['name']))? $_POST['name']:''?>"/><br />
<label>Фамилия: </label><input type="text" id="lastname" value="<?=(isset($_POST['lastname']))? $_POST['lastname']:''?>"/><br />
<label>Пол: </label>
<select id="sex">
    <option  <?php if(isset($_POST['sex']) && $_POST['sex'] =='муж') echo 'selected';?> value="муж" >муж</option>
    <option <?php if(isset($_POST['sex']) && $_POST['sex'] =='жен') echo 'selected';?> value="жен"  >жен</option>

</select>
<br />
<label>Возраст: </label><input type="text" id="age" value="<?=(isset($_POST['age']))? $_POST['age']:''?>"/><br />
<label>Паспорт: </label><input type="text" id="passport" value="<?=(isset($_POST['passport']))? $_POST['passport']:''?>"/><br />
<?php if ( isset($_POST['id']) ): ?>
<button id="btn-passenger-update-ok">Ok</button>
<script type="text/javascript">
    $('#btn-passenger-update-ok').click(function(){
    var id = <?=$_POST['id']?>;
    var name = "'"+$('#name').val()+"'";
    var lastname = "'"+$('#lastname').val()+"'";
    var sex = "'"+$('#sex').val()+"'";
    var age = "'"+$('#age').val()+"'";
    var passport = "'"+$('#passport').val()+"'";
    
    $('#data').load('modules/passenger_edit.php',{update:'1',id:id,name:name,lastname:lastname,sex:sex,age:age,passport:passport});
});
</script>
<?php else: ?>
<button id="btn-passenger-create-ok">Ok</button>
<?php endif;?>
<button id="btn-passenger-new-cancel">Отмена</button>

<script type="text/javascript" src="js/passenger_edit_form.js"></script>
 
