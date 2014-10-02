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
    
    $('input.time').each(function(){
        var re = /^[0-9]{1,2}:[0-9]{1,2}(:[0-9]{1,2})?$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            $(this).parent().append('<p class="novalid-message">Неверный формат времени!</p>');
            result = false;
        }else{
            $(this).removeClass('novalid');
        }  
    });
    
    $('input.passport').each(function(){
        var re = /^[0-9]{4} [0-9]{6}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            $(this).parent().append('<p class="novalid-message">Неверный формат паспорта!</p>');
            result = false;
        }else{
            $(this).removeClass('novalid');
        }  
    });
    
    $('input.city').each(function(){
        var re = /^[a-zA-Zа-яА-я-]{2,}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            $(this).parent().append('<p class="novalid-message">Некорректное название!</p>');
            result = false;
        }else{
            $(this).removeClass('novalid');
        }  
    });
    
    $('input.name').each(function(){
        var re = /^[a-zA-Zа-яА-я-]{2,}$/;
        if ( !re.test( $(this).val() ) ){
            $(this).addClass('novalid');
            $(this).parent().append('<p class="novalid-message">Некорректное имя!</p>');
            result = false;
        }else{
            $(this).removeClass('novalid');
        }  
    });
    
    return result;
}
