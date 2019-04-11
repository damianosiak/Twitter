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
        <title>Twitter</title>
        <link rel="stylesheet" type="text/css" href="style_portal.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <div id="navbar">
                <div id="nvb1" class="nvbclass">&nbsp;</div>
                <div id="nvb2" class="nvbclass">
                    <a href="portal.php" id="nvb2home" style="color:#1da1f2"><i class="fas fa-home fa-lg" style="color:#1da1f2"></i> Home</a>
                    <a href="" id="nvb2wiadomosci"><i class="fas fa-envelope fa-lg"></i> Wiadomości</a>
                </div>
                <div id="nvb3" class="nvbclass">
                    <a href="portal.php" id="nvb3logo" style="margin-left:45%;"><i class="fab fa-twitter fa-lg" style="color:#1da1f2"></i></a>
                </div>
                <div id="nvb4" class="nvbclass">
                    <a href="profil.php" id="nvb4profil"><i class="fas fa-user-circle fa-lg"></i>
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
            
            <div id="main">
                <div id="inmain" style="border-radius:12px;border-style:solid;border-width:1px;border-color:#1da1f2;">
                    <div id="dp">
                        <div id="divdodajpost">
                            <form action="" method="POST">
                                <textarea id="tekstdodajpost" name="tekstdodajpost" placeholder="Co się dzieje?" required></textarea>
                                <button type="reset" class="postbutton">Wyczyść</button><button type="submit" name="submit" class="postbutton">Dodaj</button>
                            </form>
                        </div>
                    </div>
                    
                    <div id="allposty">
                    <?php
                        error_reporting(0);
                        $id=$_SESSION['id'];
                        $db=mysqli_connect('127.0.0.1','root','','twitter');
                        if(!$db)
                        {
                            echo "Błąd podczas łączenia z bazą danych!<br/>".mysqli_error($db);
                        }
                        else
                        {
                            $zapytaniew="SELECT posty.Tresc_post,uzytkownicy.Imie,uzytkownicy.Nazwisko,uzytkownicy.Login,posty.IDpostu,posty.Datapostu,posty.ID_uzytkownika FROM posty,uzytkownicy WHERE posty.ID_uzytkownika=uzytkownicy.ID ORDER BY IDpostu DESC";
                            $wyslaniew=mysqli_query($db,$zapytaniew);
                            
                                //echo "<table border='1'><tr><td>Użytkownik</td><td>Imię</td><td>Nazwisko</td><td>Treść postu</td></tr>";
                                while($xrow=mysqli_fetch_assoc($wyslaniew))
                                {
                                    //echo "<tr><td>".$xrow['Login']."</td><td>".$xrow['Imie']."</td><td>".$xrow['Nazwisko']."</td><td>".$xrow['Tresc_post']."</td></tr>";
                                    //echo "<div class='portalpost' style='width:100%;'><div class='postautor'><span style='font-weight:bold;'>".$xrow['Imie']." ".$xrow['Nazwisko']."</span><span>(".$xrow['Login'].")</span></div><div class='posttresc'><span>".$xrow['Tresc_post']."</span></div></div><hr>";
                                    echo "<div class='portalpost' style='width:95%;margin-left:5%;'><div class='postautor'><span style='font-weight:bold;'>".$xrow['Imie']." ".$xrow['Nazwisko']."</span><span>&nbsp;(".$xrow['Login'].")</span><span style='position:relative;left:45%;font-size:12px;'>".$xrow['Datapostu']."</span></div><div class='posttresc'contentEditable='false'><div style='width:85%;margin-left:5%;background-color:#E8F5FD;resize:both;display:inline-block;min-height:50px;outline-style:none;border-radius:12px;border:none;'>".$xrow['Tresc_post']."</div></div>".($id==$xrow['ID_uzytkownika'] ? "<form action=''method='POST' style='position:relative;left:93%;margin-top:-3%'><button value='".$xrow['IDpostu']."' name='uspst' id='uspst' style='color:red;'>&#10006;</button></form>" : "")."</div><hr>";
                                    
                                };
                                //echo "</table>";
                            
                    
                        }
                    ?>
                
                    </div>
                </div>
            </div>
        </div>

                <?php
                        if(isset($_POST['submit']))
                        {
                            echo "<meta http-equiv='refresh' content='0'>";
                            error_reporting(0);
                            $id=$_SESSION['id'];
                            $db=mysqli_connect('127.0.0.1','root','','twitter');
                            if(!$db)
                            {
                                echo "Błąd podczas łączenia z bazą danych!<br/>".mysqli_error($db);
                            }
                            else
                            {
                                if(mysqli_set_charset($db,"utf8"))
                                {
                                    $trescpost=$_POST['tekstdodajpost'];
                                    $data=date('Y-m-d H:i:s');
                                    $zapytanie="INSERT INTO posty (IDpostu,ID_uzytkownika,Tresc_post,Datapostu) VALUES (NULL,'$id','$trescpost','$data')";
                                    $wyslanie=mysqli_query($db,$zapytanie);
                                }

                            }
                        }
                    ?>
        
                <?php
                    if(isset($_POST['uspst']))
                    {
                        $idpst=$_POST['uspst'];
                        //echo "<script>alert($idpst);</script>";
                        $db=mysqli_connect('127.0.0.1','root','','twitter');
                        if(mysqli_set_charset($db,"utf8"))
                        {
                            $zapx="SELECT ID_uzytkownika FROM posty WHERE IDpostu='$idpst'";
                            $wysx=mysqli_query($db,$zapx);
                            //$ilosc=mysqli_num_rows($wysx);
                            //echo "<script>alert($ilosc);</script>";
                            if(mysqli_num_rows($wysx)==1)
                            {
                                while($xbmp=mysqli_fetch_assoc($wysx))
                                {
                                    $kiox=$xbmp['ID_uzytkownika'];
                                };
                                $kajo=$_SESSION['id'];
                                if($kajo==$kiox)
                                {
                                    //echo "<script>alert('Test');</script>";
                                    $zapo="DELETE FROM posty WHERE IDpostu='$idpst'";
                                    $usx=mysqli_query($db,$zapo);
                                    echo"<script>window.location.replace('portal.php');</script>";
                                }
                            }
                            
                        }
                    }
                ?>
    </body>
</html>