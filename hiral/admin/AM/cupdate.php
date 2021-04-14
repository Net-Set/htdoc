<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Credit Updation Member Form  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Credit Society Updation  </li>
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
                <h3 class="card-title">Credit Society Updation </h3>
              </div>

              <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $CSM_ID=$_POST['CSM_ID'];
        $Mem_Id=$_POST['member'];
        $Join_Date=$_POST['join_date'];
        if(mysqli_query($con,"UPDATE `credit_society_member` SET `CSM_ID`='$CSM_ID',`MEM_ID`='$Mem_Id',`JOIN_DATE`='$Join_Date' WHERE CSM_ID='$CSM_ID'"))
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
        $CSM_ID=$_GET['CSM_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM CREDIT_SOCIETY_MEMBER WHERE CSM_ID='$CSM_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Mem_Id=$row['MEM_ID'];
        $Join_Date=$row['JOIN_DATE'];
    }
?>

              <!-- /.card-header -->
              <!-- form start -->

              <form role="form" action="" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label>CSM_Id</label>
                    <input type="text" class="form-control" name="CSM_ID" placeholder="Enter CSM ID" value="<?php echo $CSM_ID;?>">
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
                    <label>Join Date</label>
                    <input type="date" class="form-control" name="join_date" placeholder="Enter Join Date" value="<?php echo $Join_Date;?>">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                  <a href="credit_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
<?php
include "footer.php";
 ?>
