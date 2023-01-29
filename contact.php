<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Easy Application</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- styles -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300|Open+Sans:400,300,300italic,400italic" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/success.css" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    <style type="text/css">
        .auto-style2 {
            width: 292px;
            height: 54px;
        }
        .auto-style3 {
            height: 26px;
        }
    </style>
</head>

<?php
  include "phpfiles/_contact.php";
?>

<body data-spy="scroll" data-target=".bs-docs-sidebar">

  <header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">


          <!-- logo -->
          &nbsp;<!-- end logo --><!-- top menu --><div>
            <nav>
              <ul class="nav topnav">
                <li class="dropdown success">
                  <a href="index.php"><i class="icon-home icon-white"></i> Home</a>
                </li>
                <?php
                if ($loggedIN){
                  if ($_SESSION["role"] = "user"){
                    echo "<li class='dropdown primary'>
                    <a href='UserDash.php'><i class='icon-star icon-white'></i> Dashboard</a>
                    </li>";
                  }
                  elseif ($_SESSION["role"] = "staff"){
                    echo "<li class='dropdown primary'>
                    <a href='StaffDash.php'><i class='icon-star icon-white'></i> Dashboard</a>
                    </li>";
                  }
                  elseif ($_SESSION["role"] = "admin"){
                    echo "<li class='dropdown primary'>
                    <a href='Admin.php'><i class='icon-star icon-white'></i> Dashboard</a>
                    </li>";
                  }

                echo '<li class="dropdown info active">
                <a href="phpfiles/_logout.php"><i class="icon-bullhorn icon-white"></i> Logout</a>
              </li>';}
                else{
                  echo '<li class="dropdown primary">
                  <a href="RegForm.php"><i class="icon-star icon-white"></i> Register</a>
                </li>
                <li class="dropdown info active">
                  <a href="LoginPage.php"><i class="icon-bullhorn icon-white"></i> Login</a>
                </li>';
                }
                ?>
                <li class="inverse">
                  <a href="Contact.php"><i class="icon-envelope icon-white"></i> Contact</a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- end menu -->
            <img alt="" class="auto-style2" src="assets/img/logo1.png" /></div>
      </div>
    </div>
  </header>


  <!-- Subhead
================================================== -->
  <section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span8">
            <h3 style="font-size: xx-large; font-weight: bold; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">CONTACT & FEEDBACK:</h3>
            <p>&nbsp;</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="maincontent">
    <div class="container">
      <form method="post">
        <?php
        if ($loggedIN){
          echo '
          <table align="center">
          <tr>
          <td style="font-size: medium; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif">Subject:</td><td class="auto-style1"><input type="text" required style="width: 500px" name="summary", id="summary"></td>
        </tr>
        <tr>
          <td style="font-size: medium; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif">Matter:</td>
          <td class="auto-style1"><textarea name="details" id="details" cols="30" rows="10" required style="width: 500px"></textarea></td>
        </tr>
        <tr>
          <td style="font-size: medium; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif">Attahment:</td>
          <td class="auto-style1"><input type="file" style="width: 508px"submit"></td> 
          <td class="auto-style1">&nbsp;</td>
        </tr>
        <tr>
          <td></td>
          <td class="auto-style1"> <button type="reset" style="background-color: #FF0000; font-size: large; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; width: 100px; color: #FFFFFF;">Reset</button>


          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
          <button type="submit" style="background-color: #FFFF00; font-size: large; font-family: "Gill Sans", "Gill Sans MT", Calibri,"Trebuchet MS", sans-serif; width: 102px;">Submit</button></td> 
          <td class="auto-style1">&nbsp;</td>
        </tr>
          </table>';
        }
        else{
          echo'
          
        <table align="center">
                    <tr>
                      <td style="font-size: medium; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif" width="150">Name:</td>
                      <td class="auto-style1"><input type="text" required style="width: 500px" name="name" id="name"></td>
                    </tr>
                    <tr>
                      <td style="font-size: medium; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif">Email:</td>
                      <td class="auto-style1"><input type="email" required style="width: 500px" name="email" id="email"></td>
                    </tr>
                    <tr>
                      <td style="font-size: medium; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif">Contact No:</td><td class="auto-style1"><input type="number" required style="width: 500px" name="phonenumber" id="phonenumber"></td>
                    </tr>
                    <tr>
                      <td style="font-size: medium; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif">Subject:</td><td class="auto-style1"><input type="text" required style="width: 500px" name="summary", id="summary"></td>
                    </tr>
                    <tr>
                      <td style="font-size: medium; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif">Matter:</td>
                      <td class="auto-style1"><textarea name="details" id="details" cols="30" rows="10" required style="width: 500px"></textarea></td>
                    </tr>
                    <tr>
                      <td style="font-size: medium; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif">Attahment:</td>
                      <td class="auto-style1"><input type="file" style="width: 508px"submit"></td> 
                      <td class="auto-style1">&nbsp;</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td class="auto-style1"> <button type="reset" style="background-color: #FF0000; font-size: large; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; width: 100px; color: #FFFFFF;">Reset</button>


                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      
                      <button type="submit" style="background-color: #FFFF00; font-size: large; font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; width: 102px;">Submit</button></td> 
                      <td class="auto-style1">&nbsp;</td>
                    </tr>
        </table> 
          ';
        }
        ?>
      </form>

    </div>
  </section>
  <!-- Footer
 ================================================== -->
 <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="widget">
            <h4>About Developers</h4>
            <address>
					<strong>YASHESWANI</strong><br>
					
					<strong>PIYUSH GAURAV</strong><br>
					
					<strong>UTPAL KUMAR</strong><br>
					
					</address>
            <address>
					<strong>Contact us</strong><br>
					<a href="gmail.com">contact.utpallkumar@gmail.com</a>
					</address>
          </div>
        </div>

        <div class="span4">
          <div class="widget">
            <h4>Get email updates</h4>
            <form class="form-horizontal" action="#" method="post">
              <fieldset>
                <p>
                  Sign up for email updates and we'll plant a tree for you through Trees for the Future.
                </p>

                <div class="input-prepend input-append">
                  <input class="span2" id="appendedPrependedInput" type="text" placeholder="Email">
                  <button class="btn btn-inverse" type="submit">Subscribe!</button>
                </div>
              </fieldset>
            </form>
            <ul class="social_small">
              <li class="facebook first"><a href="#" title="Facebook">Facebook</a></li>
              <li class="twitt"><a href="#" title="Twitter">Twitter</a></li>
              <li class="googleplus"><a href="#" title="google plus">Google plus</a></li>
              <li class="flickr"><a href="#" title="flickr">Flickr</a></li>
              <li class="dribbble"><a href="#" title="Dribbble">Dribbble</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="span6">
            <p>&copy; Easy App - All right reserved</p>
          </div>
          <div class="span6">
            <div class="pull-right">
              <div class="credits">
                Designed by <a href="#">Yasheswani</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </footer>

  <script src="assets/js/jquery-1.8.2.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/flexslider/jquery.flexslider.js"></script>
  <script src="assets/js/flexslider/setting.js"></script>
  <script src="assets/js/application.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>


</body>

</html>


