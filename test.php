<?php
//membangun koneksi
$username="pbb";
$password="pbb123";
$database="192.168.1.14/pbb";
 
$koneksi=oci_connect($username,$password,$database);
 
if($koneksi){
echo "Koneksi berhasil";
}else{
$err=oci_error();
echo "Gagal tersambung ke ORACLE". $err['text'];
}
?>