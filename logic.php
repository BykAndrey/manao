<?php
session_start();

if(explode('?',$_SERVER[ 'REQUEST_URI'])[0]=="/logic.php"){
    route();
}




function route(){
    
   $action=$_POST['action'];

    switch($action){

        case 'registration':
            if($_POST['login']!=null and 
                $_POST['password']!=null and
                $_POST['password_confirm']!=null and
                $_POST['email']!=null and
                $_POST['name']!=null){

                    header('Content-Type: application/json; charset=utf-8', true); 

                    echo  json_encode(registration($_POST['login'],
                        $_POST['password'],$_POST['password_confirm'],
                        $_POST['email'],$_POST['name']),
                        JSON_UNESCAPED_UNICODE);
                
            }

        break;

        case 'login':
            if($_POST['login']!=null and  $_POST['password']!=null){
            
                header('Content-Type: application/json; charset=utf-8', true); 

                echo json_encode(authUser($_POST['login'],$_POST['password']));
            }                 
      
            
        break;

            }

    $action=$_REQUEST['action'];

    switch($action){

        case 'logout':
            logout();
            header('Location: '.'/'); 
        break;  

    }
   
}



/*Проверка на ошибки*/
function registration($login,$pass,$passc,$email,$name){
    $users= getAllUsers();
    $errors=array();
    /*Имя*/
    if($name=="" or strlen($name)<3){
        $errors[]="Error: Name".$name;
    }
    /*пароль сравнение*/
    if($pass!=$passc){
        $errors[]="Error: password != password_confirm";
    } 

    /*email или нет */
    if(!preg_match("/[0-9a-z]+@[a-z]/", $email)){
        $errors[]="Error: this line is not a email";
    }
    /* существуют ли еще такие пользователи*/
    foreach ($users as $item){
        
        if($item->login==$login){
            $errors[]="Error: Login already exist";
        } 
        if($item->email==$email){
            $errors[]="Error: Email already exist";
        }  
        
    }
    /** если нет ошибок то создает прользователя */
    if(count($errors)==0){
               return createNewUser($login,$pass,$email,$name);
    }
    return $errors;
   
}














/*получить всех пользователей*/
function getAllUsers(){
    if(file_exists('DB.xml')){
        $xml=simplexml_load_file("DB.xml") or die("Error: Cannot create object");
        return $xml;
    }
    return 0;
}



/*создание пользоватеся*/
function createNewUser($login,$pass,$email,$name){
    
    
    $xml=getAllUsers();
    
    if($xml!=null){
        $user=$xml->addChild('user');
        $user->addChild('name',$name);
        $user->addChild('login',$login);
        $user->addChild('password',sha1($pass));
        $user->addChild('email',$email);

        file_put_contents('DB.xml',$xml->asXML());

        

        return authUser($login,$pass);
    }
}


/** авторизация */
function authUser($login,$pass,$encypt=true){
   
    $xml=getAllUsers();
    foreach ($xml as $user){
        if( $user->login==$login){
            if($encypt==true){
                if(sha1($pass)==$user->password){
                    $_SESSION['login']=$login;
                    setcookie('login',$login,time()+120);
                    setcookie('key',sha1($pass),time()+120);
                    return true;
                }
            }else{
                if($pass==$user->password){
                    $_SESSION['login']=$login; 
                    return true;
                }
            }
            
        }
    }
    return "login or password is wrong";
          
}
/**/
function logout(){
    unset($_SESSION['login']);
    unset($_COOKIE['login']);
    unset($_COOKIE['key']);
}








?>