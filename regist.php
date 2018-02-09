<?php
  //  include 'logic.php';
  session_start();

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
            <legend>Регистрация</legend>
            <div id="errors">
            </div>
           <form action=""  method="post"> 
           <table>
            <tr>
            <td>
            Login:
            </td>
            <td><input type="text" id="login"></td>
        </tr>
        <tr>
                    <td>
                    password:
                    </td>
                    <td><input type="password" id="password"></td>
                </tr>
               
                <tr>
                    <td>
                    password confirm:
                    </td>
                    <td><input type="password" id="password_confirm"></td>
                </tr>
                <tr>
                    <td>
                    Email:
                    </td>
                    <td><input type="email" id="email"></td>
                </tr>
                <tr>
                    <td>
                    Name:
                    </td>
                    <td><input type="text" id="name"></td>
                </tr>
                <tr>
                    <td>
                    </td>

                    <td>
                       <button id="registration">registration</button>
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