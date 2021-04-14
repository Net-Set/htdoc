<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Supervision</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Project Supervision</li>
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
                <h3 class="card-title">Project Supervision</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                          function validation()
                          {
                              var text=/^[A-Za-z]+$/;
                              var Registration = document.getElementById('registration').value;
                              if(Registration=="")
                              {
                                  alert("Enter Your Registration Date");
                                  return false;
                              }
                          }

              </script>
              <form role="form" action="project description.php" method="POST"  onsubmit=" return validation()">
                <div class="card-body">
                <div class="form-group">
                <label>Project Id</label>
                <?php
                     $con=mysqli_connect('localhost','root','','');
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
              <label>Student Id</label>
              <?php
                                      $con=mysqli_connect('localhost','root','','samaj_db');
                                      $rs=mysqli_query($con,"SELECT `EVENT_ID`,concat(convert(`EVENT_ID`,char),\"-\",`EVENT_NAME`) as event FROM `EVENT_DETAILS`");
                                  ?>
                                  <select name="event"> 
                                  <option value=0>--select--</option>
                                   <?php
                                   while($row=mysqli_fetch_assoc($rs))
                                     {
                                         echo "<option value='".$row["EVENT_ID"]."'>".$row["event"]."</option>";
                                      }
                                  ?>
                                 </select>
            </div>
            <div class="form-group">
              <label>Staff Id</label>
              <?php
                                      $con=mysqli_connect('localhost','root','','samaj_db');
                                      $rs=mysqli_query($con,"SELECT `EVENT_ID`,concat(convert(`EVENT_ID`,char),\"-\",`EVENT_NAME`) as event FROM `EVENT_DETAILS`");
                                  ?>
                                  <select name="event"> 
                                  <option value=0>--select--</option>
                                   <?php
                                   while($row=mysqli_fetch_assoc($rs))
                                     {
                                         echo "<option value='".$row["EVENT_ID"]."'>".$row["event"]."</option>";
                                      }
                                  ?>
                                 </select>
            </div>
                  <div class="form-group">
                    <label>Registration Date</label>
                    <input type="date" class="form-control" id="registration" name="registration_date" placeholder="Enter Registration Date">
                  </div>
                  <div class="form-group">
                    <label>Updates</label>
                    <input type="text" name="address"  id="add" class="form-control" placeholder="Address">
                  </div>
                  
                  <!-- /.card-body -->      
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="marriage_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            <?php
                if(isset($_POST['submit']))
                {
                  $id=$_POST['event'];
                  $con=mysqli_connect('localhost','root','','samaj_db');
                  $rs=mysqli_query($con,"SELECT count(mmd_id) as booked FROM `marraige_member_details` WHERE EVENT_ID='$id' and status='YES'");
                  $row=mysqli_fetch_assoc($rs);
                  $booked= $row['booked'];
                  $sr=mysqli_query($con,"SELECT cap as capacity FROM `event_details` WHERE EVENT_ID='$id'");
                  $row=mysqli_fetch_assoc($sr);
                  $capacity= $row['capacity'];
                  if($booked>=$capacity)
                  {
                     echo "Event capacity is Over";
                  }
                  else
                  {  
                        $MEM_NAME=$_POST['member'];
                        $EVENT_NAME=$_POST['event'];
                        $Registration_Date=$_POST['registration_date'];
                        $Status=$_POST['status'];
                        $con=mysqli_connect('localhost','root','','samaj_db');
                        $qr="INSERT INTO `marraige_member_details`(`EVENT_ID`, `MEM_ID`, `REGISTRATION_DATE`, `STATUS`) VALUES ('$EVENT_NAME','$MEM_NAME','$Registration_Date','$Status')";
                        $run=mysqli_query($con,$qr);
                        if($run==TRUE)
                        {
                                echo "<script>alert('You Have Marriage Registration Successfull')</script>";
                        }
                        else
                        {
                                echo "<script>alert('Registration Fail')</script>";
                        }
                  }
                }
?>
<?php
include "footer.php";
 ?>
