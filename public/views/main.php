<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style-main.css">

    <script src="https://kit.fontawesome.com/f9ac35827f.js" crossorigin="anonymous"></script>
    <title>PROJECTS</title>
</head>
<div class="base-container">
    <nav>
        <img src="public/img/logo_pantry.svg">
        <ul>
            <li>
                <i class="fas fa-home"></i>
                <a href="main" class="button">Home</a>
            </li>
            <li>
                <i class="far fa-address-book"></i>
                <a href="contact" class="button">Contacts</a>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <div class="name">
                <? echo $_SESSION['user'];?>
            </div>
            <div class="log-out" onclick="location.href='logout'">
                <i class="fas fa-sign-out-alt"></i>
                Log out
            </div>
        </header>
        <section class="section">
            <div class="add-items">
                <div class="add-item">
                    <form action="addItem" method="post" ENCTYPE="multipart/form-data">
                        <div class="message">
                            <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                            ?>


                        </div>
                        <input name="nameProduct" type="text" placeholder="name product">
                        <input name="amount" type="number"><br/>
                        <button type="submit">Add item</button>

                    </form>
                </div>

                <div class="items">

                </div>
            </div>
            <div class="1">

            </div>









<!--            <div id="project-1">-->
<!--                <img src="public/uploads/project_smile.jpg">-->
<!--                <div>-->
<!--                    <h2>title</h2>-->
<!--                    <p>description</p>-->
<!--                    <div class="social-section">-->
<!--                        <i class="fas fa-heart"> 600</i>-->
<!--                        <i class="fas fa-minus-square"> 121</i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </section>
    </main>
</div>
</body>
</html>