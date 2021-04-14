<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marriage Updation  Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Marriage Updation Form</li>
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
                <h3 class="card-title">Marriage Updation Details</h3>
              </div>

              <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $MMD_ID=$_POST['mmd_id'];
        $Mem_Id=$_POST['member'];
        $Event_Id=$_POST['event'];
        $Registration_Date=$_POST['registration_date'];
        $Status=$_POST['status'];
        if(mysqli_query($con,"UPDATE `marraige_member_details` SET `MMD_ID`='$MMD_ID',`EVENT_ID`='$Event_Id',`MEM_ID`='$Mem_Id',`REGISTRATION_DATE`='$Registration_Date',`STATUS`='$Status' WHERE MMD_ID='$MMD_ID'"))
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
        $MMD_ID=$_GET['MMD_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM MARRAIGE_MEMBER_DETAILS WHERE MMD_ID='$MMD_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Mem_Id=$row['MEM_ID'];
        $Event_Id=$row['EVENT_ID'];
        $Registration_Date=$row['REGISTRATION_DATE'];
        $Status=$row['STATUS'];
    }
?>

              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="Marriageupdate.php" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label>Matrimonial Id</label>
                    <input type="text" class="form-control" name="mmd_id" placeholder="Enter Matrimonial Id" value="<?php echo $MMD_ID?>">
                  </div>
                  <div class="form-group">
                    <label>Member Id</label>
                    <?php
                         $con=mysqli_connect('localhost','root','','samaj_db');
                         $rs=mysqli_query($con,"SELECT `MEM_ID`,concat(convert(`MEM_ID`, char),\"-\",`MEM_NAME`) as member FROM `member_management`");
                     ?>
                     <select name="member"> 
                     <option><?php echo $Mem_Id;?></option>
                      <?php
                       while($row=mysqli_fetch_assoc($rs))
                         {
                            echo "<option value='".$row["MEM_ID"]."'>".$row["member"]."</option>";
                         }
                        ?>
                       </select>             
                  </div>
                  <div class="form-group">
                    <label>Event Id</label>
                            <?php
                            $con=mysqli_connect('localhost','root','','samaj_db');
                            $rs=mysqli_query($con,"SELECT `EVENT_ID`,concat(convert(`EVENT_ID`,char),\"-\",`EVENT_NAME`) as event FROM `EVENT_DETAILS`");
                      ?>
                      <select name="event"> 
                      <option><?php echo $Event_Id?></option>
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
                    <input type="date" class="form-control" name="registration_date" placeholder="Enter Registration Date"  value="<?php echo $Registration_Date?>">
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <input type="text" class="form-control" name="status" placeholder="Status" value="<?php echo $Status?>">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                  <a href="marriage_view.php" class="btn btn-primary">View</a>

                </div>
              </form>
            </div>
<?php
include "footer.php";
 ?>
