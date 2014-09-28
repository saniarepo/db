<?php

require_once('db.func.php');

$id = ( isset( $_POST['id']) )? $_POST['id'] : 0;
$currRow = null;

/*delete*/
if ( isset($_POST['del']) )
{
    $sql = 'DELETE FROM passenger WHERE id='.$_POST['del'];
    dbQuery($sql);
    $sql = 'DELETE FROM ticket WHERE passenger='.$_POST['del'];
    dbQuery($sql);
}

/*add*/
if ( isset($_POST['add']) )
{
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $passport = $_POST['passport'];
    $sql = "INSERT INTO passenger ( name,lastname,sex,age,passport ) VALUES ('$name','$lastname','$sex','$age','$passport')";
    dbQuery($sql);
}

/*update*/

if ( isset($_POST['update']) )
{
    $passenger_id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $passport = $_POST['passport'];
    $sql = "UPDATE passenger SET name = $name, lastname = $lastname, sex = $sex, age=$age, passport=$passport WHERE id = $passenger_id";
    dbQuery($sql);
}

$sql = 'SELECT * from passenger';
$array1 = dbGetQueryResult($sql);

?>

<h3>Пассажиры</h3>
<table id="passenger-edit-table" class="table table-bordered table-striped">
<tr>
    <th>id</th>
    <th>Имя</th>
    <th>Фамилия</th>
    <th>Пол</th>
    <th>Возраст</th>
    <th>Паспорт</th>
</tr>
<?php foreach ( $array1 as $row1 ): if ( $id == 0 ) $id = $row1['id'];?>
    <tr <?php if($row1['id'] == $id) { echo 'class="active"'; $currRow = $row1; }?> id="<?=$row1['id']?>">
    <?php foreach ( $row1 as $col ): ?>
        <td><?=$col?></td>
    <?php endforeach;?>
    </tr>
<?php endforeach;?>

</table>

<button id="btn-passenger-del">Удалить</button>
<button id="btn-passenger-edit">Редактировать</button>
<button id="btn-passenger-create">Новый</button>

<script type="text/javascript" src="js/passenger_edit.js"></script>
<script type="text/javascript">
$('#btn-passenger-edit').click(function(){
    $('#data').load('modules/passenger_edit_form.php',{
        <?php foreach( $currRow as $key => $val ):?>
            <?=$key.':'."'".$val."'".','?>
        <?php endforeach;?>
    });
});
</script>

