<?php
require 'function/function.php';

// ambil data di url
$id = $_GET["id"];

$mhs = query("SELECT * FROM library WHERE ID = $id")[0];

// cek apakah tombol submit sudah di click
if(isset($_POST["submit"])){
    // cek apakah data tambah berhasil
    if ( ubah($_POST) > 0){
        echo "
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = 'userA.php';
        </script>
        ";
       
    }else{
        echo "
        <script>
            alert('Data Gagal Diubah');
            document.location.href = 'userA.php';
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update -- LIB DIAR</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
#footer
{

    border-top: 2px solid white;
    height:50px;
    background:#111;
    color:#fff;
    position: absolute;
    bottom:0px;
    width:100%;
}
#footer p
{
    padding-right: 0.5cm;
    text-align: right;
    float: right;
}
#footer a
{
    margin-left:160px;
    text-decoration: none;
    color: white;
    text-align: left;
}
</style>
<body>
<ul class="topnav">
  <li><a href="http://localhost/Lib-Diar/usera.php">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#contact">Contact</a></li>
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
</ul>   
<div class="sidenav">
    <a href="http://localhost/Lib-Diar/usera.php"><img src="img/logo.png" alt=""style="height:40px;width:125px;text-align:center;"></a>
    <a href="#tab1">&#9993; ADMIN_INFO</a>
    <a href="#form">&#10009;  Tambah...</a>
    <a href="#services">&#10026; Services</a>
    <a href="#clients">&#9742; Clients</a>
    <a href="#contact">&#9990; Contact Us</a>
    <a href="logout.php">&#9754; Log out</a>
</div>
<div id="tab1">

        <br>
        <br>
        <form action="" method="post" enctype="multipart/form-data" id="form">
            <input type="hidden" name="ID" value="<?= $mhs["ID"];?>">
            <input type="hidden" name="GAMBARLAMA" value="<?= $mhs["GAMBAR"];?>">
        <ul>
            <li>
                <label for="Author"> Author : </label>
                <br>
                <input type="text" name="Author" id="Author" required value="<?= $mhs["Author"];?>">
            </li>
            <li>
                <label for="NamaDiary"> Nama Diary : </label>
                <br>
                <input type="text" name="NamaDiary" id="NamaDiary" required value="<?= $mhs["NamaDiary"];?>">
            </li>
            <li>
                <label for="Time"> Waktu : </label>
                <br>
                <input type="date" name="Time" id="Time" value="<?= $mhs["Time"];?>">
            </li>
            <li>
                <label for="Text"> Descripsi : </label>
                <br>
                <input type="text" name="Text" id="Text" value="<?= $mhs["Text"];?>">
            </li>
            <li>
                <label for="GAMBAR"> GAMBAR : </label>
                <br>
                <img src="img/<?= $mhs['GAMBAR']; ?>" alt="" width="150px" height ="160px">
                <input type="file" name="GAMBAR" id="GAMBAR">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Update !</button>
            </li>
        </ul>
    </form>
</div>
<div id="footer">
        <p>Copyright &#169; 2019 Design By Jordan Istiqlal </p>
        <a href="">&#128222; : Contact Us</a>
        <br>
        <a href="https://www.google.co.id/maps/place/Universitas+Darussalam+Gontor/@-7.9022981,111.4900853,17z/data=!3m1!4b1!4m5!3m4!1s0x2e790aa79efd972b:0xf09ed064954d29b2!8m2!3d-7.9022981!4d111.492274?hl=id">&#127984; : Find Us Here</a>
     </div>
<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}

 </script>
</body>
</html>