<h3>Параметры рейса</h3>
<label>Время отправления: </label><input type="text" id="time_dep" value="<?=(isset($_POST['time_dep']))? $_POST['time_dep']:''?>"/><br />
<label>Время прибытия: </label><input type="text" id="time_arr" value="<?=(isset($_POST['time_arr']))? $_POST['time_arr']:''?>"/><br />
<label>Пункт отправления: </label><input type="text" id="point_dep" value="<?=(isset($_POST['point_dep']))? $_POST['point_dep']:''?>"/><br />
<label>Пункт прибытия: </label><input type="text" id="point_arr" value="<?=(isset($_POST['point_arr']))? $_POST['point_arr']:''?>"/><br />
<label>Количество мест: </label><input type="text" id="place" value="<?=(isset($_POST['place']))? $_POST['place']:''?>"/><br />
<?php if ( isset($_POST['id']) ): ?>
<button id="btn-flight-update-ok">Ok</button>
<script type="text/javascript">
    $('#btn-flight-update-ok').click(function(){
    var id = <?=$_POST['id']?>;
    var time_dep = "'"+$('#time_dep').val()+"'";
    var time_arr = "'"+$('#time_arr').val()+"'";
    var point_dep = "'"+$('#point_dep').val()+"'";
    var point_arr = "'"+$('#point_arr').val()+"'";
    var place = "'"+$('#place').val()+"'";
    
    $('#data').load('modules/flight_edit.php',{update:'1',id:id,time_dep:time_dep,time_arr:time_arr,point_dep:point_dep,point_arr:point_arr,place:place});
});
</script>
<?php else: ?>
<button id="btn-flight-create-ok">Ok</button>
<?php endif;?>
<button id="btn-flight-new-cancel">Отмена</button>

<script type="text/javascript" src="js/flight_edit_form.js"></script>
 
