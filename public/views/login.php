<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>

<div class="container">
    <div class="logo">
        <img src="/public/img/logo_pantry.svg">
    </div>
    <div class="login-container">
        <?php
        if(empty($_SESSION['user'])) :
        ?>
        <form class="login" action="login" method="POST">
            <div clss="message">
                <?php
                if(isset($messages)){
                    foreach ($messages as $message){
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="email" type="text" placeholder="email@email.com" required>
            <input name="password" type="password" placeholder="password" required>
            <button type="submit">LOGIN</button>
        </form>
        <?php
        else :
            $url ="http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/main");


        endif;
        ?>
    </div>
</div>

</body>