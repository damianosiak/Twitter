<!dotcype html>
<?php session_start();
error_reporting(0);

$login=$_SESSION['login'];
$haslo=$_SESSION['haslo'];
$id=$_SESSION['id'];

if((!empty($login))AND(!empty($haslo)))
    {
        echo"<script>window.location.replace('portal.php');</script>";
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <title>Twitter | Rejestracja</title>
        <link rel="stylesheet" type="text/css" href="style_portal.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <div id="main" style="height:94%">
                <form action="rejestruj.php" method="POST">
                    <div id="inmain" style="border-radius:12px;border-style:solid;border-width:1px;border-color:#1da1f2">
                        <div id="winmain0">
                            <center><h2>Zarejestruj się do Twittera!</h2></center>
                        </div>
                        <div id="winmain1">
                            <h4><label for="plogin">Login</label></h4>
                            <input type="text" id="plogin" name="plogin" required><br/>

                            <h4><label for="phaslo1">Hasło</label></h4>
                            <input type="password" id="phaslo1" name="phaslo1" required><br/>

                            <h4><label for="phaslo2">Powtórz hasło</label></h4>
                            <input type="password" id="phaslo2" name="phaslo2" required><br/>

                            <h4><label for="pemail">E-mail</label></h4>
                            <input type="text" id="pemail" name="pemail" required><br/>
                            
                            <h4><label for="ptelefon">Telefon</label></h4>
                            <input type="number" id="ptelefon" name="ptelefon" pattern="\d*" required maxlength="11" placeholder="YYXXXXXXXX" onKeyPress="if(this.value.length==11) return false;"><br/>

                            <h4><label for="ppytanie">Twoje pytanie</label></h4>
                            <input type="text" id="ppytanie" name="ppytanie" required><br/>
                            
                            <h4><label for="podpowiedz">Odpowiedź</label></h4>
                            <input type="text" id="podpowiedz" name="podpowiedz" required><br/>
                        </div>
                        
                        <div id="winmain2">
                            <h4><label for="pimie">Imię</label></h4>
                            <input type="text" id="pimie" name="pimie" required><br/>
                            
                            <h4><label for="pnazwisko">Nazwisko</label></h4>
                            <input type="text" id="pnazwisko" name="pnazwisko" required><br/>
                            
                            <h4><label for="pplec">Płeć</label></h4>
                            <select id="pplec" name="pplec" required style="width:125%;">
                                <option value="1">Mężczyzna</option>
                                <option value="2">Kobieta</option>
                            </select><br/>
                            
                            <h4><label for="pdata">Data urodzenia</label></h4>
                            <input type="date" id="pdata" name="pdata" required><br/>
                            
                            <h4><label for="pkraj">Kraj</label></h4>
                            <select id="pkraj" name="pkraj" required style="width:125%;">
                                <option value="1">Anglia</option>
                                <option value="2">Austria</option>
                                <option value="3">Czechy</option>
                                <option value="4">Francja</option>
                                <option value="5">Hiszpania</option>
                                <option value="6">Holandia</option>
                                <option value="7">Irlandia</option>
                                <option value="8">Niemcy</option>
                                <option value="9">Polska</option>
                                <option value="10">Rosja</option>
                                <option value="11">Słowacja</option>
                                <option value="12">Szwajcaria</option>
                                <option value="13">Ukraina</option>
                                <option value="14">Węgry</option>
                                <option value="15">Włochy</option>
                            </select><br/>
                            
                            <h4><label for="pmiasto">Miasto</label></h4>
                            <input type="text" id="pmiasto" name="pmiasto" required><br/>
                            
                            <h4><label for="ptytul">Tytuł</label></h4>
                            <input type="text" id="ptytul" name="ptytul" required><br/>
                        </div>
                        <div id="winmain3">
                            <br/>
                            <button onClick="window.location.replace('logowanie.php')" style="width:30%;height:35px;float:left;" class="rejbtn">Zaloguj się</button>
                            <input type="reset" value="Zresetuj" style="width:30%;height:35px;float:left;" class="rejbtn">
                            <input type="submit" value="Zarejestruj się" style="width:40%;height:35px;float:left;" class="rejbtn">
                        </div> 
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>