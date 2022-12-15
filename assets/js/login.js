$(document).ready(function(){
    $('#login').click(function(){
        var username = $('#username').val();
        var password = $('#password').val();
        var option = 'login';
        if(username != '' && password != ''){
            $.ajax({
                url:"https://agenciapentabrand.com/gestion/api.php",
                method:"POST",
                data:{username:username, password:password, option:option},
                success:function(data){
                    console.log(data);
                    $.cookie('login',data);	
                    if(data == 'No'){
                        alert("Wrong Data");
                    }else{
                    }
                    location.reload();
                }
            });
        }else{
            alert("Both Fields are required");
        }
    });
    $('#logout').click(function(){
        $.removeCookie('login');
        window.location.href = "index.php";
    });
})