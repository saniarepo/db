$('#btn-passenger-new-cancel').click(function(){
    $('#data').load('modules/passenger_edit.php');
});

$('#btn-passenger-create-ok').click(function(){
    var name = $('#name').val();
    var lastname = $('#lastname').val();
    var sex = $('#sex').val();
    var age = $('#age').val();
    var passport = $('#passport').val();
    
    $('#data').load('modules/passenger_edit.php',{add:'1',name:name,lastname:lastname,sex:sex,age:age,passport:passport});
});

