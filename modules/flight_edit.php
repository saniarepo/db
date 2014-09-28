<?php

require_once('db.func.php');

$id = ( isset( $_POST['id']) )? $_POST['id'] : 0;
$currRow = null;

/*delete*/
if ( isset($_POST['del']) )
{
    $sql = 'DELETE FROM flight WHERE id='.$_POST['del'];
    dbQuery($sql);
    $sql = 'DELETE FROM ticket WHERE flight_id='.$_POST['del'];
    dbQuery($sql);
}

/*add*/
if ( isset($_POST['add']) )
{
    $time_dep = $_POST['time_dep'];
    $time_arr = $_POST['time_arr'];
    $point_dep = $_POST['point_dep'];
    $point_arr = $_POST['point_arr'];
    $place = $_POST['place'];
    $sql = "INSERT INTO flight ( time_dep,time_arr,point_dep,point_arr,place ) VALUES ('$time_dep','$time_arr','$point_dep','$point_arr',$place)";
    dbQuery($sql);
}

/*update*/

if ( isset($_POST['update']) )
{
    $flight_id = $_POST['id'];
    $time_dep = $_POST['time_dep'];
    $time_arr = $_POST['time_arr'];
    $point_dep = $_POST['point_dep'];
    $point_arr = $_POST['point_arr'];
    $place = $_POST['place'];
    $sql = "UPDATE flight SET time_dep = $time_dep, time_arr = $time_arr, point_dep = $point_dep, point_arr=$point_arr, place=$place WHERE id = $flight_id";
    dbQuery($sql);
}

$sql = 'SELECT * from flight';
$array1 = dbGetQueryResult($sql);

?>

<h3>Рейсы</h3>
<table id="flight-edit-table" class="table table-bordered table-striped">
<tr>
    <th>id</th>
    <th>Время вылета</th>
    <th>Время прилета</th>
    <th>Пункт отправления</th>
    <th>Пункт назначения</th>
    <th>Количество мест</th>
</tr>
<?php foreach ( $array1 as $row1 ): if ( $id == 0 ) $id = $row1['id'];?>
    <tr <?php if($row1['id'] == $id) { echo 'class="active"'; $currRow = $row1; }?> id="<?=$row1['id']?>">
    <?php foreach ( $row1 as $col ): ?>
        <td><?=$col?></td>
    <?php endforeach;?>
    </tr>
<?php endforeach;?>

</table>

<button id="btn-flight-del">Удалить</button>
<button id="btn-flight-edit">Редактировать</button>
<button id="btn-flight-create">Новый</button>

<script type="text/javascript" src="js/flight_edit.js"></script>
<script type="text/javascript">
$('#btn-flight-edit').click(function(){
    $('#data').load('modules/flight_edit_form.php',{
        <?php foreach( $currRow as $key => $val ):?>
            <?=$key.':'."'".$val."'".','?>
        <?php endforeach;?>
    });
});
</script>