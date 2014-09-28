<?php

    require_once('db.func.php');
    
    $idFlight = ( isset($_POST['idFlight']) )? $_POST['idFlight'] : 0;
    $idPassenger = ( isset($_POST['idPassenger']) )? $_POST['idPassenger'] : 0;
   
   $sql = 'SELECT * from passenger WHERE id='.$idPassenger;
   $array1 = dbGetQueryResult($sql);
    
    
?>
    <h3>Пассажир</h3>
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
        <tr>
        <?php foreach ( $row1 as $col ): ?>
            <td><?=$col?></td>
        <?php endforeach;?>
        </tr>
    <?php endforeach;?>

</table>

<?php
    $sql = 'SELECT * FROM flight';
    $array2 = dbGetQueryResult($sql);
?>
<h3>Выбрать рейс</h3>
<table id="ticket-flight-table" class="table table-bordered table-striped">
<tr>
    <th>id</th>
    <th>Время вылета</th>
    <th>Время прилета</th>
    <th>Пункт отправления</th>
    <th>Пункт назначения</th>
    <th>Количество мест</th>
</tr>
<?php foreach ( $array2 as $row2 ): if ( $idFlight == 0 ) $idFlight = $row2['id'];?>
    <tr <?php if($row2['id'] == $idFlight) echo 'class="active"';?> id="<?=$row2['id']?>">
    <?php foreach ( $row2 as $col ): ?>
        <td><?=$col?></td>
    <?php endforeach;?>
    </tr>
<?php endforeach;?>

</table>
<label>Дата: </label><input type="text" id="ticket-add-date"/><br />
<div id="date-error"></div>
<button id="btn-ticket-add">Ok</button>
<button id="btn-ticket-cancel">Отмена</button>
<script type="text/javascript" src="js/datepicker.js"></script>
<script type="text/javascript">
    var activeFlight = $('#ticket-flight-table tr.active');
    var idFlight = activeFlight.attr('id');
    
    $('#ticket-flight-table tr').click(function(){
        idFlight = this.id;
        $('#data').load('modules/ticket_edit_form.php',{idFlight:idFlight,idPassenger:<?=$idPassenger?>});
    });
    
    $('#btn-ticket-add').click(function(){
        var ticketDate = $('#ticket-add-date').val();
        if ( ticketDate == '' ) {
            $('#date-error').html('<span style="color: #f00">Укажите дату</span>');
            return false;
        }
        
        $('#data').load('modules/ticket_edit.php',{add:'1',idPassenger:<?=$idPassenger?>,idFlight:idFlight,ticketDate:ticketDate});
    });
    
    $('#btn-ticket-cancel').click(function(){
        $('#data').load('modules/ticket_edit.php',{idPassenger:<?=$idPassenger?>});    
    });
</script>
