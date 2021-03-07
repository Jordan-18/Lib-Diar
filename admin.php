<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location:login/index.php");
    exit;
}
require 'function/function.php'; 
$admin = query("SELECT * FROM super_admin");
// $opsi = query("SELECT * FROM super_admin group by nama");

if(isset($_POST['cari'])){
$admin =cari2($_POST["keyword"]);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Lib-Diar</title>
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
    position: relative;;
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
  <!-- <li><a href="#contact"><img src="img/<?= $_POST[""] ?>" style="border-radius:50%; width:50px; height:50px;"></a></li> -->
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
</ul>   
<div class="sidenav">
    <a href="http://localhost/Lib-Diar/usera.php"><img src="img/logo.png" alt=""style="height:40px;width:125px;text-align:center;"></a>
    <a href="#tab1">&#9993; ADMIN_INFO</a>
    <a href="">&#10009;  Tambah...</a>
    <a href="#services">&#10026; Services</a>
    <a href="#clients">&#9742; Clients</a>
    <a href="#footer">&#9990; Contact Us</a>
</div>
<div id="tab1">
    <form action="" method="post"  style="text-align:right;">
        <input type="text" name="keyword" placeholder ="Masukan Keyword..." size="30" style="opacity:50%;margin-bottom:10px;" autofocus>
        <button type="submit" name="cari" style="opacity:50%;"><img src="img/pembesar.png" style="height:16px;width:16px;"></button>
    </form>
        <table border="1" class="table table-stripted">
            <tr>
                <th>No</th>
                <th>Profil</th>
                <th>Name</th>
                <th>Jumlah Post</th>
                <th>View</th>
            </tr>
            <?php $i=1;?>
            <?php foreach($admin as $row): ?>
                <tr>
                    <td><?= $i?></td>
                    <td><img src="img/<?= $row["PROFIL"];?>" width="60" height="80"></td>
                    <td><?= $row["USER"];?></td>
                    <td><?= count($row["POST"]);?></td>
                    <td><?= $row["VIEW"];?></td>
                </tr>
            <?php $i++;?>
            <?php endforeach;?>
        </table>
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