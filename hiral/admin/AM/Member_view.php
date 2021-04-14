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
            <a href="basic form.php"  class="btn btn-primary">Add</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
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
                <h3 class="card-title">Membership View</h3>

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
                     <th>MEM_ID</th>
                     <th>MEM_NAME</th>
                     <th>ADDRESS</th>
                     <th>PINCODE</th>
                     <th>JOIN_DATE</th>
                     <th>DATE_OF_BORTH</th>
                     <th>CONTECT_NO</th>
                     <th>EDUCATION</th>
                     <th>GENDER</th>
                     <th>EMAIL</th>
                     <th>BLOODGROUP</th>
                     <th>TOTALINCOME</th>
                     <th>TRIBE</th>
                     <th>AADHARCARDNO</th>
                     <th>MEM_RELATION</th>    
                     <th>PARENT_ID</th> 
                     <th>IMAGES</th>
                     <th>EDIT</th>
                     <th>DELETE</th>
                  </tr>
                 </thead>
                  <tbody>
                  <?php
                        $con=mysqli_connect('localhost','root','','samaj_db');
                        $rs=mysqli_query($con,"SELECT *FROM member_view");
                        while($row=mysqli_fetch_assoc($rs))
                           {
                              echo "<tr>"; 
                              echo "<td>".$row['MEM_ID']."</td>";
                              echo "<td>".$row['MEM_NAME']."</td>";  
                              echo "<td>".$row['ADDRESS']."</td>";
                              echo "<td>".$row['PINCODE']."</td>";
                              echo "<td>".$row['JOIN_DATE']."</td>";
                              echo "<td>".$row['D_O_B']."</td>";
                              echo "<td>".$row['CONTECT_NO']."</td>";
                              echo "<td>".$row['EDUCATION']."</td>";
                              echo "<td>".$row['GENDER']."</td>";
                              echo "<td>".$row['EMAIL']."</td>";
                              echo "<td>".$row['BLOOD_GROUP']."</td>";
                              echo "<td>".$row['TOTAL_INCOME_OF_YEAR']."</td>"; 
                              echo "<td>".$row['TRIBE']."</td>";
                              echo "<td>".$row['AADHAR_CARD_NO']."</td>";
                              echo "<td>".$row['MEM_RELATION']."</td>";
                              echo "<td>".$row['parentname']."</td>";
                              echo "<td><a href='$row[IMAGES]'><img src='".$row['IMAGES']."' height='100' width='100'/></a></td>";
                              echo "<td><a href='update.php?MEM_ID=".$row['MEM_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a></td>";
                              echo "<td><a href='Delete.php?MEM_ID=".$row['MEM_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a></td>";
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
                                    url:'member_Search.php',
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
   

