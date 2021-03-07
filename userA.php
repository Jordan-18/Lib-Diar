<?php
session_start();
require 'function/function.php';
if (!isset($_SESSION["login"])){
    header("Location:login/index.php");
    exit;
}
$username = $_SESSION['username'];
$admina = query("SELECT * FROM library WHERE Author = '$username'  ORDER BY id DESC ");
// $admina = query("SELECT * FROM library ORDER BY id");
if(isset($_POST['cari'])){
    $admina =cari($_POST["keyword"]);
    }
if(isset($_POST["submit"])){
        // cek apakah data tambah berhasil
    if (tambah($_POST) > 0){
            echo "
            <script>
                alert('Data Berhasil Ditambah');
                document.location.href = 'userA.php';
            </script>
            ";
}else{
            echo "
            <script>
                alert('Data Gagal Ditambah');
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
    <title>ADMIN USER LIB DIAR</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<style>
/* sytle ke-2 */
.sidenav 
{
  background-color: white;
  border-right:2px solid black;
}
.sidenav a{
  font-size:14pt;
}
.sidenav a:hover {
  color: rgb(255, 174, 0);
}
ul.topnav {
  background-color: rgb(26, 128, 1);;
}
ul.topnav li a:hover {background-color: rgb(255, 174, 0);}
table tr th
{
  background-color: rgb(8, 219, 8);
}
/* tutup style ke-2 */
#footer
{

    border-top: 2px solid white;
    height:50px;
    background:rgb(26, 128, 1);;
    color:#fff;
    position: relative;
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
  <div style="float:right;">
  <li><a href="" ><img src="img/<?= $admina['0']["Gambar"];?>" style="border-radius:30px;height:23px;width:30px;"></a></li> 
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
  </div> 
</ul>
  
<div class="sidenav">
    <a href="http://localhost/Lib-Diar/usera.php"><img src="img/logo.png" alt=""style="height:40px;width:125px;border-bottom:2px solid rgb(85, 84, 84); "></a>
    <a href="#tab1" style="font-size:13pt;margin-top:14px;" >&#9993; ADMIN_INFO</a>
    <a href="form.php" action="form.php" name="tambah" method="POST">&#10009;  Tambah...</a>
    <a href="#services">&#10026; Services</a>
    <a href="#clients">&#9742; Clients</a>
    <a href="#footer">&#9990; Contact Us</a>
    <a href="logout.php">&#9754; Log out</a>
</div>
<div id="tab1">
    <form action="" method="post"  style="text-align:right;">
        <input type="text" name="keyword" placeholder ="Masukan Keyword..." size="30" style="margin-bottom:10px;border-radius: 10px 0px 0px 10px;" autofocus>
        <button type="submit" name="cari" style="opacity:50%;border-radius: 0px 10px 10px 0px;"><img src="img/pembesar.png" style="height:16px;width:16px;"></button>
    </form>
        <table border="1" class="table table-striped">
            <tr>
                <th>No</th>
                <th>Profil</th>
                <th>Name</th>
                <th>Jumlah Post</th>
                <th>View</th>
            </tr>
            <?php $i=1;?>
            <?php foreach($admina as $row): ?>
                <tr >
                    <td><?= $i?></td>
                    <td><img src="img/<?= $row["Gambar"];?>" Style="width:80px; height:60px;"></td>
                    <td><a href=""><?= $row["NamaDiary"];?></a></td>
                    <td><?= count($row["NamaDiary"]);?></td>
                    <td>
        <button style="background-color:green;"><a style="color:#333"href="tambah.php?id=<?= $row["ID"];?>">Ubah</a></button> |
        <button style="background-color:red;"><a style="color:#333" href="function/hapus.php?id=<?= $row["ID"];?>" onclick="return confirm('Yakin ?');">Hapus</a></button>
                    </td>
                </tr>
            <?php $i++;?>
            <?php endforeach;?>
        </table>
        <br>
        <br>
</div>
<div id="footer">
        <p>Copyright &#169; 2019 Design By Jordan Istiqlal </p>
        <a href="">&#128222; : Contact Us</a>
        <br>
        <a href="https://www.google.co.id/maps/place/Universitas+Darussalam+Gontor/@-7.9022981,111.4900853,17z/data=!3m1!4b1!4m5!3m4!1s0x2e790aa79efd972b:0xf09ed064954d29b2!8m2!3d-7.9022981!4d111.492274?hl=id">&#127984; : Find Us Here</a>
     </div>
     <script src="js/javas.js"></script>
<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}


 </script>
   
</body>
</html>