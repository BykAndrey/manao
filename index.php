<?php
 
  session_start();
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

    <?php if(!isset($_SESSION['login'])){?>
  
       <a href="/regist.php">Registration</a>
       <a href="/login.php">Login</a>
    <?php } else{?>
        <span>
         Hello,  <?=$_SESSION['login']?>
        </span>
    <a href="/logic.php?action=logout">  Exit</a>
    <?php }?>
    
    <script   src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous">
              </script>
    <script src="script.js">
    </script>
</body>
</html>