<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style-contact.css">

    <script src="https://kit.fontawesome.com/f9ac35827f.js" crossorigin="anonymous"></script>
    <title>CONTACT</title>
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
        <section class="projects">
            <div class="contact">
                <input class="name-input" name="name" type="text" placeholder="Your's name">
                <input class="email" name="email" type="email" placeholder="Your's email@email.com">
                <input class="subject" name="subject" type="text" placeholder="Subject">
                <div class="message">
                    <textarea  name="message" type="text" placeholder="Your's message"></textarea>
                </div>

                <button>Send</button>

            </div>
            <div class="address-box">
                <div class="author-box">
                    <div class="author">
                        <img src="public/uploads/moje_zdiecie.jpg">
                        <p>Mam na imię Grzegorz Szydło<br>
                        Masz jakiś problem?<br>
                        Chętnie pomogę ;)</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>