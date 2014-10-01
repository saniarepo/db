function validate(){
    var result = true;
    $('input.number').each(function(){
        var re = /^[1-9][0-9]{0,}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            $(this).parent().append('<p class="novalid-message">Введите число!</p>');
            result = false;
        }else{
            $(this).removeClass('novalid');
        }  
    });
    
    return result;
}
