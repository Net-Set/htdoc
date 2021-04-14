<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Committee Member Form  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Committee Member Details </li>
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
                <h3 class="card-title">Committee Member Details </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                              function validation()
                              {
                                    var text=/^[A-Za-z" "]+$/;
                                    var Name = document.getElementById('name').value;
                                    var Join = document.getElementById('join').value;
                                    if(Name=="")
                                    {
                                         alert("Please Enter Committee Name");
                                         return false;
                                    }
                                          if(Name.length<5)
                                          {
                                               alert("Please Enter Minimum 5 Character");
                                               return false;
                                          }
                                          if(Name.length>30)
                                          {
                                              alert("Please Enter Maximum 30 Character");
                                              return false;
                                          }
                                          if(Name.match(text))
                                          {
                                               true;
                                          }
                                          else
                                          {
                                                alert("Please Enter Only Character");
                                                return false;
                                          }
                                    if(Join=="")
                                    {
                                         alert("Please Enter Join Date");
                                         return false;
                                    }
                              }
              </script>
              <form role="form" action="Committee Member Details.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                <label>Member Id</label>
                <?php
                     $con=mysqli_connect('localhost','root','','samaj_db');
                     $rs=mysqli_query($con,"SELECT `MEM_ID`,concat(convert(`MEM_ID`, char),\"-\", `MEM_NAME`) as member FROM `member_management`");
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
                    <label>Committee Name</label>
                    <input type="text" class="form-control" name="committee_name" id="name" placeholder="Enter Committee Name" maxlength="30">
                  </div>
                  <div class="form-group">
                    <label>Designnation</label>
                    <input type="text" class="form-control" name="designation" id="desig" placeholder="Enter Your Designation" maxlength="30">
                  </div>
                  <div class="form-group">
                    <label>Join Date</label>
                    <input type="date" class="form-control" name="join_date" id="join" placeholder="Enter Join Date">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="committee_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            <?php
        if(isset($_POST['submit']))
        {
           
            $MEM_NAME=$_POST['member'];
            $name=$_POST['committee_name'];
            $desig=$_POST['designation'];
            $date=$_POST['join_date'];
            $con=mysqli_connect('localhost','root','','samaj_db');
            $vel="INSERT INTO `committee_member_details`(`MEM_ID`, `COMMITTEE_NAME`, `JOIN_DATE`,`DESIGNATION`) VALUES('$MEM_NAME','$name','$date','$desig')";
            $myrun=mysqli_query($con,$vel);
            if($myrun==TRUE)
            {
               echo "<script> alert('Add committee ')</script>";
            }
            else
            {
               echo "<script>alert('Fail')</script>";
            }                          
        }
?>
            
<?php
include "footer.php";
 ?>
