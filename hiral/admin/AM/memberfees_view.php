<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tables</h1>
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
                <h3 class="card-title">Fees View</h3>

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
                  <th>MF_ID</th>
                  <th>MEM_ID</th>
                  <th>PAY_DATE</th>
                  <th>TOTAL_AMOUNT</th>   
                  <th>EDIT</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $con=mysqli_connect('localhost','root','','samaj_db');
                      $rs=mysqli_query($con,"SELECT *FROM member_fees");
                       while($row=mysqli_fetch_assoc($rs))
                        { 
                           echo "<tr>"; 
                           echo "<td>".$row['MF_ID']."</td>";
                           echo "<td>".$row['MEM_ID']."</td>";  
                           echo "<td>".$row['PAY_DATE']."</td>";
                           echo "<td>".$row['TOTAL_AMOUNT']."</td>";
                          // echo "<td><a href='feesupdate.php?FT_ID=".$row['FT_ID']."'>Edit</a></td>";
                           echo "</tr>";
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
