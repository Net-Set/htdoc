<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Member Fees </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active"> Member Fees </li>
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
              <form role="form" action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Member Fees Id</label>
                    <?php
                                   $con=mysqli_connect('localhost','root','','samaj_db');
                                   $rs=mysqli_query($con,"SELECT *FROM member_fees");
                                ?>
                                <select name="MF_ID"> 
                                <option  value=0>--select--</option>
                                 <?php
                                  while($row=mysqli_fetch_assoc($rs))
                                   {
                                          echo "<option value='".$row["MF_ID"]."'>".$row["MF_ID"]."</option>";
                                   }
                                 ?>
                            </select>
                  </div>
                  <div class="form-group">
                  <label>Fees Type</label>

                    <?php
                                   $con=mysqli_connect('localhost','root','','samaj_db');
                                   $rs=mysqli_query($con,"SELECT `FT_ID`,concat(convert(`FT_ID`, char),\"-\",`FEESTYPE_NAME`) as fees FROM `fees_type_master` ");
                                ?>
                                <select name="fees"> 
                                <option  value=0>--select--</option>
                                 <?php
                                  while($row=mysqli_fetch_assoc($rs))
                                   {
                                          echo "<option value='".$row["FT_ID"]."'>".$row["fees"]."</option>";
                                   }
                                 ?>
                            </select> 
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name="qty" placeholder="Quantity">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"name="submit" >Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="fees_type_View.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            <?php
                            if(isset($_POST['submit']))
                            {
                                $MF_ID=$_POST['MF_ID'];
                                $FT_ID=$_POST['fees'];
                                $Qty=$_POST['qty'];
                                $con=mysqli_connect("localhost","root","","samaj_db");
                                $qr="INSERT INTO `member_fees_details`( `MF_ID`, `FT_ID`, `QTY`) VALUES ('$MF_ID','$FT_ID','$Qty')";
                                $run=mysqli_query($con,$qr);
                                if($run==TRUE)
                                {
                                      echo "<script>alert('Record Inserted')</script>";
                                }
                                else
                                {
                                    echo "<script>alert('Record Not Inserted')</script>";
                                }
                            }
            ?>
<?php
include "footer.php";
 ?>
