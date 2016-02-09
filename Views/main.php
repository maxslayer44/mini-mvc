<!DOCTYPE HTML>
<html>
    <head>
        <title>Mini MVC</title>
        <meta charset="utf-8">
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            html,
            body {
                width: 100%;
                height: 100%;
            }

            body {
                position: relative;
            }

            .header {
                position: absolute;
                top: 0px;
                left: 0px;
                right: 0px;
                height: 80px;
                border-bottom: 2px solid black;
            }

            .footer {
                position: absolute;
                bottom: 0px;
                left: 0px;
                right: 0px;
                height: 40px;
                border-top: 2px solid black;
            }

            .main {
                position: absolute;
                top: 80px;
                bottom: 40px;
                left: 0px;
                right: 0px;
                overflow: auto;
            }
        </style>
    </head>
    <body>
        <header class="header">
            <h1>Mini MVC</h1>
            <nav>
                <a href="/">Index</a> - <a href="/une-autre-page.html">Autre page</a> - <a href="/lien-mort.html">Lien mort</a> - <a href="/erreur.html">Erreur</a> - <a href="<?=$this->url('article', ['id' => 16, 'slug' => "mon-article"]);?>">Article</a>
            </nav>
        </header>
        <main class="main">
            <h2>Rendu du controller</h2>
            <?= $viewContent; ?>
        </main>
        <footer class="footer">
            Footer du layout
        </footer>
    </body>
</html>