<?php

require '../function/function.php';
$jumlahdataperhalaman = 12;
$jumlahdata=count(query("SELECT * FROM library"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);

$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;


$user = query("SELECT * FROM library ORDER BY id DESC LIMIT $awaldata,$jumlahdataperhalaman ");

if(isset($_POST['cari']))
{
    $user = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lib-Diar -Tempat mengisi diary harian kita</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->

</head>
<style> 
.pager{padding-left:0;margin:20px 0;text-align:center;list-style:none;}
.pager li{display:inline;float:left;}
.pager li>a,.pager li>span{display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px;}
.pager li>a:focus,.pager li>a:hover{text-decoration:none;background-color:#eee;}
.pager .next>a,.pager .next>span{float:right}.pager .previous>a,.pager .previous>span{float:left;}
.pager .disabled>a,.pager .disabled>a:focus,.pager .disabled>a:hover,.pager .disabled>span{color:#777;cursor:not-allowed;background-color:#fff;}
</style>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="../img/logo.png" alt=""style="height:60px;width:200px;text-align:center;"></a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">News</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Regards</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" >
            <form action="" method="post"  style="text-align:right;" >
        <input type="text" name="keyword" placeholder ="Masukan Keyword..." size="30" style="opacity:80%; border-radius: 10px 0px 0px 10px;" >
        <button type="submit" name="cari" style="border-radius: 0px 10px 10px 0px;" ><img src="../img/pembesar.png" style="height:16px;width:16px;"></button>
            </form>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="../img/reading.png" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Lib-Diar</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Library Of Diary Day</p>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Come on express yourself</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row" id="data">
      <?php $j=1;?>
      <?php foreach($user as $row) : ?>      
        <!-- Portfolio Item 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal<?= $j ?>">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="../img/<?= $row["Gambar"];?>"style="width:400px; height:200px;">
          </div>
        </div>
      <?php $j++ ?>
        <?php endforeach;?>
    </div>
  </section>
  <?php for($i = 1;$i <= $jumlahhalaman;$i++):?>

  <nav aria-label="...">
    <ul class="pager">
<?php if( $i == $halamanaktif ) :?>
  <li>
    <a href="?halaman=<?= $i; ?>"style="font-weight:bold;color:red;"><?= $i ?></a>
  </li>
    <?php else :?>
  <li>
  <a href="?halaman=<?= $i; ?>" id="halaman"><?= $i ?></a>
  </li>
    <?php endif;?>
    <?php endfor;?>
    </ul>
</nav>    

  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">Lib-diar is a place to express yourself in the form of stories or can be a forum for the hearts of every human in their lives</p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">There you can maximize your complaints about the burden or your happy story on that day so that it can be remembered until the future.</p>
        </div>
      </div>

      <!-- About Section Button -->
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="https://www.facebook.com/jordan.istiqlalqalbi">
          <i class="fas fa-download mr-2"></i>
          Contact The Owner
        </a>
      </div>

    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">THANK'S FOR VISIT</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          
          
          <!-- <form name="sentMessage" id="contactForm" novalidate="novalidate" method="post" action="">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Name</label>
                <input class="form-control" name="name" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Address</label>
                <input class="form-control" name="email" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Phone Number</label>
                <input class="form-control" name="Phone" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Message</label>
                <textarea class="form-control" name="pesan" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" name="sendMessageButton" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
            </div>
          </form> -->



        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">Universitas Darussalam Gontor
            <br> Siman ,Ponorogo</p>
        </div>

        <!-- Footer Social Icons -->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Around the Web</h4>
            <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/jordan.istiqlalqalbi">
              <i class="fab fa-fw fa-facebook-f"></i>
            </a>
            <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/jordan.istiqlalqalbi">
              <i class="fab fa-fw fa-twitter"></i>
            </a>
            <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/Jordan-18">
              <i class="fab fa-fw fa-linkedin-in"></i>
            </a>
            <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/Jordan-18">
              <i class="fab fa-fw fa-dribbble"></i>
            </a>
          </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Lib-Diar</h4>
          <p class="lead mb-0">Learn more details about us with 
            <a href="../login/register.php">Start Create Account</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &#169; 2020 Design By Jordan Istiqlal</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
  <?php $j=1;?>
  <?php foreach($user as $sow ) :?>
  <div class="portfolio-modal modal fade" id="portfolioModal<?= $j ?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <input type="hidden" name="ID" value="<?= $user["id"];?>">
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" value="<?= $sow["NamaDiary"];?>"><?= $sow["NamaDiary"];?></h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="../img/<?= $sow["Gambar"];?>"style="width:400px; height:200px;" value="<?= $sow["id"];?>">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5"><?= $sow["Text"];?><a href="">Read me more....</a></p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $j++ ?>
  <?php endforeach;?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
  <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "085790774702", // WhatsApp number
            telegram: "jordanistiqlal", // Telegram bot username
            call_to_action: "Message us", // Call to action
            button_color: "#A8CE50", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,telegram", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

</body>

</html>
