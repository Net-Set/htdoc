<?php
include "header.php";
?>
<?php
                error_reporting(0);
?>
<?php
                        if(isset($_POST['submit']))
                        {
                            $Name=$_POST['Name'];
                            $address=$_POST['address'];
                            $Pincode=$_POST['Pincode'];
                            $Join_Date=$_POST['Join_Date'];
                            $Date_Of_Birth=$_POST['Date_Of_Birth'];
                            $Contact_No=$_POST['Contact_No'];
                            $Education=$_POST['Education'];
                            $gender=$_POST['gender'];
                            $Email=$_POST['email'];
                            $Password=$_POST['pass'];
                            $Bloodgruoupd=$_POST['bloodgroup'];
                            $Total_Income_Of_Year=$_POST['Total_Income_Of_Year'];
                            $Tribe=$_POST['Tribe'];
                            $Aadhar_Card_No=$_POST['Aadhar_Card_No'];
                            $Mem_Relation=$_POST['Mem_Ralaton'];
                            $Mem_Parent_Id=$_POST['member'];
                            $filename=$_FILES["image"] ["name"];
                            $temname=$_FILES["image"] ["tmp_name"];
                            $folder="../AM/dist/img/".$filename;
                            move_uploaded_file($temname,$folder);
                            $con=mysqli_connect('localhost','root','','samaj_db');
                            if($Mem_Parent_Id == 0)
                            {
                                $vel="INSERT INTO `member_management`(`MEM_NAME`, `ADDRESS`,`PINCODE`, `JOIN_DATE`, `D_O_B`, `CONTECT_NO`, `EDUCATION`, `GENDER`,`EMAIL`,`PASSWORD`,`BLOOD_GROUP`, `TOTAL_INCOME_OF_YEAR`, `TRIBE`, `AADHAR_CARD_NO`,`MEM_RELATION`,`IMAGES`) VALUES  ('$Name','$address','$Pincode','$Join_Date','$Date_Of_Birth','$Contact_No','$Education','$gender','$Email','$Password','$Bloodgruoupd','$Total_Income_Of_Year','$Tribe','$Aadhar_Card_No','Self','$folder')";
                                
                            }
                            else
                            {
                                $vel="INSERT INTO `member_management`(`MEM_NAME`, `ADDRESS`,`PINCODE`, `JOIN_DATE`, `D_O_B`, `CONTECT_NO`, `EDUCATION`, `GENDER`,`EMAIL`,`PASSWORD`,`BLOOD_GROUP`, `TOTAL_INCOME_OF_YEAR`, `TRIBE`, `AADHAR_CARD_NO`,`MEM_RELATION`,`MEM_PARENT_ID`,`IMAGES`) VALUES  ('$Name','$address','$Pincode','$Join_Date','$Date_Of_Birth','$Contact_No','$Education','$gender','$Email','$Password','$Bloodgruoupd','$Total_Income_Of_Year','$Tribe','$Aadhar_Card_No',' $Mem_Relation','$Mem_Parent_Id','$folder')";     
                            } 
                  
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
            <h1>Course Details</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Course details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Course Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
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
                </script>
              <form role="form" action="basic form.php" method="POST" onsubmit="return validation()" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label>Course Id</label>
                    <?php
                         $con=mysqli_connect('localhost','root','','samaj_db');
                         $rs=mysqli_query($con,"SELECT `MEM_ID`,concat(convert(`MEM_ID`, char),\"-\",`MEM_NAME`) as member FROM `member_management`");
                     ?>
                     <select name="member"> 
                     <option value=0>--select--</option>
                      <?php
                       while($row=mysqli_fetch_assoc($rs))
                         {
                            echo "<option value='".$row["MEM_ID"]."'>".$row["member"]."</option>";
                         }
                        ?>
                       </select>           
                     </div>

                  <div class="form-group">
                    <label>Course Duration</label>
                    <input type="text" class="form-control" id="mname" name="Name" placeholder="Course Duration">
                  </div>
                  <div class="form-group">
                    <label>Course Type</label>
                    <input type="text" class="form-control" id="mname" name="Name" placeholder="Course Type">
                  </div>
                  <div class="form-group">
                    <label>Course Fees</label>
                    <input type="text" class="form-control" id="mname" name="Name" placeholder="Course Fees">
                  </div>
                  <div class="form-group">
                    <label>Staff Id</label>
                    <?php
                         $con=mysqli_connect('localhost','root','','samaj_db');
                         $rs=mysqli_query($con,"SELECT `MEM_ID`,concat(convert(`MEM_ID`, char),\"-\",`MEM_NAME`) as member FROM `member_management`");
                     ?>
                     <select name="member"> 
                     <option value=0>--select--</option>
                      <?php
                       while($row=mysqli_fetch_assoc($rs))
                         {
                            echo "<option value='".$row["MEM_ID"]."'>".$row["member"]."</option>";
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
