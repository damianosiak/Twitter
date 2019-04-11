<?php session_start();
    $login=$_SESSION['login'];
    $haslo=$_SESSION['haslo'];
    $id=$_SESSION['id'];

    if((empty($login))AND(empty($haslo)))
    {
        echo"<script>window.location.replace('logowanie.php');</script>";
    }
    else
    {
        $haslo1=$_POST['phaslo1'];
        $haslo2=$_POST['phaslo2'];
        $telefon=$_POST['ptelefon'];
        $kraj=$_POST['pkraj'];
        $plec=$_POST['pplec'];
        if((($telefon>=10000000000)&&($telefon<=99999999999))&&($kraj>0)&&($kraj<16)&&($plec>0)&&($plec<3))
        {
            $db=mysqli_connect('127.0.0.1','root','','twitter');
            $zap0="SELECT * FROM uzytkownicy WHERE Telefon='$telefon'";
            if(mysqli_set_charset($db,"utf8"))
            {
                $wys0=mysqli_query($db,$zap0);
                if(mysqli_num_rows($wys0)==1)
                {
                    while($kio=mysqli_fetch_assoc($wys0))
                    {
                        $kspr=$kio['Telefon'];
                        $kaop=$kio['ID'];
                    };
                    if(($telefon==$kspr)AND($id==$kaop))
                    {
                        $imie=$_POST['pimie'];
                        $nazwisko=$_POST['pnazwisko'];
                        $data=$_POST['pdata'];
                        $miasto=$_POST['pmiasto'];
                        $tytul=$_POST['ptytul'];

                        $zap="UPDATE uzytkownicy SET Haslo='$haslo2',Telefon='$telefon',Imie='$imie',Nazwisko='$nazwisko',Plec='$plec',Dataurodzenia='$data',Kraj='$kraj',Miasto='$miasto',Tytul='$tytul' WHERE ID='$id'";
                        if(mysqli_set_charset($db,"utf8"))
                        {
                            $wys=mysqli_query($db,$zap);
                            echo "<script>window.alert('Zaktualizowano dane');window.location.href='profil.php';</script>";
                            //echo $zap;
                        }
                    }
                    else
                    {
                        echo "<script>window.alert('Numer telefonu jest zajęty! ');window.location.href='profil.php';</script>";
                    }
                }
                else if(mysqli_num_rows($wys0)==0)
                {
                    $imie=$_POST['pimie'];
                    $nazwisko=$_POST['pnazwisko'];
                    $data=$_POST['pdata'];
                    $miasto=$_POST['pmiasto'];
                    $tytul=$_POST['ptytul'];

                    $zap="UPDATE uzytkownicy SET Haslo='$haslo2',Telefon='$telefon',Imie='$imie',Nazwisko='$nazwisko',Plec='$plec',Dataurodzenia='$data',Kraj='$kraj',Miasto='$miasto',Tytul='$tytul' WHERE ID='$id'";
                    if(mysqli_set_charset($db,"utf8"))
                    {
                        $wys=mysqli_query($db,$zap);
                        echo "<script>window.alert('Zaktualizowano dane');window.location.href='profil.php';</script>";
                        //echo $zap;
                    }
                }
            }
            
            //$imie=$_POST['pimie'];
            //$nazwisko=$_POST['pnazwisko'];
            //$data=$_POST['pdata'];
            //$miasto=$_POST['pmiasto'];
            //$tytul=$_POST['pkraj'];

            //$zap="UPDATE uzytkownicy SET Haslo='$haslo2',Telefon='$telefon',Imie='$imie',Nazwisko='$nazwisko',Plec='$plec',Dataurodzenia='$data',Kraj='$kraj',Miasto='$miasto',Tytul='$tytul' WHERE ID='$id'";
            //if(mysqli_set_charset($db,"utf8"))
            //{
                //$wys=mysqli_query($db,$zap);
                //echo "<script>window.alert('Zaktualizowano dane');window.location.href='profil.php';</script>";
                //echo $zap;
            //}
        }
        else
        {
            echo "<script>window.alert('Sprawdź poprawność formularza!');window.location.href='profil.php';</script>";
        }
    }
?>