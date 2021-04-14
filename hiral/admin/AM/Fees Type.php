<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Member Fees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Member Fees </li>
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
                <h3 class="card-title">Member Fees</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="Fees Type.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Member Id</label>
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
                       </select>                  </div>
                  <div class="form-group">
                    <label>Pay Date </label>
                    <input type="date" class="form-control" name="pay_date"> 
                  </div>
                  <div class="form-group">
                    <label>Total </label>
                    <input type="text" class="form-control" name="total"> 
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" >Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="Member Fess.php"  class="btn btn-primary">Details</a>
                 <a href="fees_type_View.php"  class="btn btn-primary">View</a>
                </div>
              </form>
            </div>
            
<?php
include "footer.php";
 ?>
<?php
            if(isset($_POST['submit']))
            {
              $MEM_ID=$_POST['member'];
              $Pay_Date=$_POST['pay_date'];
              $Total=$_POST['total'];
              $con=mysqli_connect('localhost','root','','samaj_db');
              $qr="INSERT INTO `member_fees`(`MEM_ID`, `PAY_DATE`, `TOTAL_AMOUNT`) VALUES ('$MEM_ID','$Pay_Date','$Total')";
              $run=mysqli_query($con,$qr);
              if($run==TRUE)
              {
                    echo "<script>alert('Fees Submited')</script>";
              }
              else
              {
                echo "<script>alert('Fees Not Submited')</script>";
              }

            }
?>