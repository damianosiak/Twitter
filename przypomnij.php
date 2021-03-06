<!doctype html>
<html>
    <?php session_start();
    error_reporting(0);
    $sslogin=$_SESSION['slogin'];
    $sshaslo=$_SESSION['shaslo'];
    if((!empty($sslogin))AND(!empty($sshaslo)))
    {
        echo"<script>window.location.replace('portal.php');</script>";
    }
    ?>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <title>Przypomnij hasło do Twittera | Twitter</title>
        <link rel="stylesheet" type="text/css" href="style_logowanie2.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <div id="panel_logowania" style="height:28%;border-radius:12px;border-style:solid;border-width:1px;border-color:#1da1f2;">
                <div id="logowanie_formularz">
                    <h2>Przypomnij hasło</h2>
                    <form action="haslo.php" method="POST">
                        <input type="text" id="l_login" name="l_login" placeholder="Telefon, e-mail lub nazwa użytkownika" required>
                        <input type="submit" id="l_potwierdz" value="Przypomnij" onmouseover="lb()" onmouseout="ln()"><br/>
                    </form>
                </div><br/>
                <div id="wynik"></div><br/>
                <div id="l_dodatkowe">
                    <a href="logowanie.php" class="l_dodatki" id="niep" href="#" onmouseover="p1b()" onmouseout="p1n()">Zaloguj się</a>
                </div>
            </div>
        </div>
        <script>
            function lb()
            {
                l_potwierdz.style="background-color:#006dbf;";
            }
             function ln()
            {
                l_potwierdz.style="background-color:#1da1f2;";
            }
            function p1b()
            {
                niep.style="font-weight:bold;"
            }
            function p1n()
            {
                niep.style="font-weight:normal;"
            }
            function p2b()
            {
                zar.style="font-weight:bold;"
            }
            function p2n()
            {
                zar.style="font-weight:normal;"
            }
        </script>
    </body>
</html>