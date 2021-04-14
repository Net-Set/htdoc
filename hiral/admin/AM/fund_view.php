<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tables</h1><br/>
            <a href="Fund  Deposit.php"  class="btn btn-primary">Add</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fund Deposit View</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                   <tr>
                         <th>FUND_ID</th>
                         <th>FUND_BANK_NAME</th>
                         <th>AMOUNT</th>
                         <th>DEPOSIT_ID</th>
                         <th>START_DATE</th>
                         <th>END_DATE</th>
                         <th>EDIT</th>
                         <th>DELETE</th>
                   </tr>
                </thead>
                <tbody>
                    <?php
                         $con=mysqli_connect('localhost','root','','samaj_db');
                         $qr=mysqli_query($con,"SELECT * FROM FUND_DEPOSIT");
                         while($row=mysqli_fetch_assoc($qr))
                            {
                                echo "<tr>";
                                echo "<td>".$row['FUND_ID']."</td>";
                                echo "<td>".$row['FUND_BANK_NAME']."</td>";
                                echo "<td>".$row['AMOUNT']."</td>";
                                echo "<td>".$row['DEPOSIT_ID']."</td>";
                                echo "<td>".$row['START_DATE']."</td>";
                                echo "<td>".$row['END_DATE']."</td>";
                                echo "<td><a href='fundupdate.php?FUND_ID=".$row['FUND_ID']."'>Edit</a></td>";
                                echo "<td><a href='fdelete.php? FUND_ID=".$row['FUND_ID']."'>Delete</a></td>";
                            }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
            <!-- /.content -->
  </div>
<?php
include "footer.php";
?>

