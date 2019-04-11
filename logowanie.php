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
        <title>Zaloguj się do Twittera | Twitter</title>
        <link rel="stylesheet" type="text/css" href="style_logowanie.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <div id="panel_logowania" style="height:32%;border-radius:12px;border-style:solid;border-width:1px;border-color:#1da1f2;">
                <div id="logowanie_formularz">
                    <h2>Zaloguj się do Twittera</h2>
                    <form action="" method="POST">
                        <input type="text" id="l_login" name="l_login" placeholder="Telefon, e-mail lub nazwa użytkownika" required><br/>
                        <input type="password" id="l_haslo" name="l_haslo" placeholder="Hasło" required><br/>
                        <input type="submit" id="l_potwierdz" value="Zaloguj się" onmouseover="lb()" onmouseout="ln()"><br/>
                    </form>
                </div><br/>
                <div id="wynik">
                
                    <!--PHP-->
                    <?php
                        error_reporting(0);
                        $db=mysqli_connect('127.0.0.1','root','','twitter');
                        if(!$db)
                        {
                            echo "Błąd podczas łączenia z bazą danych!<br/>".mysqli_error($db);
                        }
                        else
                        {
                            $login=$_POST['l_login'];
                            $haslo=$_POST['l_haslo'];
                            $zapytanie="SELECT Login,Haslo FROM uzytkownicy WHERE Login='$login' OR Email='$login' OR Telefon='$login' AND Haslo='$haslo';";
                            $wyslanie=mysqli_query($db,$zapytanie);
                            $liczba=mysqli_num_rows($wyslanie);
                            if(((empty($login))&&(empty($haslo)))&&(!mysqli_num_rows($wyslanie)))
                            {
                                //
                            }
                            else if((!mysqli_num_rows($wyslanie))&&((!empty($login))&&(!empty($haslo))))
                            {
                                echo "Nazwa użytkownika i hasło nie zgadzają się. Sprawdź jeszcze raz i spróbuj ponownie.";
                            }
                            else
                            {
                                
                                $zap2="SELECT ID FROM uzytkownicy WHERE Login='$login' OR Email='$login' OR Telefon='$login' AND Haslo='$haslo';";
                                $wys2=mysqli_query($db,$zap2);
                                while($rx=mysqli_fetch_assoc($wys2))
                                {
                                    $xxid=$rx['ID'];
                                }
                                //echo "Zalogowano";
                                $_SESSION['login']=$login;
                                $_SESSION['haslo']=$haslo;
                                $_SESSION['id']=$xxid;
                                header("location:portal.php");
                                
                            }
                        }
                    ?>
                
                    
                </div><br/>
                <div id="l_dodatkowe">
                    <a href="przypomnij.php" class="l_dodatki" id="niep" href="#" onmouseover="p1b()" onmouseout="p1n()">Nie pamiętasz hasła?</a>
                    <a href="rejestracja.php" class="l_dodatki" id="zar" href="#" onmouseover="p2b()" onmouseout="p2n()">Zarejestruj się teraz</a>
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