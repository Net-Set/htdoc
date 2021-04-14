<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donation Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Donation Member Details</li>
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
                <h3 class="card-title">Donation Member Details</h3>
              </div>            
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                              function validation()
                              {
                                 var text=/^[0-9]+$/;
                                 var Member = document.getElementById('member')
                                 var Donation = document.getElementById('donation').value;
                                 var Amount = document.getElementById('a1').value;
                                 var Total = document.getElementById('to').value;
                                 if(Donation=="")
                                 {
                                      alert("Please Enter the Donation Date");
                                      return false;
                                 }
                                 if(Amount=="")
                                 {
                                    alert("Please Enter the Amount");
                                    return false; 
                                 }
                                      if(Amount.length<3)
                                      {
                                          alert("Please Enter Minimum 3 Number");
                                          return false;
                                      }
                                      if(Amount.length>10)
                                      {
                                          alert("Please Enter Maximum 10 Number");
                                          return false;
                                      }
                                      if(Amount.match(text))
                                      {
                                          true;
                                      }
                                      else
                                      {
                                          alert("Please Enter Only Number");
                                          return false;
                                      }
                              if(Total=="")
                              {
                                  alert("Please Enter Total Amount");
                                  return false;
                              }
                                      if(Total.length<3)
                                      {
                                          alert("Please Enter Minimum 3 Number");
                                          return false;
                                      }
                                      if(Total.length>10)
                                      {
                                          alert("Please Enter Maximum 10 Number");
                                          return false;
                                      }
                                      if(Total.match(text))
                                      {
                                          true;
                                      }
                                      else
                                      {
                                          alert("Please Enter Only Number");
                                          return false;
                                      }
                              }
              </script>
              <form role="form" action="Donation Member.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Donation Type</label>
                    <?php
                                $con=mysqli_connect('localhost','root','','samaj_db');
                                $rs=mysqli_query($con,"SELECT `DT_ID`,concat(convert(`DT_ID`, char),\"-\",`DONATION_TYPE_NAME`) as donation FROM `DONATION_TYPE_MASTER` ");
                            ?>
                           <select name="donation"> 
                           <option  value=0>--select--</option>
                           <?php
                           while($row=mysqli_fetch_assoc($rs))
                            {
                                echo "<option value='".$row["DT_ID"]."'>".$row["donation"]."</option>";
                            }
                          ?>
                         </select>
                  </div>
                  <div class="form-group">
                    <label>Member_Name</label>
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
                    <label>Donation Date</label>
                    <input type="date" class="form-control" id="donation" name="donation_date">
                  </div>
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" id="a1" name="amount" placeholder="Enter Amount" maxlength="10">
                  </div>
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" class="form-control" id="to"  name="total" placeholder="Total Amount">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="donationmember_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            <?php
                    if(isset($_POST['submit']))
                    {
                        $DONATION_TYPE_NAME=$_POST['donation'];
                        $MEM_NAME=$_POST['member'];
                        $Donation_Date=$_POST['donation_date'];
                        $Amount=$_POST['amount'];
                        $Total=$_POST['total'];
                        $con=mysqli_connect('localhost','root','','samaj_db');
                        $qr="INSERT INTO `donation_member`(`DT_ID`, `MEM_ID`, `DONATION_DATE`, `AMOUNT`, `TOTAL`) VALUES ('$DONATION_TYPE_NAME','$MEM_NAME','$Donation_Date','$Amount','$Total')";
                        $run=mysqli_query($con,$qr);
                        if($run==TRUE)
                        {
                            echo "<script>alert('You Have Give the Donation')</script>";
                        }
                        else
                        {
                            echo "<script>alert('You Have Does Not Add Donation')</script>";
                        }
                    }
                    if(isset($_POST['submit']))
                    {
                        $rs=mysqli_query($con,"SELECT max(DTM_ID) as DTM_ID  FROM donation_member");
                        $row=mysqli_fetch_assoc($rs);
                        $DTM_ID= $row["DTM_ID"];
                        $qr="INSERT INTO `donation_amount_details`(`DT_ID`, `DTM_ID`,`AMOUNT`) VALUES ('$DONATION_TYPE_NAME','$DTM_ID','$Amount')";
                        $run=mysqli_query($con,$qr);
                    }
                    
          ?>

            
<?php
include "footer.php";
 ?>
