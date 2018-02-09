<?php
 //   include 'logic.php';
 session_start();
 include_once 'logic.php';
/** если в куке есть логин то авторизуем */
if(isset($_COOKIE['login']) and isset($_COOKIE['key'])){
    authUser($_COOKIE['login'],$_COOKIE['key'],false);
    header('Location: '.'/'); 
  }

 if(isset($_SESSION['login'])){
    header('Location: '.'/'); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>Document</title>
</head>
<body>
    
        <fieldset >
            <legend>Авторизация</legend>
            <div id="errors">
            </div>
            <form action="" method="post">
            <table>
            <tr>
            <td>
            Login:
            </td>
            <td>
            <input type="text"  id="login">
            </td>
        </tr>
                 <tr>
                    <td>
                    password:
                    </td>
                    <td><input type="password"  id="password"></td>
                </tr>
              
               
                <tr>
                    <td>
                    </td>

                    <td>
                        <button id="login">Go</button>
                    </td>
                </tr>
            </table>
            </form>
        </fieldset>
    

    
    
    <script   src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous">
              </script>

    <script src="script.js">
    </script>
</body>
</html>