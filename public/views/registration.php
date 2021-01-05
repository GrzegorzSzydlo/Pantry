<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style-Registration.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTRATION PAGE</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="public/img/logo_pantry.svg">
    </div>
    <div class="registration-container">
        <form class="registration" action="registration" method="post">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="name" type="text" placeholder="name" required>
            <input name="surname" type="text" placeholder="surname" required>
            <input name="password" type="password" placeholder="password" required>
            <input name="confirmPassword" type="password" placeholder="Confirm password" required>
            <input name="email" type="text" placeholder="email@email.com" required>
            <button>Create account</button>
        </form>
    </div>
</div>
</body>