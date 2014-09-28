<?php

require_once('db.func.php');

$idPassenger = ( isset( $_POST['idPassenger']) )? $_POST['idPassenger'] : 0;
$idTicket = ( isset( $_POST['idTicket']) )? $_POST['idTicket'] : 0;
$currRow = null;

/*delete*/
if ( isset( $_POST['del']) )
{
    $sql = 'DELETE FROM ticket WHERE id='.$_POST['idTicket'];
    dbQuery($sql);
}

/*add*/
if ( isset( $_POST['add']) )
{
    $date = $_POST['ticketDate'];
    $idFlight = $_POST['idFlight'];
    $sql = "INSERT INTO ticket (flight_id,passenger,date_dep) VALUES ($idFlight, $idPassenger, '$date')";
    dbQuery($sql);
}

$sql = 'SELECT * from passenger';
$array1 = dbGetQueryResult($sql);

?>
<h2>Оформление билетов</h2>
<h3>Пассажиры</h3>
<table id="passenger-ticket-table" class="table table-bordered table-striped">
<tr>
    <th>id</th>
    <th>Имя</th>
    <th>Фамилия</th>
    <th>Пол</th>
    <th>Возраст</th>
    <th>Паспорт</th>
</tr>
<?php foreach ( $array1 as $row1 ): if ( $idPassenger == 0 ) $idPassenger = $row1['id'];?>
    <tr <?php if($row1['id'] == $idPassenger) { echo 'class="active"'; $currRow = $row1; }?> id="<?=$row1['id']?>">
    <?php foreach ( $row1 as $col ): ?>
        <td><?=$col?></td>
    <?php endforeach;?>
    </tr>
<?php endforeach;?>

</table>

<?php 
    $sql = "SELECT ticket.id,ticket.date_dep,flight.time_dep,flight.time_arr,flight.point_dep, flight.point_arr, flight.place FROM ticket, flight WHERE ticket.passenger=$idPassenger AND ticket.flight_id=flight.id";
    $array2 = dbGetQueryResult($sql);
?>

<h3>Билеты у данного человека</h3>
<table id="ticket-edit-table" class="table table-bordered table-striped">
<tr>
    <th>id</th>
    <th>Дата вылета</th>
    <th>Время вылета</th>
    <th>Время прилета</th>
    <th>Пункт отправления</th>
    <th>Пункт назначения</th>
    <th>Количество мест</th>
</tr>

<?php foreach ( $array2 as $row2 ): if ( $idTicket == 0 ) $idTicket = $row2['id'];?>
    <tr <?php if($row2['id'] == $idTicket)  echo 'class="active"';?> id="<?=$row2['id']?>">
    <?php foreach ( $row2 as $col ): ?>
        <td><?=$col?></td>
    <?php endforeach;?>
    </tr>
<?php endforeach;?>

</table>

<button id="btn-ticket-add">Оформить билет</button>
<button id="btn-ticket-del">Сдать билет</button>

<script type="text/javascript">
    var activePassenger = $('#passenger-ticket-table tr.active');
    var idPassenger = activePassenger.attr('id');
    var activeTicket = $('#ticket-edit-table tr.active');
    var idTicket = activeTicket.attr('id');
    
    
    $('#passenger-ticket-table tr').click(function(){
        idPassenger = this.id;
        idTicket = 0;
        $('#data').load('modules/ticket_edit.php',{idTicket:idTicket,idPassenger:idPassenger});
    });
    
    
    $('#ticket-edit-table tr').click(function(){
        idTicket = this.id;
        $('#data').load('modules/ticket_edit.php',{idTicket:idTicket,idPassenger:idPassenger});
    });
    
    $('#btn-ticket-del').click(function(){
        $('#data').load('modules/ticket_edit.php',{del:'1', idTicket:idTicket,idPassenger:idPassenger});
    });
    
    $('#btn-ticket-add').click(function(){
        $('#data').load('modules/ticket_edit_form.php',{
            idPassenger:idPassenger
        });
    });
</script>

