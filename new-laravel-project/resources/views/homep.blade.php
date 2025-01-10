<!DOCTYPE html>
<html lang="en">
<head>
<title>Car Repair</title>
<style> /* Getting the new tags to behave */
article, aside, audio, canvas, command, datalist, details, embed, figcaption, figure, footer, header, hgroup, keygen, meter, nav, output, progress, section, source, video {
	display:block;
}
mark, rp, rt, ruby, summary, time {
	display:inline;
}
/* Global properties ======================================================== */
html {
	width:100%;
	height:100%;
}
body {
	font-family:Arial, Helvetica, sans-serif;
	font-size:100%;
	color:#7f7f7f;
	min-width:960px;
	height:100%;
	background:url(../images/body-bg.jpg) center top repeat #151515
}
.ic {
	border:0;
	float:right;
	background:#fff;
	color:#f00;
	width:50%;
	line-height:10px;
	font-size:10px;
	margin:-220% 0 0 0;
	overflow:hidden;
	padding:0
}
.main-bg {
	width:100%;
	min-height:100%;
	background:url(../images/bg-2.jpg) center top repeat-x;
}
.bg {
	width:100%;
	min-height:100%;
	background:url(../images/bg.jpg) center top no-repeat;
}
.main {
	width:960px;
	padding:0;
	margin:0 auto;
	font-size:13px;
	line-height:24px;
}
a {
	color:#b22300;
	outline:none;
}
a:hover {
	text-decoration:none;
}
.col-1, .col-2 {
	float:left;
	width:160px;
}
.col-1 {
	margin-right:50px;
}
.wrapper {
	width:100%;
	overflow:hidden;
}
.extra-wrap {
	overflow:hidden;
}
p {
	margin-bottom:18px;
}
.p0 {
	margin-bottom:0px;
}
.p1 {
	margin-bottom:8px;
}
.p2 {
	margin-bottom:15px;
}
.p3 {
	margin-bottom:30px;
}
.p4 {
	margin-bottom:45px;
}
.p5 {
	margin-bottom:50px;
}
.fleft {
	float:left;
}
.fright {
	float:right;
}
.alignright {
	text-align:right;
}
.aligncenter {
	text-align:center;
}
.color-1 {
	color:#fff;
}
.color-2 {
	color:#000;
}
.color-3 {
	color:#b22300;
}
/*********************************boxes**********************************/
.indent {
	padding:41px 30px 0 0;
}
.indent-top {
	padding-top:15px;
}
.indent-left {
	padding-left:30px;
}
.indent-left2 {
	padding-left:10px;
}
.indent-right {
	padding-right:50px;
}
.indent-bot {
	margin-bottom:20px;
}
.indent-bot2 {
	margin-bottom:30px;
}
.indent-bot3 {
	margin-bottom:45px;
}
.prev-indent-bot {
	margin-bottom:10px;
}
.prev-indent-bot2 {
	margin-bottom:5px;
}
.img-indent-bot {
	margin-bottom:25px;
}
.margin-bot {
	margin-bottom:35px;
}
.img-indent {
	float:left;
	margin:0 19px 0px 0;
}
.img-indent2 {
	float:left;
	margin:0 25px 0px 0;
}
.img-indent3 {
	float:left;
	margin:0 30px 0px 0;
}
.img-indent-r {
	float:right;
	margin:0 0px 0px 40px;
}
.buttons a:hover {
	cursor:pointer;
}
.menu li a, .list-1 li a, .link, .link-1, .link-2, .button, h1 a {
	text-decoration:none;
}
/*********************************header*************************************/
header {
	width:100%;
	position:relative;
	z-index:2;
}
h1 {
	padding:45px 20px 37px 26px;
	background:url(../images/h1-bg.jpg) 0 0 no-repeat;
	float:left;
}
h1 a {
	display:block;
	width:230px;
	height:55px;
	text-indent:-999em;
	background:url(../images/logo.png) 0 0 no-repeat;
}
.address {
	display:block;
	font-size:14px;
	line-height:28px;
	text-align:right;
	color:#b22300;
}
.phone {
	display:block;
	font-size:25px;
	line-height:30px;
	text-align:right;
	color:#fff;
	margin-top:-5px;
}
/***** menu *****/
header nav {
	width:100%;
	height:52px;
	background:url(../images/menu-bg.jpg) 0 0 no-repeat;
	overflow:hidden;
}
#page1 header nav {
	margin-bottom:28px;
}
.menu li {
	float:left;
	position:relative;
	background:url(../images/menu-spacer.gif) left top no-repeat;
}
.menu > li:first-child {
	background:none;
}
.menu li a {
	display:inline-block;
	font-size:18px;
	line-height:25px;
	padding:12px 28px 12px 29px;
	color:#808080;
	text-transform:capitalize;
}
.menu > li:first-child > a {
	text-indent:-999em;
	background:url(../images/menu-home.png) center -25px no-repeat;
	min-width:22px;
}
.menu li a.active, .menu > li > a:hover {
	color:#fff;
}
.menu > li:first-child > a.active, .menu > li:first-child > a:hover {
	background-position:center 15px;
}

/***** slider *****/
.slider-wrapper {
	width:960px;
	height:400px;
	overflow:hidden;
	position:relative;
}
.slider {
	width:960px;
	height:400px;
}
.items {
	display:none;
}
.prev, .next {
	display:block;
	width:80px;
	height:400px;
	text-indent:-9999em;
	position:absolute;
	z-index:99;
	top:50%;
	margin-top:-200px;
}
.prev {
	background:url(../images/slider-prev.png) 0 0 no-repeat;
	left:0;
}
.next {
	background:url(../images/slider-next.png) 0 0 no-repeat;
	right:0;
}
/*********************************content*************************************/
#content {
	width:100%;
	padding:43px 0;
	position:relative;
	z-index:1;
}
.spacer-1 {
	width:100%;
	background:url(../images/pic-1.gif) 217px 0 repeat-y;
}
h2 {
	font-size:40px;
	line-height:1.2em;
	color:#fff;
	font-weight:normal;
	letter-spacing:-1px;
	margin-bottom:9px;
}
h3 {
	font-size:25px;
	line-height:2em;
	color:#fff;
	margin-bottom:2px;
}
h3 strong {
	display:block;
	margin-top:-25px;
}
h4 {
	font-size:18px;
	line-height:25px;
	color:#f0f0f0;
	font-weight:normal;
	margin-bottom:8px;
}
h6 {
	color:#fff;
	font-weight:normal;
	margin-bottom:3px;
}
.border-bot {
	width:100%;
	padding-bottom:31px;
	background:url(../images/pic-1.gif) 0 bottom repeat-x;
}
.border-bot2 {
	width:100%;
	padding-bottom:23px;
	margin-bottom:18px;
	background:url(../images/pic-1.gif) 0 bottom repeat-x;
}
.box {
	width:260px;
	background:#151515;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
}
.box .padding {
	padding:15px 15px 20px 30px;
}
.container-bot {
	width:100%;
	padding-bottom:6px;
	background:url(../images/container-bot.png) left bottom no-repeat;
}
.container-top {
	width:100%;
	padding-top:6px;
	background:url(../images/container-top.png) left top no-repeat;
}
.container {
	width:100%;
	padding:20px 0 40px;
	background:url(../images/container-tail.png) left top repeat-y;
}
.button {
	display:inline-block;
	padding:5px 15px 6px;
	font-size:13px;
	line-height:1.23em;
	font-weight:bold;
	color:#000;
	background:url(../images/button-tail.gif) 0 0 repeat-x #fb4400;
	cursor:pointer;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
}
.button:hover {
	background:#fb4400;
	color:#fff;
}
.list-1 li {
	line-height:18px;
	padding:8px 0 8px 10px;
	background:url(../images/marker-1.gif) 0 15px no-repeat;
}
.list-1 a {
	display:inline-block;
	color:#7f7f7f;
	font-weight:bold;
}
.list-1 a:hover {
	color:#b22300;
}
.list-2 li {
	line-height:20px;
	padding:5px 0 5px 10px;
	background:url(../images/marker-1.gif) 0 13px no-repeat;
}
.list-2 a {
	display:inline-block;
}
.list-2 a:hover {
	text-decoration:none;
}
#page4 .list-2 a {
	color:#7f7f7f;
	text-decoration:none;
}
#page4 .list-2 a:hover {
	text-decoration:underline;
}
.link:hover {
	text-decoration:underline;
}
.link-1 {
	display:inline-block;
	font-weight:bold;
	padding-left:14px;
	color:#fff;
	background:url(../images/marker-2.gif) 0 10px no-repeat;
}
.link-1:hover {
	text-decoration:underline;
}
.link-2 {
	color:#7f7f7f;
}
.link-2:hover {
	text-decoration:underline;
}
.text-1, .text-2 {
	display:inline-block;
	font-size:40px;
	line-height:1.2em;
	color:#fff;
	letter-spacing:-1px;
}
dl span {
	float:left;
	width:80px;
}
dl.main-address dt {
	margin-bottom:5px;
}
dl.main-address span {
	float:left;
	width:74px;
	color:#fff;
}
.price-list td {
	border:1px solid #343434;
	line-height:39px;
}
.price-list thead td {
	width:139px;
	text-align:center;
	color:#fff;
	font-weight:bold;
}
.price-list td:first-child {
	width:158px;
}
.price-list tbody td:first-child {
	color:#fff;
	font-weight:bold;
	text-align:left;
	text-indent:19px;
}
.price-list tbody td {
	text-align:center;
}
/**** Lightbox ****/
.lightbox {
	position:relative;
	z-index:1;
	overflow:hidden;
	display:inline-block;
	cursor:pointer;
}
.lightbox img {
	position:relative;
	z-index:1;
}
.lightbox span {
	display:inline-block;
	position:absolute;
	left:0px;
	top:0;
	width:100%;
	height:100%;
	background:url(../images/video-marker.png) no-repeat 50% 50%;
	z-index:2;
	padding:0;
}
/***** contact form *****/
#contact-form {
	display:block;
	width:100%;
}
#contact-form label {
	display:block;
	height:34px;
	overflow:hidden;
}
#contact-form input {
	float:left;
	width:259px;
	font-size:13px;
	line-height:1.23em;
	color:#808080;
	padding:5px 10px;
	margin:0;
	font-family:Arial, Helvetica, sans-serif;
	border:none;
	background:#fff;
	outline:none;
	border-radius:2px;
	-moz-border-radius:2px;
	-webkit-border-radius:2px;
}
#contact-form textarea {
	float:left;
	height:380px;
	width:489px;
	max-height:380px;
	max-width:489px;
	min-height:380px;
	min-width:489px;
	font-size:12px;
	line-height:1.25em;
	color:#808080;
	padding:5px 10px;
	margin:0;
	font-family:Arial, Helvetica, sans-serif;
	border:none;
	background:#fff;
	overflow:auto;
	outline:none;
	border-radius:2px;
	-moz-border-radius:2px;
	-webkit-border-radius:2px;
}
.text-form {
	float:left;
	display:block;
	font-size:13px;
	line-height:26px;
	width:70px;
	color:#7f7f7f;
	font-family:Arial, Helvetica, sans-serif;
}
.buttons {
	padding:20px 10px 0 0;
	text-align:right;
}
.buttons a {
	margin-left:15px;
	padding:5px 32px 6px;
}
/****************************footer************************/
footer {
	width:100%;
	padding:0 0 40px;
	text-align:center;
}
footer span {
	display:block;
}

</style>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style-new.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Vegur_500.font.js" type="text/javascript"></script>
<script src="js/FF-cash.js" type="text/javascript"></script>
<script src="js/tms-0.3.js" type="text/javascript"></script>
<script src="js/tms_presets.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.equalheights.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>
<body id="page1">
<div class="main-bg">
  <div class="bg">
    <!--==============================header=================================-->
    <header>
      <div class="main">
        <div class="wrapper">
          <h1><a href="homep.php">Car Repair</a></h1>
          <div class="fright">
            <div class="indent"> <span class="address">8901 Marmora Road, Glasgow, D04 89GR</span> <span class="phone">Tel: +1 959 552 5963</span> </div>
          </div>
        </div>
        <nav>
    <ul class="menu">
        <li><a class="active" href="homep.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="maintenance.php">Maintenance</a></li>
        <li><a href="repair.php">Repair</a></li>
        <li><a href="price.php">Price List</a></li>
        <li><a href="locations.php">Locations</a></li>

        <!-- Profile Element -->
        <?php if (isset($_SESSION['user_email'])): ?>
            <li><span class="account">Profile: <?php echo htmlspecialchars($_SESSION['user_email']); ?></span></li>
            <li><a href="logout.php" class="logout">Logout</a></li>
        <?php else: ?>
            <li><a href="Sign.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>


        <div class="slider-wrapper">
          <div class="slider">
            <ul class="items">
              <li> <img src="images/slider-img1.jpg" alt="" /> </li>
              <li> <img src="images/slider-img2.jpg" alt="" /> </li>
              <li> <img src="images/slider-img3.jpg" alt="" /> </li>
            </ul>
          </div>
          <a class="prev" href="#">prev</a> <a class="next" href="#">next</a> </div>
      </div>
    </header>
    <!--==============================content================================-->
    <section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            <article class="grid_4">
              <div class="wrapper">
                <figure class="img-indent"><img src="images/page1-img1.png" alt=""></figure>
                <div class="extra-wrap">
                  <h4>Engine Repair</h4>
                  <p class="p2">Lorem ipsum dolosit amet, consetetur sadipng elitr sed diam nonumy eirmod.</p>
                  <a class="button" href="#">Read More</a> </div>
              </div>
            </article>
            <article class="grid_4">
              <div class="wrapper">
                <figure class="img-indent"><img src="images/page1-img2.png" alt=""></figure>
                <div class="extra-wrap">
                  <h4>Wheel Alignment</h4>
                  <p class="p2">Tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                  <a class="button" href="#">Read More</a> </div>
              </div>
            </article>
            <article class="grid_4">
              <div class="wrapper">
                <figure class="img-indent"><img src="images/page1-img3.png" alt=""></figure>
                <div class="extra-wrap">
                  <h4>Fluid Exchanges</h4>
                  <p class="p2">No sea takimata sanctus est gorem ipsum dolor sit amet forem ipsum.</p>
                  <a class="button" href="#">Read More</a> </div>
              </div>
            </article>
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                  <article class="grid_8">
                    <div class="indent-left">
                      <h2>Welcome!</h2>
                      <p class="prev-indent-bot"><strong>Car Repair</strong> is one of free website templates created by TemplateMonster.com team. This website template is optimized for 1280X1024 screen resolution. It is also XHTML &amp; CSS valid. </p>
                      <p class="border-bot">This Car Repair Template goes with two packages – with PSD source files and without them. PSD source files are available for free for the registered members of TemplatesMonster.com. The basic package (without PSD source) is available for anyone without registration.</p>
                    </div>
                    <div class="wrapper">
                      <div class="grid_4 alpha">
                        <div class="indent-left">
                          <div class="maxheight indent-bot">
                            <h3>About Us</h3>
                            <p class="prev-indent-bot"><a class="link-1" href="#">Lorem ipsum dolor amet</a> conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                            <a class="link-1" href="#">Dolor amet conse ctetur</a> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat ut enim ad. </div>
                          <a class="button" href="#">Read More</a> </div>
                      </div>
                      <div class="grid_4 omega">
                        <div class="indent-left2">
                          <div class="maxheight indent-bot">
                            <h3 class="p0">Our Services</h3>
                            <ul class="list-1">
                              <li><a href="#">Complete Computer Diagnostics</a></li>
                              <li><a href="#">Complete Safety Analysis</a></li>
                              <li><a href="#">Drivability Problems</a></li>
                              <li><a href="#">Oil Changes</a></li>
                              <li><a href="#">Emission Repair Facility</a></li>
                              <li><a href="#">Air Conditioning Service</a></li>
                              <li><a href="#">Electrical Systems</a></li>
                              <li><a href="#">Fleet Maintenance</a></li>
                            </ul>
                          </div>
                          <a class="button" href="#">Read More</a> </div>
                      </div>
                    </div>
                  </article>
                  <article class="grid_4">
                    <div class="indent-left2 indent-top">
                      <div class="box p4">
                        <div class="padding">
                          <div class="wrapper">
                            <figure class="img-indent"><img src="images/page1-img4.png" alt=""></figure>
                            <div class="extra-wrap">
                              <h3 class="p0">Our Hours:</h3>
                            </div>
                          </div>
                          <p class="p1"><strong>24 Hour Emergency Towing</strong></p>
                          <p class="color-1 p0">Monday - Friday: 7:30 am - 6:00</p>
                          <p class="color-1 p1">Saturday: 7:30 am - Noon</p>
                          Night Drop Available </div>
                      </div>
                      <figure class="indent-bot">
                        <iframe width="260" height="202" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                      </figure>
                      <div class="indent-left">
                        <dl class="main-address">
                          <dt>Demolink.org 8901 Marmora Road,<br>
                            Glasgow, D04 89GR.</dt>
                          <dd><span>Telephone:</span> +1 959 552 5963;</dd>
                          <dd><span>FAX:</span> +1 959 552 5963</dd>
                          <dd><span>E-mail:</span><a href="#">mail@demolink.org</a></dd>
                        </dl>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--==============================footer=================================-->
    <footer>
      <div class="main"> <span>Copyright &copy; <a href="#">Domain Name</a> All Rights Reserved</span> Design by <a target="_blank" href="http://www.templatemonster.com/">TemplateMonster.com</a> </div>
    </footer>
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
<script type="text/javascript">
$(window).load(function () {
    $('.slider')._TMS({
        duration: 1000,
        easing: 'easeOutQuint',
        preset: 'simpleFade',
        slideshow: 7000,
        banners: false,
        pauseOnHover: true,
        pagination: false,
        pagNums: false,
        nextBu: '.next',
        prevBu: '.prev'
    });
});
</script>
</body>
</html>