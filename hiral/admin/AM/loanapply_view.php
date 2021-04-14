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
                <h3 class="card-title">Loan Apply View</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" id="search1" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="table-data">
                  <thead>
                   <tr>
                        <th>LD_ID</th>
                        <th>MEM_NAME</th>
                        <th>LOAN_APPLY_DATE</th>
                        <th>LOAN_AMOUNT</th>
                        <th>LOAN_PURPOSE</th>
                        <th>APPROVEL STATUS</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                   </tr>
                  </thead>
                  <tbody>
                        <?php
                                    $con=mysqli_connect('localhost','root','','samaj_db');
                                    $qr=mysqli_query($con,"SELECT * FROM LOAN_view");
                                    while($row=mysqli_fetch_assoc($qr))
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row['LD_ID']."</td>";
                                        echo "<td>".$row['memname']."</td>";
                                        echo "<td>".$row['LOAN_APPLY_DATE']."</td>";
                                        echo "<td>".$row['LOAN_AMOUNT']."</td>";
                                        echo "<td>".$row['LOAN_PURPRSE']."</td>";                                        
                                        echo "<td><a href='loupdate.php?LD_ID=".$row['LD_ID']."'>Status</a></td>";
                                        echo "<td><a href='loan_update.php?LD_ID=".$row['LD_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a></td>";
                                        echo "<td><a href='loanrecorddelete.php? LD_ID=".$row['LD_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a></td>";
                                        echo "</tr>";
                                    }
                        ?>
                 </tbody>
                </table>
              </div>
              <script type="text/javascript">
            $(document).ready(function(){
                    $("#search1").keyup(function(){
                            var search = $(this).val();
                            $.ajax({
                                    url:'LoanApply_Search.php',
                                    method:'POST',
                                    data:{query:search},
                                    success:function(response){
                                        $("#table-data").html(response);
                                    }
                            });
                    });
            });
    </script>
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

