<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "1";
$db_name = "bootcamp";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass);
//bila terkoneksi
if($koneksi){
//pilih database
mysqli_select_db($db_name);
}else{
echo "Database tidak terkoneksi";
}?>
