<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donation Distribute </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Donation Distribute Details</li>
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
                <h3 class="card-title">Donation Distribute Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                          function validation()
                          {
                             var text=/^[A-Za-z" "]+$/;
                             var Start = document.getElementById('distribute').value;
                             var Purpose=document.getElementById('purpose').value;
                          if(Start=="")
                           {
                             alert("Please Enter the Distribute Date");
                             return false;
                           }
                           if(Purpose=="")
                           {
                             alert("Please Enter the Purpose");
                             return false;
                           }                       if(Purpose.length<3)
                                                   {
                                                        alert("Please Enter the Minimum 3 Caracter");
                                                        return false;
                                                   }
                                                  if(Purpose.length>15)
                                                  {
                                                      alert("Please Enter the Maximum 15 Character");
                                                      return false;
                                                  }
                                                  if(Purpose.match(text))
                                                  {
                                                    true;
                                                  }
                                                    else {
                                                      alert("Please Enter Only Purpose");
                                                      return false;
                                                  }
                              
                          }
              </script>
              
              <form role="form" action="Donation Distribute Details.php" method="POST" onsubmit="return validation()">
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
                    <label>Donation Amount </label>
                    <input type="text" class="form-control" id="amount" name="donate_amount" placeholder="Enter Donation Amount" maxlength="10">

                  </div>
                  <div class="form-group">
                    <label>Donation Item</label>
                    <input type="text" class="form-control" id="item" name="donate_item" placeholder="Enter Donation Item" maxlength="15">
                  </div>
                  <div class="form-group">
                    <label>Distribute Date</label>
                    <input type="date" class="form-control" id="distribute" name="distribute_date">
                  </div>
                  <div class="form-group">
                    <label>Donate Purpose</label>
                    <input type="text" class="form-control" id="purpose" name="donate_purpose" placeholder="Enter Donate Purpose" maxlength="15">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="distribute_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            <?php
                        if(isset($_POST['submit']))
                        {
                                $MEM_ID=$_POST['member'];
                                $Donate_Amount=$_POST['donate_amount'];
                                $Donate_Item=$_POST['donate_item'];
                                $Distribute_Date=$_POST['distribute_date'];
                                $Donate_Purpose=$_POST['donate_purpose'];
                                $con=mysqli_connect('localhost','root','','samaj_db');
                                $qr="INSERT INTO `donation_distribute_details`(`MEM_ID`, `DISTRIBUTE_DATE`, `DONATE_AMOUNT`, `DONATE_ITEM`, `DONATE_PURPOSE`) VALUES ('$MEM_ID','$Distribute_Date','$Donate_Amount','$Donate_Item','$Donate_Purpose')";
                                $run=mysqli_query($con,$qr);
                                if($run==TRUE)
                                {
                                        echo "<script>alert('Donation Distribute')</script>";
                                }
                                else
                                {
                                        echo "<script>alert('Donation Does Not Distribute')</script>";
                                }
                        }
        ?>

            
<?php
include "footer.php";
 ?>
