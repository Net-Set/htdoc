<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Credit Society Member Form  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Credit Society Member </li>
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
                <h3 class="card-title">Credit Society Member </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                            function validation()
                            {
                                 var sel = document.getElementById('vel').select;
                                 var Registration = document.getElementById('registration').value;
                                 if(sel=="")
                                 {
                                      alert("Please Enter Member Id");
                                      return false;
                                 }
                                 if(Registration=="")
                                 {
                                      alert("Please Enter the Registration Date");
                                      return false;
                                 }
                            }
              </script>
              <form role="form" action="Credit Society Member.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Member Id</label>
                    <?php
                         $con=mysqli_connect('localhost','root','','samaj_db');
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
                    <label>Join Date</label>
                    <input type="date" class="form-control" id="registration" name="join_date" placeholder="Enter Join Date">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="credit_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            <?php 
            if(isset($_POST['submit']))
            {
                            $MEM_NAME=$_POST['member'];
                            $Join_Date=$_POST['join_date'];
                            $con=mysqli_connect('localhost','root','','samaj_db');
                            $qr="INSERT INTO `credit_society_member`(`MEM_ID`, `JOIN_DATE`) VALUES ('$MEM_NAME','$Join_Date')" ;
                            $run=mysqli_query($con,$qr);
                            if($run==TRUE)
                            {
                                echo "<script>alert('You have Registration')</script>";
                            }
                            else
                            {
                                echo "<script>alert('Registration Fail')</script>";
                            }
                        }
                  
                    ?>

<?php
include "footer.php";
 ?>
