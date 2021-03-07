<?php
require 'function.php'; 


$id = $_GET["id"];

if( hapus($id)){
    echo "
    <script>
        alert('Data telah Dihapus');
        document.location.href = '../usera.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Data Gagal Dihapus');
        document.location.href = '../usera.php';
    </script>
    ";
}
