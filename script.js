$(document).ready(function(){

    $('button#login').click(function(e){
        e.preventDefault();
        if($('#login').val()!="" &
         $('#password').val()!=""){

            $.ajax({
                url:'/logic.php',
                method:'post',
                data:{
                    'action':'login',
                    'login':$('#login').val(),
                    'password':$('#password').val(),
        
                },
                success:function(data){
                
                    $('#errors').html(data);
                    if(data==true){
                    
                        window.location.replace('/');
                    }
                
                
                }
            });
        }else{
            $('#errors').html('some fields are empty');
        }
        
      
    });
        /*отправка формы регистрации*/
    $('button#registration').click(function(e){
        e.preventDefault();
    
        if($('#login').val()!="" &
        $('#password').val()!=""&
        $('#password_confirm').val()!=""&
        $('#email').val()!=""&
        $('#name').val()!=""
    ){
        
        $.ajax({
            url:'/logic.php',
            method:'post',
            data:{
                'action':'registration',
                'login':$('#login').val(),
                'password':$('#password').val(),
                'password_confirm':$('#password_confirm').val(),
                'email':$('#email').val(),
                'name':$('#name').val()
    
            },
            success:function(data){
               // alert(data);
               var message="";
               //   console.log(1);
              for(var i=0;i<data.length;i++){
               //   console.log(message);
                message=message+data[i]+"<br>";
              }
              
             
                $('#errors').html(message);
                if(data==true){
                    
                    window.location.replace('/');
                }
                    

            }
        });
    }else{
        $('#errors').html('some fields are empty');
       // console.log(3);
    }
    });
    
});