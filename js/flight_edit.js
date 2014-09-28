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
