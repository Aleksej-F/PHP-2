function send(){
    let reviews = $('#reviews').val();
    let idProduct = +$('#idProduct').val();
    let action = 'отправить';
    let str = 'reviews='+reviews+'&idProduct='+idProduct+'&action='+action;
    $.ajax({
        type: "POST",
        url: "server.php",
        data: str,
        success: function(answer){
           $('body').html(answer);
        }
    });
}

function basket(id){
    let action = 'basket';
    console.log('jjjj    ',id,'hghjghjgh ',action)
    let str = 'idProduct='+id+'&action='+action;
    $.ajax({
        type: "POST",
        url: "server.php",
        data: str,
        success: function(answer){
           //$('body').html(answer);
           console.log(answer)
        }
    });
}

function delProductBasket(id){
    let action = 'delBasketProduct';
    let str = 'idProduct='+id+'&action='+action;
    $.ajax({
        type: "POST",
        url: "server.php",
        data: str,
        success: function(answer){
            $('#content').html(answer);
        }
    });
}
function delProductBasketMini(idPr){
    let action = 'delBasketMini';
    let str = 'idProduct='+idPr+'&action='+action;
    $.ajax({
        type: "POST",
        url: "server.php",
        data: str,
        success: function(answer){
            $('#basketCard').html(answer);
        }
    });
}

function countBasket(id, count){
    let action = 'countBasket';
    let str = 'idProduct='+id+'&action='+action+'&count='+count;
    $.ajax({
        type: "POST",
        url: "server.php",
        data: str,
        success: function(answer){
          
           // console.log(answer)
           $('#content').html(answer);
        }
    });
}

function clearBasket() {
    let action = 'clearBasket';
    let str = 'action='+action;
    let confirmation = confirm("Вы действительно хотите очистить корзину?");
    if (confirmation) {
        $.ajax({
            type: "POST",
            url: "server.php",
            data: str,
            success: function(answer){
               // console.log('очистка корзины', answer)
                $('#content').html(answer);
            }
        });
    }
}

function сontinueСheckout() {
    const rr =$('input[name=reg]:checked', '#formCheckout').val()
    if (rr ==="reg" ) {
        $('#сontСheckt').attr("href", "register.php")
    }else {
        //переход на страницу оформления заказа без регистрации
    }
}

function logIn(){
    let email = $('#logMail').val();//document.getElementById('login').value
    let pass = $('#logPass').val();
    let action = 'logIn';
    let str = 'email='+email+'&pass='+pass+'&action='+action;
    
    $.ajax({
        type: "POST",
        url: "server.php",
        data: str,
        success: function(answer){
          console.log(answer)
          $('#content').html(answer);  
        }
    });

}



function goOut(){
   
    let action = 'goOut';
    let str = '&action='+action;
    
    $.ajax({
        type: "POST",
        url: "server.php",
        data: str,
        success: function(answer){
          $('body').html(answer);  
        }
    });

}