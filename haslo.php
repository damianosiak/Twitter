<!doctype html>
<html>
    <?php session_start();
    error_reporting(0);
    $sslogin=$_SESSION['slogin'];
    $sshaslo=$_SESSION['shaslo'];
    $testoo=$_POST['l_login'];
    if(!empty($testoo))
    {
        $_SESSION['wlogin']=$testoo;
    }
    if((!empty($sslogin))AND(!empty($sshaslo))AND(empty($test)))
    {
        echo"<script>window.location.replace('portal.php');</script>";
    }
    ?>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <title>Przypomnij hasło do Twittera | Twitter</title>
        <link rel="stylesheet" type="text/css" href="style_logowanie3.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <div id="panel_logowania" style="height:32%;border-radius:12px;border-style:solid;border-width:1px;border-color:#1da1f2;">
                <div id="logowanie_formularz">
                    <h2>Przypomnij hasło</h2>
                    <form action="" method="POST">
                        <input type="text" id="l_pyt" name="l_pyt" required disabled value="<?php $xlogin=$_POST['l_login'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT Pytanie FROM uzytkownicy WHERE Login='$xlogin' OR Telefon='$xlogin' OR Email='$xlogin'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Pytanie'];};}?>"><br/>
                        <input type="text" id="l_odp" name="l_odp" placeholder="Odpowiedz na pytanie" required><br/>
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
        
        <?php
            $xlogin=$_SESSION['wlogin'];
            $odp=$_POST['l_odp'];
            $db=mysqli_connect('127.0.0.1','root','','twitter');
            $zap2="SELECT ID FROM uzytkownicy WHERE Login='$xlogin' OR Telefon='$xlogin' OR Email='$xlogin'";
            if(mysqli_set_charset($db,'utf8'))
            {
                $wys2=mysqli_query($db,$zap2);
                while($xr2=mysqli_fetch_assoc($wys2))
                {
                    $xxid=($xr2['ID']);
                };
                $zap3="SELECT Odpowiedz FROM uzytkownicy WHERE ID='$xxid'";
                if(mysqli_set_charset($db,'utf8'))
                {
                    $wys3=mysqli_query($db,$zap3);
                    while($xr3=mysqli_fetch_assoc($wys3))
                    {
                        $xxodp=($xr3['Odpowiedz']);
                    };
                    if($odp==$xxodp)
                    {
                        $zap4="SELECT Haslo FROM uzytkownicy WHERE ID='$xxid'";
                        if(mysqli_set_charset($db,'utf8'))
                        {
                            $wys4=mysqli_query($db,$zap4);
                            while($xr4=mysqli_fetch_assoc($wys4))
                            {
                                $xhaselko=($xr4['Haslo']);
                                echo "<script>alert('Twoje hasło to: $xhaselko');</script>";
                                $_SESSION['wlogin']="";
                                session_destroy();
                                echo "<script>window.location.replace('logowanie.php');</script>";
                            };
                        }
                    }

                }
            }
        ?>
    </body>
</html>