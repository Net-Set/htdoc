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
            <a href="#"  class="btn btn-primary">Add</a>
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
                <h3 class="card-title">Donation Member View</h3>

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
                        <th>DTM_ID</th>
                        <th>DT_NAME</th>
                        <th>MEM_NAME</th>
                        <th>DONATION_DATE</th>
                        <th>AMOUNT</th>
                        <th>TOTAL</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                 </tr>
                 </thead>
                  <tbody>
                        <?php
                            $con=mysqli_connect('localhost','root','','samaj_db');
                            $qr=mysqli_query($con,"SELECT * FROM DONATION_MEMBER_VIEW");
                            while($row=mysqli_fetch_assoc($qr))
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['DTM_ID']."</td>";
                                    echo "<td>".$row['donationname']."</td>";
                                    echo "<td>".$row['memname']."</td>";
                                    echo "<td>".$row['DONATION_DATE']."</td>";
                                    echo "<td>".$row['AMOUNT']."</td>";
                                    echo "<td>".$row['TOTAL']."</td>";
                                     echo "<td><a href='Donationmemberupdate.php?DTM_ID=".$row['DTM_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a</td>";
                                    echo "<td><a href='Donationmemberdelete.php? DTM_ID=".$row['DTM_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a</td>";
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

