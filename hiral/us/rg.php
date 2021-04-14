<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rapid Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Rapid - v2.0.0
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">

  <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        
        <!-- <a href="#header" class="scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="gelary.php">Gellary</a></li>
          <li><a href="team.php">Team</a></li>
          <li class="drop-down"><a href="#">Forms</a>
            <ul>
              <li><a href="rg.php">ragistraction</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
              <li class="drop-down"><a href="#">Drop Down</a>
                <ul>
                  <li><a href="#">deep drop down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header>
          <?php
                error_reporting(0);
     ?>

                            <script>
                                    function validation()
                                    {
                                          var text=/^[A-Za-z" "]+$/;
                                          var Name = document.getElementById('mname').value;
                                          var text1=/^[A-Za-z0-9" "/-]+$/;
                                          var Address = document.getElementById('add').value;
                                          var pin=/^[0-9]+$/;
                                          var Pincode = document.getElementById('code').value;
                                          var Join_Date = document.getElementById('join').value;
                                          var Birth = document.getElementById('birth').value;
                                          var con=/^[0-9]+$/;
                                          var Contact = document.getElementById('contact').value;
                                          var Male = document.getElementById('mgen').checked;
                                          var Female = document.getElementById('fgen').checked;
                                          var email=/^[A-Za-z@.0-9]+$/;
                                          var Email = document.getElementById('e1').value;
                                          var Password = document.getElementById("p1").value;

                                          if(Name=="")
                                          {
                                               alert("Please Enter Member Name");
                                               return false;
                                          }
                                              if(Name.length<3)
                                              {
                                                  alert("Please Enter Minimum 3 Character");
                                                  return  false;
                                              }
                                              if(Name.length>100)
                                              {
                                                alert("Please Enter Maximum 100 Character");
                                                return false;
                                              }
                                              if(Name.match(text))
                                              {
                                                true;
                                              }
                                              else
                                              {
                                                  alert("Please Enter Only Name");
                                                  return false;
                                              }


                                    if(Address=="")
                                    {
                                         alert("Please Enter Address");
                                         return false;
                                    }
                                          if(Address.length<10)
                                          {
                                                alert("Please Enter Minimum 10 Character");
                                                return false;
                                          }
                                          if(Address.lenght>80)
                                          {
                                               alert("Please Enter Maximum 80 Character");
                                               return false;
                                          }
                                          
                                          if(Address.match(text1))
                                          {
                                              true;
                                          }
                                          else
                                          {
                                             alert("Please Enter Only Address");
                                             return false;
                                          }
                              if(Pincode=="")
                              {
                                      alert("Please Enter Pincode");
                                      return false;
                              }
                                    if(Pincode.length<6)
                                    {
                                        alert("Please Enter Minimum 6 Number");
                                        return false;
                                    }
                                    if(Pincode.length>6)
                                    {
                                      alert("Please Enter Maximum 6 Number");
                                      return false;
                                    }
                                    if(Pincode.match(pin))
                                    {
                                      true;
                                    }
                                    else
                                    {
                                        alert("Please Enter Only Pincode Number");
                                        return false;
                                    }
                          if(Join_Date=="")
                          {
                              alert("Please Enter Join Date");
                              return false;
                          }
                          if(Birth=="")
                          {
                             alert("Please Enter Date Of Birth");
                             return false;
                          }
                          if(Contact=="")
                          {
                             alert("Please Enter Contact Number");
                             return false;
                          }
                                  if(Contact.length<10)
                                  {
                                      alert("Please Enter 10 Number");
                                      return false;
                                  }
                                  if(Contact.match(con))
                                  {
                                      true;
                                  }
                                  else
                                  {
                                      alert("Please Enter Only Contact Number");
                                      return false;
                                  }
                        if(Male=="" && Female=="")
                        {
                            alert("Please Select Gender");
                            return false;
                        }

                        if(Email=="")
                        {
                              alert("Please Enter Email  ");
                              return false;
                        }
                                  if(Email.indexOf('@')<=0)
                                  {
                                        alert("Invalid @ Position");
                                        return false;
                                  }
                                  if((Email.charAt(Email.length-4)!='.') && (Email.charAt(Email.length-3)!='.'))
                                  {
                                      alert("Invalid . Position @ 4 ");
                                      return false;
                                  }
                                  if(Email.match(email))
                                  {
                                      true;
                                  }
                                  else
                                  {
                                      alert("Please Enter Format Wise Email");
                                      return false;
                                  }
                      if(Password=="")
                      {
                             alert("Please Enter Email Password");
                             return false;
                      }
                                if(Password.length<8)
                                {
                                    alert("Please Enter Minimum 8 Number");
                                    return false;
                                }
                    
                            }             
                </script>
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
            <br/><br/><br/><br/>
            <h1 align="center"><i>Student Registration</i></h1>
						<form role="form" action="Registration.php" method="POST" onsubmit="return validation()" enctype="multipart/form-data">
                        <div class="card-body">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" id="mname" name="Name" placeholder="Enter Member Name">
                        </div>
                        <div class="form-group">
                          <label>Middle Name</label>
                          <input type="text" class="form-control" id="mname" name="Name" placeholder="Enter Member Name">
                        </div>
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" id="mname" name="Name" placeholder="Enter Member Name">
                        </div>
                        <div class="form-group">
                          <label>Student Image</label>
                          <input type="file" class="form-control" name="image" id="im" placeholder="Choose Your Images">
                          <div id="show-image" align="right"></div>
                                      <script>
                                          $('#im').change(function()
                                          {
                                              var data = new FormData();
                                              data.append('file', $( '#im' )[0].files[0]);
                                              $.ajax({
                                                  url: 'upload.php',
                                                  type: 'POST',
                                                  data: data,
                                                  processData: false,
                                                  contentType: false,
                                                  success: function(data){
                                                      $('#show-image').html('<img src='+data+' border="3" height="100" width="100">');
                                          }
                                           });
                                              return false;                    
                                          });
                                      
                              </script>
                        </div>
                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" name="address"  id="add" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                          <label>Pincode</label>
                          <input type="text" name="Pincode" id="code" class="form-control" maxlength="6" placeholder="Pincode">
                        </div>
                        <div class="form-group">
                          <label>Join Date</label>
                          <input type="date" name="Join_Date" id="join" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Date Of Birth</label>
                          <input type="date" name="Date_Of_Birth" id="birth" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Contact No</label>
                          <input type="text" name="Contact_No" id="contact" maxlength="10" class="form-control" placeholder="Contact No">
                        </div>
                        
                        <div class="form-group">
                          <label>Gender</label>
                          <input type="radio" name="gender" id="mgen" value="Male" />Male
                          <input type="radio" name="gender" id="fgen" value="Female"/>Female
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" id="e1" class="form-control"  placeholder="Email">
                        </div>
                        <div class="form-group">
                          <label>Password</label> 
                          <input type="password" name="pass" id="p1" class="form-control" placeholder="Password" minlength="8">
                        </div>
                        <div class="form-group">
                          <label>Blood Group</label>
                          <input type="text" name="bloodgroup" class="form-control" list="blood"placeholder="Blood Group">
                          <datalist id="blood">
                                              <option value="O+"></option>
                                              <option value="O-"></option>
                                              <option value="A+"></option>
                                              <option value="A-"></option>
                                              <option value="B+"></option>
                                              <option value="B-"></option>
                                              <option value="AB+"></option>
                                              <option value="AB-"></option>
                              </datalist>
                        </div>
                        <br/>
                        <h4><i>Parents Details</i></h4>
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" id="mname" name="Name" placeholder="Enter Member Name">
                        </div>
                        <div class="form-group">
                          <label>Middle Name</label>
                          <input type="text" class="form-control" id="mname" name="Name" placeholder="Enter Member Name">
                        </div>
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" id="mname" name="Name" placeholder="Enter Member Name">
                        </div>

                        
                        
							</div>
							<div class="form-group text-center">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            <input type="reset" name="reset" value="Cancel" class="btn btn-primary">
						   </div>
                            </form>
                          </div>
                          
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        <div class="row">
					<div class="col-md-12 text-center">
						<p>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          
						</p>
					</div>
				</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

    <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

             

              <div class="col-sm-6">
                <div class="footer-links">
                  <h4>Useful Links</h4>
                  <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                  </ul>
                </div>

                <div class="footer-links">
                  <h4>Contact Us</h4>
                  <p>
                    A108 Adam Street <br>
                    New York, NY 535022<br>
                    United States <br>
                    <strong>Phone:</strong> +1 5589 55488 55<br>
                    <strong>Email:</strong> info@example.com<br>
                  </p>
                </div>

                <div class="social-links">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                  
                </div>

              </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form">

              <h4>Send us a message</h4>
              <p>Eos ipsa est voluptates. Nostrum nam libero ipsa vero. Debitis quasi sit eaque numquam similique commodi harum aut temporibus.</p>

              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>

                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>

            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
      -->
        Designed by <a href="https://bootstrapmade.com/">Shashank D. Adepawar</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/mobile-nav/mobile-nav.js"></script>
  <script src="assets/vendor/wow/wow.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

