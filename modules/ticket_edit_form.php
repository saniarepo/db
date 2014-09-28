<?php

    require_once('db.func.php');
    
    $idFlight = ( isset($_POST['idFlight']) )? $_POST['idFlight'] : 0;
    $idPassenger = ( isset($_POST['idPassenger']) )? $_POST['idPassenger'] : 0;
   
   $sql = 'SELECT * from passenger WHERE id='.$idPassenger;
   $array1 = dbGetQueryResult($sql);
   $trend1 = ( isset( $_POST['trend1'] ) )? $_POST['trend1'] : 'ASC';
   $field1 = ( isset($_POST['field1']))? $_POST['field1'] : 'id';
    
    
?>
<table class="table">
<tr>
<td> 
    <h3>Пассажир</h3>
    <div class="wrap-table-div">
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
<label>Дата: </label><input type="text" id="ticket-add-date"/><br />
<div id="date-error"></div>
<button id="btn-ticket-add">Ok</button>
<button id="btn-ticket-cancel">Отмена</button>
</div>
</td>

<?php
    $sql = "SELECT * FROM flight ORDER BY $field1 $trend1";
    $array2 = dbGetQueryResult($sql);
?>
<td>
<h3>Выбрать рейс</h3>
<ul class="head" id="head-flight">
    <li id="time_dep">Время вылета</li>
    <li id="time_arr">Время прилета</li>
    <li id="point_dep">Пункт отправления</li>
    <li id="point_arr">Пункт назначения</li>
    <li id="place">Кол-во мест</li>
</ul>
<div class="wrap-table-div">
<table id="ticket-flight-table" class="table table-bordered table-striped">

<?php foreach ( $array2 as $row2 ): if ( $idFlight == 0 ) $idFlight = $row2['id'];?>
    <tr <?php if($row2['id'] == $idFlight) echo 'class="active"';?> id="<?=$row2['id']?>">
    <?php foreach ( $row2 as $key => $col ): ?>
        <?php if($key != 'id'):?><td key="<?=$key?>"><?=$col?></td><?php endif;?>
    <?php endforeach;?>
    </tr>
<?php endforeach;?>

</table>
</div>

</td>
</tr>
</table>
<script type="text/javascript" src="js/datepicker.js"></script>
<script type="text/javascript">
    var activeFlight = $('#ticket-flight-table tr.active');
    var idFlight = activeFlight.attr('id');
    var trend1 = '<?=$trend1?>';
    var field1 = '<?=$field1?>';
    
    $('#ticket-flight-table tr').click(function(){
        idFlight = this.id;
        $('#data').load('modules/ticket_edit_form.php',{idFlight:idFlight,field1:field1, trend1:trend1, idPassenger:<?=$idPassenger?>});
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
    
    $(document).ready(function(){
        $('#ticket-flight-table tr:first td').each(function(){
            $('li#'+$(this).attr('key')).width($(this).innerWidth()-2).height(80);
        });
    });
    
    $('ul#head-flight li').click(function(){
        trend1 = ( trend1 == 'ASC' )? 'DESC' : 'ASC';
        field1 = this.id;
        $('#data').load('modules/ticket_edit_form.php',{idFlight:idFlight, field1:field1, trend1:trend1, idPassenger:<?=$idPassenger?> });
        
    }); 
</script>
