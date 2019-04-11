<?php
    $haslo1=$_POST['phaslo1'];
    $haslo2=$_POST['phaslo2'];

    if((empty($haslo1))OR(empty($haslo2)))
    {
        echo "<script>document.location.replace('rejestracja.php');</script>";
    }
    else if($haslo1!=$haslo2)
    {
        echo "<script>document.location.replace('rejestracja.php');alert('Wprowadzone hasła są różne!');</script>";
    }
    else if($haslo1==$haslo2)
    {
        $login=$_POST['plogin'];
        $email=$_POST['pemail'];
        $telefon=$_POST['ptelefon'];
        $kraj=$_POST['pkraj'];
        $plec=$_POST['pplec'];   
        $db=mysqli_connect('127.0.0.1','root','','twitter');
        $zapologin="SELECT * FROM uzytkownicy WHERE Login='$login'";
        $wysologin=mysqli_query($db,$zapologin);
        
        $zapoemail="SELECT * FROM uzytkownicy WHERE Email='$email'";
        $wysoemail=mysqli_query($db,$zapoemail);
        
        $zaponumer="SELECT * FROM uzytkownicy WHERE Telefon='$telefon'";
        $wysonumer=mysqli_query($db,$zaponumer);
        
        if((mysqli_num_rows($wysologin)==0)&&(mysqli_num_rows($wysoemail)==0)&&(mysqli_num_rows($wysonumer))==0)
        {
            if((($telefon>=10000000000)&&($telefon<=99999999999))&&(filter_var($email, FILTER_VALIDATE_EMAIL))&&($kraj>0)&&($kraj<16)&&($plec>0)&&($plec<3))
            {
                $pytanie=$_POST['ppytanie'];
                $odpowiedz=$_POST['podpowiedz'];
                $imie=$_POST['pimie'];
                $nazwisko=$_POST['pnazwisko'];
                $data=$_POST['pdata'];
                $miasto=$_POST['pmiasto'];
                $tytul=$_POST['ptytul'];

                $db=mysqli_connect('127.0.0.1','root','','twitter');
                $zap="INSERT INTO uzytkownicy (ID,Login,Haslo,Email,Telefon,Pytanie,Odpowiedz,Imie,Nazwisko,Plec,Kraj,Miasto,Tytul,Dataurodzenia) VALUES (NULL,'$login','$haslo2','$email','$telefon','$pytanie','$odpowiedz','$imie','$nazwisko','$plec','$kraj','$miasto','$tytul','$data')";
                if(mysqli_set_charset($db,"utf8"))
                {
                    $wys=mysqli_query($db,$zap);
                    echo "<script>window.alert('Zarejestrowano');window.location.href='rejestracja.php';</script>";
                    //echo $zap;
                }
            }
            else
            {
                echo "<script>document.location.replace('rejestracja.php');alert('Niepoprawna forma numeru telefonu lub adresu email!');</script>";
            }
        }
        else
        {
            echo "<script>document.location.replace('rejestracja.php');alert('Użytkownik o takiej nazwie, takim numerze telefonu lub adresie email już istnieje!');</script>";
        }
    }
?>