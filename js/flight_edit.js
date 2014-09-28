var select = $('#flight-edit-table tr.active');
var id = select.attr('id');

$('#flight-edit-table tr').click(function(){
    var rowId = this.id;
    $('#data').load('modules/flight_edit.php',{id:rowId});
});

$('#btn-flight-del').click(function(){
    $('#data').load('modules/flight_edit.php',{del:id});
});

$('#btn-flight-create').click(function(){
    $('#data').load('modules/flight_edit_form.php');
});

$('ul#head-flight li').click(function(){
    trend1 = ( trend1 == 'ASC' )? 'DESC' : 'ASC';
    field1 = this.id;
    $('#data').load('modules/flight_edit.php',{id:id, field1:field1, trend1:trend1});
    
});
