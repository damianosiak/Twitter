<?php
$db=mysqli_connect('127.0.0.1','root','','twitter');
if(!$db)
{
    echo "Błąd podczas łączenia z bazą danych!<br/>".mysqli_error($db);
}
?>