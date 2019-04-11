<!dotcype html>
<?php session_start();

$login=$_SESSION['login'];
$haslo=$_SESSION['haslo'];
$id=$_SESSION['id'];

if((empty($login))AND(empty($haslo)))
    {
        echo"<script>window.location.replace('logowanie.php');</script>";
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <title>Twitter | Edytuj profil</title>
        <link rel="stylesheet" type="text/css" href="style_portal.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <div id="navbar">
                <div id="nvb1" class="nvbclass">&nbsp;</div>
                <div id="nvb2" class="nvbclass">
                    <a href="portal.php" id="nvb2home"><i class="fas fa-home fa-lg"></i> Home</a>
                    <a href="" id="nvb2wiadomosci"><i class="fas fa-envelope fa-lg"></i> Wiadomości</a>
                </div>
                <div id="nvb3" class="nvbclass">
                    <a href="portal.php" id="nvb3logo" style="margin-left:45%;"><i class="fab fa-twitter fa-lg" style="color:#1da1f2"></i></a>
                </div>
                <div id="nvb4" class="nvbclass">
                    <a href="profil.php" id="nvb4profil" style="color:#1da1f2"><i class="fas fa-user-circle fa-lg" style="color:#1da1f2"></i>
                        <?php
                            $xid=$_SESSION['id'];
                            $db=mysqli_connect('127.0.0.1','root','','twitter');
                            $zap="SELECT uzytkownicy.Imie,uzytkownicy.Nazwisko FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";
                            if(mysqli_set_charset($db,"utf8"))
                            {
                                $wys=mysqli_query($db,$zap);
                                while($xr1=mysqli_fetch_assoc($wys))
                                {
                                    echo $xr1['Imie']." ".$xr1['Nazwisko'];
                                };
                            }
                        ?>
                    </a>
                    <a href="wyloguj.php" id="nvb4wyloguj"><i class="fas fa-sign-out-alt"></i> Wyloguj</a>
                </div>
                <div id="nvb5" class="nvbclass">&nbsp;</div>
            </div>
            
            <div id="main" style="height:92%;">
                <form action="aktualizuj.php" method="POST">
                    <div id="inmain" style="border-radius:12px;border-style:solid;border-width:1px;border-color:#1da1f2;">
                        <div id="winmain0">
                            <?php
                                $xid=$_SESSION['id'];
                                $db=mysqli_connect('127.0.0.1','root','','twitter');
                                $zap="SELECT uzytkownicy.Imie,uzytkownicy.Nazwisko FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";
                                if(mysqli_set_charset($db,"utf8"))
                                {
                                    $wys=mysqli_query($db,$zap);
                                    while($xr1=mysqli_fetch_assoc($wys))
                                    {
                                        echo "<center><h2>Witaj ".$xr1['Imie']." ".$xr1['Nazwisko']."!</h2></center>";
                                    };
                                }
                            ?>
                        </div>
                        <div id="winmain1">
                            <h4><label for="plogin">Login</label></h4>
                            <input type="text" id="plogin" name="plogin" disabled required
                                   value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Login FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Login'];};}?>"><br/>

                            <h4><label for="phaslo1">Hasło</label></h4>
                            <input type="password" id="phaslo1" name="phaslo1" required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Haslo FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Haslo'];};}?>"><br/>

                            <h4><label for="phaslo2">Powtórz hasło</label></h4>
                            <input type="password" id="phaslo2" name="phaslo2" required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Haslo FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Haslo'];};}?>"><br/>

                            <h4><label for="pemail">E-mail</label></h4>
                            <input type="text" id="pemail" name="pemail" disabled required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Email FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Email'];};}?>"><br/>

                            <h4><label for="ptelefon">Telefon</label></h4>
                            <input type="number" id="ptelefon" name="ptelefon" required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Telefon FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Telefon'];};}?>"><br/>

                            <h4><label for="ppytanie">Twoje pytanie</label></h4>
                            <input type="text" id="ppytanie" name="ppytanie" disabled required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Pytanie FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Pytanie'];};}?>"><br/>
                            
                            <h4><label for="podpowiedz">Odpowiedź</label></h4>
                            <input type="text" id="podpowiedz" name="podpowiedz" disabled required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Odpowiedz FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Odpowiedz'];};}?>"><br/>
                        </div>
                        
                        <div id="winmain2">
                            <h4><label for="pimie">Imię</label></h4>
                            <input type="text" id="pimie" name="pimie" required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Imie FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Imie'];};}?>"><br/>
                            
                            <h4><label for="pnazwisko">Nazwisko</label></h4>
                            <input type="text" id="pnazwisko" name="pnazwisko" required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Nazwisko FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Nazwisko'];};}?>"><br/>
                            
                            <h4><label for="pplec">Płeć</label></h4>
                            <select id="pplec" name="pplec" required style="width:125%;">
                                <option value="1" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$pleczbazy=$xr2['Kraj'];};}if($pleczbazy==1){echo 'selected';}?>>Mężczyzna</option>
                                <option value="2" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$pleczbazy=$xr2['Kraj'];};}if($pleczbazy==2){echo 'selected';}?>>Kobieta</option>
                            </select><br/>
                            
                            <h4><label for="pdata">Data urodzenia</label></h4>
                            <input type="date" id="pdata" name="pdata" required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Dataurodzenia FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Dataurodzenia'];};}?>"><br/>
                            
                            <h4><label for="pkraj">Kraj</label></h4>
                            <select id="pkraj" name="pkraj" required style="width:125%;">
                                <option value="1" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==1){echo 'selected';}?>>Anglia</option>
                                <option value="2" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==2){echo 'selected';}?>>Austria</option>
                                <option value="3" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==3){echo 'selected';}?>>Czechy</option>
                                <option value="4" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==4){echo 'selected';}?>>Francja</option>
                                <option value="5" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==5){echo 'selected';}?>>Hiszpania</option>
                                <option value="6" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==6){echo 'selected';}?>>Holandia</option>
                                <option value="7" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==7){echo 'selected';}?>>Irlandia</option>
                                <option value="8" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==8){echo 'selected';}?>>Niemcy</option>
                                <option value="9" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==9){echo 'selected';}?>>Polska</option>
                                <option value="10" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==10){echo 'selected';}?>>Rosja</option>
                                <option value="11" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==11){echo 'selected';}?>>Słowacja</option>
                                <option value="12" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==12){echo 'selected';}?>>Szwajcaria</option>
                                <option value="13" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==13){echo 'selected';}?>>Ukraina</option>
                                <option value="14" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==14){echo 'selected';}?>>Węgry</option>
                                <option value="15" <?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Kraj FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){$krajzbazy=$xr2['Kraj'];};}if($krajzbazy==15){echo 'selected';}?>>Włochy</option>
                            </select><br/>
                            
                            <h4><label for="pmiasto">Miasto</label></h4>
                            <input type="text" id="pmiasto" name="pmiasto" required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Miasto FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Miasto'];};}?>"><br/>
                            
                            <h4><label for="ptytul">Tytuł</label></h4>
                            <input type="text" id="ptytul" name="ptytul" required value="<?php $xid=$_SESSION['id'];$db=mysqli_connect('127.0.0.1','root','','twitter');$zap2="SELECT uzytkownicy.Tytul FROM uzytkownicy WHERE uzytkownicy.ID='$xid'";if(mysqli_set_charset($db,'utf8')){$wys2=mysqli_query($db,$zap2);while($xr2=mysqli_fetch_assoc($wys2)){echo $xr2['Tytul'];};}?>"><br/>
                        </div>
                        <div id="winmain3">
                            <center><br/><button type="button" class="prsbmt" onClick="window.location.replace('portal.php')">Powrót</button>
                            <input type="submit" class="prsbmt" value="Zaktualizuj dane"></center>
                        </div> 
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>