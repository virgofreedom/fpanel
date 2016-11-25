<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Facebook meta -->
    <?php 
    include LIB_PATH.'fp_post_meta.php';
    ?>
    <!--End Facebook meta -->

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?=VIRTUAL_PATH_SITE?>themes/panhara/styles/main.css" />
    <link rel="stylesheet" href="<?=VIRTUAL_PATH_SITE?>themes/panhara/styles/size.css" />
    <link rel="stylesheet" href="<?=VIRTUAL_PATH_SITE?>themes/panhara/css/foundation-icons/foundation-icons.css">
    <link rel="stylesheet" href="<?=VIRTUAL_PATH_SITE?>themes/panhara/css/foundation.css" />
    <link rel="stylesheet" href="<?=VIRTUAL_PATH_SITE?>themes/panhara/css/foundation6.css" />
    <link rel="stylesheet" href="<?=VIRTUAL_PATH_SITE?>themes/panhara/css/foundation-icons/size.css">
    <link rel="stylesheet" href="<?=VIRTUAL_PATH_SITE?>themes/panhara/css/fractionslider.css">
    <meta name="author" content="Panhara">
    <meta name="description" content="panhara, Cambodia junior web designer and development">
    <meta name="keywords" content="panhara web, khmer web design, panhara web design, cambodia web design,
     panhara website, freelancer panhara website, panhara web design cambodia, tuarus cambodia design">
    <title><?=$titile?></title>
    <link rel="icon" href="images/mypic.png">
  </head>

  <body>
    <p class="show-for-small-only underConstruction"
    style="text-align:center; margin-top:180px;font-family: Montserrat;
    font-size:14px;text-transform:uppercase;">
      <span class="fi-alert size-36" style="color:yellow;">
        <span style="color:#000; font-weight:bold;font-size:30px;"> Sorry!</span>
      </span><br><span style="text-decoration:underline;">Mobile Phone Device Is Under Construction.</span>
    </p>
    <span class="hide-for-small-only">
      <div class="row">
          <div class="small-12 medium-12 large-12 columns">
              <h1 id="sitetitle">Tuarus</h1>
          </div>
      </div>

      <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
          <button class="menu-icon" type="button" data-toggle></button>
          <div class="title-bar-title">Menu</div>
      </div>

      <div class="top-bar menu-centered" id="main-menu">
        <?php 
        fp_menu("no","dropdown menu",'data-dropdown-menu');
        ?>
        
      </div>

      <section id="section1">
            <div class="slider-wrapper">
              <div class="responisve-container">
                <div class="slider-content">
                  <div class="slide" data-in="scrollRight">
                    <img data-fixed src="images/pic2.jpg">
                    <a  href="portfolio.html"
                        class="firstSlide" data-position="280,150"
                        data-in="right" data-step="1" data-delay="500"
                        value="Button">Get Started
                    </a>

                    <p
                        class="qoute1" data-position="50,150"
                        data-in="top" data-step="1" data-out="left"
                        ><span style="color:#fff;">Change Your <span style="color:#4183D7;">Design</span></span>
                    </p>

                    <p
                        class="qoute2" data-position="150,150"
                        data-in="right" data-step="1" data-out="left"
                        ><span style="color:#8E44AD">Grow Your Bussiness</span>
                    </p>

                  </div>

                  <div class="slide" data-in="scrollRight">
                    <img data-fixed src="images/pic1.jpg">
                    <a  href="portfolio.html"
                        class="secondSlide" data-position="280,1000"
                        data-in="right" data-step="2" data-delay="500"
                        value="Button">Get Started
                    </a>
                    <p
                        class="qoute1" data-position="50,1000"
                        data-in="top" data-step="1" data-out="left"
                        ><span style="color:#fff;">Craft Your <span style="color:#4183D7;">Design</span></span>
                    </p>
                    <p
                        class="qoute2" data-position="150,1000"
                        data-in="right" data-step="2" data-out="left"
                        ><span style="color:#F9690E">Feel And Look </span>
                    </p>
                  </div>

                  <div class="slide" data-in="scrollRight">
                    <img data-fixed src="images/pic17.jpg">
                    <a  href="portfolio.html"
                        class="thirdSlide" data-position="280,1000"
                        data-in="right" data-step="3" data-delay="500"
                        value="Button">Get Started
                    </a>
                    <p
                        class="qoute1" data-position="50,1000"
                        data-in="top" data-step="1" data-out="left"
                        ><span style="color:#fff;">Make Your <span style="color:#4183D7">Design</span></span>
                    </p>
                    <p
                        class="qoute2" data-position="150,1000"
                        data-in="right" data-step="2" data-out="left"
                        ><span style="color:#36D7B7">To Be Responsive </span>
                    </p>
                  </div>
                  </div>
                </div>
              </div>
      </section>