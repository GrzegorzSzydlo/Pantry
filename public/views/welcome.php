<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style-welcome.css">

    <script src="https://kit.fontawesome.com/f9ac35827f.js" crossorigin="anonymous"></script>

    <title>Welcome</title>
</head>
<body>
    <main>
        <header>
            <div class="logo">
                <img src="public/img/logo_pantry.svg">
            </div>

            <div class="logIn">
                <button onclick="location.href='login'">
                    <i class="fas fa-sign-in-alt"></i>
                        Log in
                </button>
            </div>
            <div class="createAccount">
                <button onclick="location.href='registration'">
                    Create account
                </button>
            </div>
        </header>
        <section class="main">
            <div class="div-opis">
                <p id="witaj">
                    Witaj <i class="far fa-laugh-wink"></i>
                </p>
                <p id="opis">
                    Znajdziesz tutaj przepisy na różne potrawy oraz będziesz mógł zrobić listę rzeczy,</p>
                <p>które posiadasz w swoim domu.</p>
                <p id="zapraszam">Zapraszam</p>
            </div>
            <div id="image-welcome">
                <img src="public/uploads/welcome-image.jpg">
            </div>
        </section>
    </main>
</body>
</html>
