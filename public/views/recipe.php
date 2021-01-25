<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style-recipe.css">

    <script src="https://kit.fontawesome.com/f9ac35827f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/searchRecipe.js" defer></script>
    <script type="text/javascript" src="./public/js/chooseRecipe.js" defer></script>
    <title>PROJECTS</title>
</head>
<body>
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
            <div class="search-bar">
                <input placeholder="search project">
            </div>
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
            <div class="recipe-title">
                <?php foreach ($recipes as $recipe): ?>
                <div id="<?= $recipe->getId(); ?>">
                    <div class="title-show">
                        <?= $recipe->getTitle(); ?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>

            <div class="recipe-area">
                <div id="">
                    <img src="public/uploads/potrawy.jpg">
                    <div class="title">
                        Wybierz przepis ;)
                    </div>
                    <div class="description">
                        wystarczy nacisnąć
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>

<template id="recipe-template">
    <div id="">
        <div class="title-show">
            title
        </div>
    </div>
</template>

<template id="chooseRecipe">
        <div id="">
            <img src="">
            <div class="title">

            </div>
            <div class="description">

            </div>
        </div>
</template>