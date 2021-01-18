<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style-main.css">

    <script src="https://kit.fontawesome.com/f9ac35827f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/updateAmount.js" defer></script>
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
            <div class="items-area">

                <div class="item">
                    <?php foreach ($items as $item):?>
                    <div id="<?=  $item->getId(); ?>">
                        <img src="public/uploads/<?= $item->getImage(); ?>">
                        <div class="item-desc">
                            <div class="name-amount">
                                <div class="name-item">
                                    <?= $item->getNameProduct(); ?>
                                </div>
                                <div class="amount-item">
                                    <?= $item->getAmount(); ?>
                                </div>
                            </div>
                            <div class="plus-minus">
                                <i class="fas fa-plus"></i>
                                <i class="fas fa-minus"></i>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="section-select">
                <form id="form-select" action="addItemWithSelect" method="POST" ENCTYPE="multipart/form-data">
                    <div id="choose-select">
                        <select name="item" id="item-select">
                            <?php foreach ($items as $item):?>
                                <option value="<?= $item->getNameProduct()?>"><?= $item->getNameProduct()?></option>
                            <?php endforeach;?>
                        </select>
                        <input name="amount-select" type="number" placeholder="amount" required>
                    </div>
                    <div>
                        <button class="addSelect" type="submit">Add/Remove</button>
                    </div>

                </form>
            </div>

        </section>
    </main>
</div>
</body>
</html>