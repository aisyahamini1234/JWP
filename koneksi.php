<?php
$koneksi = new mysqli ("localhost","root","","jwp");
// cek koneksi
if($koneksi){
    echo "berhasil";
}else{
    echo "gagal";
}
?>