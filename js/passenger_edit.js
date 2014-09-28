var select = $('#passenger-edit-table tr.active');
var id = select.attr('id');

$('#passenger-edit-table tr').click(function(){
    var rowId = this.id;
    $('#data').load('modules/passenger_edit.php',{id:rowId});
});

$('#btn-passenger-del').click(function(){
    $('#data').load('modules/passenger_edit.php',{del:id});
});

$('#btn-passenger-create').click(function(){
    $('#data').load('modules/passenger_edit_form.php');
});

$('ul#head-passenger li').click(function(){
    trend1 = ( trend1 == 'ASC' )? 'DESC' : 'ASC';
    field1 = this.id;
    $('#data').load('modules/passenger_edit.php',{id:id, field1:field1, trend1:trend1});
    
});
