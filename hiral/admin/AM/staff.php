<?php
include "header.php";
?>
<?php
                error_reporting(0);
?>
<?php
                        if(isset($_POST['submit']))
                        {
                            $F_name=$_POST['F_name'];
                            $M_name=$_POST['M_name'];
                            $L_name=$_POST['L_name'];
                            $Gender=$_POST['Gender'];
                            $D_O_B=$_POST['D_O_B'];
                            $Mobile=$_POST['Mobile'];
                            $Address=$_POST['Address'];
                            $Email_id=$_POST['Email_id'];
                            $Password=$_POST['Password'];
                            $D_O_J=$_POST['D_O_J'];
                            $Pr_id=$_POST['Pr_id'];
                            $C_id=$_POST['member'];
                            $L_J_d=$_POST['L_J_d'];
                            $EXP_d=$_POST['EXP_d'];
                            $filename=$_FILES["image"] ["F_name"];
                            $temname=$_FILES["image"] ["tmp_name"];
                            $folder="../AM/dist/img/".$filename;
                            move_uploaded_file($temname,$folder);
                            $con=mysqli_connect('localhost','root','','institute_db_ok');
                          
                         
                                $vel="INSERT INTO `Staff`(`Sf_id`, `F_name`,`M_name`,`L_name`,`GENDER`, `D_O_B`, `Mobile`, `Address`,`Email_id`,`Password`,`D_O_J`, `Pr_id`, `C_id`, `img`,`L_J_d`,`EXP_d`) VALUES  ('$Sf_id', '$F_name','$M_name','$L_name','$GENDER', '$D_O_B', '$Mobile', '$Address','$Email_id','$Password','$D_O_J', '$Pr_id', '$C_id', '$folder','$L_J_d','$EXP_d')";
                                
                          
                            $myrun=mysqli_query($con,$vel);
                            if($myrun==TRUE)
                            {
                                echo "<script> alert('You Have Successfull Registration')</script>";
                            }
                            else
                            {
                                echo "<script>alert('Registration Fail')</script>";
                            }
                        }
                        ?>
                        
            <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff Registration</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Staff Registration Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
d
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Staff Registraction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <script>
                                    function validation()
                                    {
                                          var text=/^[A-Za-z" "]+$/;
                                          var Name = document.getElementById('mname').value;
                                          var text1=/^[A-Za-z0-9" "/-,.]+$/;
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
                </script> */
               --><form role="form" action="basic form.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="mname" name="F_name" placeholder="Enter Member First Name">
                  </div>
                  <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" id="mname" name="M_name" placeholder="Enter Member Middle Name">
                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="mname" name="L_name" placeholder="Enter MemberLast Name">
                  </div>
                  <div class="form-group">
                    <label>Member Image</label>
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
                    <input type="text" name="Address"  id="add" class="form-control" placeholder="Address">
                  </div>
                  <div class="form-group">
                    <label>Pincode</label>
                    <input type="text" name="Pincode" id="code" class="form-control" maxlength="6" placeholder="Pincode">
                  </div>
                  <div class="form-group">
                    <label>Join Date</label>
                    <input type="date" name="D_O_J" id="join" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="date" name="D_O_B" id="birth" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Contact No</label>
                    <input type="text" name="Mobile" id="contact" maxlength="10" class="form-control" placeholder="Contact No">
                  </div>
                  <div class="form-group">
                    <label>Education</label>
                    <input type="text" name="Education"  class="form-control" list="standard" placeholder="Education">
                    <datalist id="standard">
                    <option value="1 to 9 "></option>
                        <option value="SSC"></option>
                        <option value="HSC"></option>
                        <option value="BCA"></option>
                        <option value="B.COM"></option>
                        <option value="BSC"></option>
                        <option value="M.COM"></option>
                        <option value="MCA"></option>
                        <option value="MSC_IT"></option>
                        <option value="Other Graduation"></option>
                    </datalist>
                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <input type="radio" name="Gender" id="mgen" value="Male" />Male
                    <input type="radio" name="Gender" id="fgen" value="Female"/>Female
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="Email_id" id="e1" class="form-control"  placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label>Password</label> 
                    <input type="password" name="Password" id="p1" class="form-control" placeholder="Password" minlength="8">
                  </div>
                  <div class="form-group">
                    <label>Blood Group</label>
                    <input type="text" name="bloodgroup" class="form-control" list="blood" placeholder="Blood Group">
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
                  <div class="form-group">
                    <label>Last Job Destination</label>
                    <input type="text" name="L_J_d" class="form-control"  placeholder="Last Job Destination">
                  </div>
                  <div class="form-group">
                    <label>Exprience Duration</label>
                    <input type="text" name="EXP_d" class="form-control"  placeholder="Exprience Duration">
                  </div>
                    <div class="form-group">
                    <label>Member Parent Id</label>
                    <?php
                         $con=mysqli_connect('localhost','root','','institute_db_ok');
                         $rs=mysqli_query($con,"SELECT `C_id`,`C_name`,concat(convert(`C_id`, char)-`C_name`) as member FROM `course`");
                     ?>
                     <select name="member"> 
                     <option value=0>--select--</option>
                      <?php
                       while($row=mysqli_fetch_assoc($rs))
                         {
                            echo "<option value='".$row["C_name"]."'>".$row["member"]."</option>";
                         }
                        ?>
                       </select>           
                     </div>
                
                  <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="member_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
          
<?php
include "footer.php";
 ?>
