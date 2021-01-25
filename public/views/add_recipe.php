<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style-add_recipe.css">

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
                <i class="fas fa-book-open"></i>
                <a href="recipe" class="button">Recipe</a>
            </li>
            <li>
                <i class="fas fa-plus"></i>
                <a href="add_item" class="button">Add product</a>
            </li>
            <li>
                <i class="fas fa-plus"></i>
                <a href="add_recipe" class="button">Add recipe</a>
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
                <? $name =  unserialize($_SESSION['user']);
                echo $name->getName()?>
            </div>
            <div class="log-out" onclick="location.href='logout'">
                <i class="fas fa-sign-out-alt"></i>
                Log out
            </div>
        </header>
        <section class="section">
            <form action="addRecipe" method="POST" ENCTYPE="multipart/form-data">

                <input name="title" type="text" placeholder="title" required>
                <textarea name="description" rows=10 placeholder="description" required></textarea>

                <input type="file" name="img-recipe" required /><br/>
                <button type="submit">send</button>
            </form>

        </section>
    </main>
</div>
</body>
</html>