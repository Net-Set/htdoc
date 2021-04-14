<?php
      include "header.php";
?>
<?php
error_reporting(0);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Member Updation Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Member Updation</li>
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
                <h3 class="card-title">Member Updation Form</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $MEM_ID=$_POST["MEM_ID"];
        $Name=$_POST["Name"];
        $address=$_POST["address"];
        $Pincode=$_POST["Pincode"];
        $Join_Date=$_POST["Join_Date"];
        $txtdob=$_POST["txtdob"];
         $Contact=$_POST["Contact"];
        $Education=$_POST["Education"];
        $gender=$_POST["gender"];
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $blood=$_POST["blood"];
        $Total_Income_Of_Year=$_POST["Total_Income_Of_Year"];
        $Tribe=$_POST["Tribe"];
        $Aadhar_Card_No=$_POST["Aadhar_Card_No"];
        $Mem_Relation=$_POST["Mem_Ralaton"];
        $Mem_Parent_Id=$_POST["member"];
        if(mysqli_query($con,"UPDATE `member_management` SET `MEM_NAME`='$Name',`ADDRESS`='$address',`PINCODE`='$Pincode',`JOIN_DATE`='$Join_Date',`D_O_B`='  $txtdob',`CONTECT_NO`='$Contact',`EDUCATION`=' $Education',`GENDER`='$gender',`EMAIL`='$email',`PASSWORD`='$pass',`BLOOD_GROUP`='$blood',`TOTAL_INCOME_OF_YEAR`='$Total_Income_Of_Year',`TRIBE`='$Tribe',`AADHAR_CARD_NO`='$Aadhar_Card_No',`MEM_RELATION`='$Mem_Relation',`MEM_PARENT_ID`='$Mem_Parent_Id' WHERE MEM_ID='$MEM_ID'"))
        {
                echo "<script>alert('Updated')</script>";
        }
        else
        {
                echo "<script>alert('Problem is Updation')</script>";
        }
    }
    else
    {
        $MEM_ID=$_GET["MEM_ID"];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM MEMBER_MANAGEMENT WHERE MEM_ID='$MEM_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Name=$row['MEM_NAME'];
        $address=$row['ADDRESS'];
        $Pincode=$row['PINCODE'];
        $Join_Date=$row['JOIN_DATE'];
        $txtdob=$row['D_O_B'];
        $Contact=$row['CONTECT_NO'];
        $Education=$row['EDUCATION'];
        $gender=$row['GENDER'];
        $email=$row['EMAIL'];
        $pass=$row['PASSWORD'];
        $blood=$row['BLOOD_GROUP'];
        $Total_Income_Of_Year=$row['TOTAL_INCOME_OF_YEAR'];
        $Tribe=$row['TRIBE'];
        $Aadhar_Card_No=$row['AADHAR_CARD_NO'];
        $Mem_Relation=$row['MEM_RELATION'];
        $Mem_Parent_Id=$row['MEM_PARENT_ID'];
        $Images=$row['IMAGES'];
    }
?>

              <form role="form" action="update.php" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label>Member Id</label>
                    <input type="text" class="form-control" name="MEM_ID" placeholder="Enter Member Id" value="<?php echo $MEM_ID;?>">
                  </div>
                  <div class="form-group">
                    <label>Member Name</label>
                    <input type="text" class="form-control" name="Name" placeholder="Enter Member Name"value="<?php echo $Name;?>">
                  </div>
                  <div class="form-group">
                    <label>Member Image</label>
                    <input type="text" class="form-control" name="image" placeholder="Enter Member Name" value="<?php echo $Images;?>">
                    <img src="<?php echo $Images;?>" width="30px" height="30px">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="address"  cols="7" class="form-control" rows="2" placeholder="Address"> <?php echo $address;?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Pincode</label>
                    <input type="text" name="Pincode" class="form-control" minlength="6"maxlength="6" required="required" placeholder="Pincode" value="<?php echo $Pincode;?>">
                  </div>
                  <div class="form-group">
                    <label>Join Date</label>
                    <input type="date" name="Join_Date" required="required"  class="form-control" value="<?php echo $Join_Date;?>">
                  </div>
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="date" name="txtdob" required="required"  class="form-control" value="<?php echo $txtdob;?>">
                  </div>
                  <div class="form-group">
                    <label>Contact No</label>
                    <input type="text" name="Contact" required="required" maxlength="10" minlength="10" class="form-control" placeholder="Contact No" value="<?php echo $Contact;?>">
                  </div>
                  <div class="form-group">
                    <label>Education</label>
                    <input type="text" name="Education"  class="form-control" list="standard" placeholder="Education" value="<?php echo $Education;?>">
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
                    <input type="radio" name="gender" value="Male"
                    <?php 
                        if($row["GENDER"]=='Male')
                        {
                          echo "checked";
                        }
                    ?>>Male
                    <input type="radio" name="gender" value="Female"
                    <?php 
                        if($row["GENDER"]=='Female')
                        {
                          echo "checked";
                        }
                    ?>>Female
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required="required"  placeholder="Email" value="<?php echo $email;?>"></td>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" required="required"  placeholder="Password" minlength="8" value="<?php echo $pass;?>">
                  </div>
                  <div class="form-group">
                    <label>Blood Group</label>
                    <input type="text" name="blood" class="form-control" list="blood"placeholder="Blood Group" value="<?php echo $blood;?>">
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
                    <label>Total Income Of Year</label>
                    <input type="text" name="Total_Income_Of_Year" class="form-control"  placeholder="Total Income Of Year" value="<?php echo $Total_Income_Of_Year;?>">
                  </div>
                  <div class="form-group">
                    <label>Tribe</label>
                    <input type="text" name="Tribe" class="form-control"  placeholder="Tribe" value="<?php echo $Tribe;?>">
                  </div>
                  <div class="form-group">
                    <label>Aadhar Card No</label>
                    <input type="text" name="Aadhar_Card_No" class="form-control" maxlength="12" minlength="12" placeholder="Aadhar Card No" value="<?php echo $Aadhar_Card_No;?>">
                  </div>
                  <div class="form-group">
                    <label>Member Relation</label>
                    <input type="text" name="Mem_Ralaton" class="form-control"  placeholder="Member Relation" value="<?php echo $Mem_Relation;?>">
                  </div>
                  <div class="form-group">
                    <label>Member Parent Id</label>
                    <?php
                         $con=mysqli_connect('localhost','root','','samaj_db');
                         $rs=mysqli_query($con,"SELECT `MEM_ID`,concat(convert(`MEM_ID`, char),\"-\",`MEM_NAME`) as member FROM `member_management`");
                     ?>
                     <select name="member"> 
                     <option><?php echo $Mem_Parent_Id;?></option>
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                  <a href="member_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
        
           
   
            
<?php
include "footer.php";
 ?>
