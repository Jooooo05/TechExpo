<?php 

require_once("function/helper.php");
require_once("function/koneksi.php");
require_once("function/function.php");

$id = $_GET["id"];
$next = $_GET["next"];

if( hapusDataById($id) > 0){
    echo "
        <scritp>
            elert('data berhasil di hapus');
            document.location.href = '$next.php';
        </scritp>
    ";
}else{
    echo "
        <scritp>
            elert('data gagal di hapus');
            document.location.href = '$next.php';
        </scritp>
    ";
}

?>