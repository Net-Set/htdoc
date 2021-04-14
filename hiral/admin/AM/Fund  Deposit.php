<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fund Deposit </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Fund Deposit</li>
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
                <h3 class="card-title">Fund Deposit </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                          function validation()
                          {
                            var text=/^[A-Za-z" "]+$/;
                            var text1=/^[0-9]+$/;
                            var Deposit = document.getElementById('deposit').value;
                            var Bank = document.getElementById('bank').value;
                            var Amount = document.getElementById('a1').value;
                            var Start= document.getElementById('start').value;
                            var End = document.getElementById('end').value;
                           if(Deposit=="")
                           {
                             alert("Please Enter the Deposit Id");
                             return false;
                           }
                                                 if(Deposit.length<5)
                                                   {
                                                        alert("Enter  Minimum 5 Number");
                                                        return false;
                                                   }
                                                  if(Deposit.length>12)
                                                  {
                                                      alert("Enter  Maximum 12  Number");
                                                      return false;
                                                  }
                                                  if(Deposit.match(text1))
                                                  {
                                                    true;
                                                  }
                                                    else {
                                                      alert("Enter Only Number");
                                                      return false;
                                                  }
                                          
                           if(Bank=="")
                           {
                             alert("Enter Your Bank Name");
                             return false;
                           }
                                                  if(Bank.length<3)
                                                   {
                                                        alert("Please Enter Minimum 3 Character");
                                                        return false;
                                                   }
                                                  if(Bank.length>30)
                                                  {
                                                      alert("Please Enter Maximum 30 Character");
                                                      return false;
                                                  }
                                                  if(Bank.match(text))
                                                  {
                                                    true;
                                                  }
                                                    else {
                                                      alert("Please Enter Only Name");
                                                      return false;
                                                  }
    
                           if(Amount=="")
                           {
                             alert("Please Enter the Amount");
                             return false;
                           }
                                                   if(Amount.length<5)
                                                   {
                                                        alert("Please Enter the Minimum 5 Number");
                                                        return false;
                                                   }
                                                  if(Amount.length>10)
                                                  {
                                                      alert("Please Enter the Maximum 10  Number");
                                                      return false;
                                                  }
                                                  if(Amount.match(text1))
                                                  {
                                                    true;
                                                  }
                                                    else {
                                                      alert("Please Enter Only Number");
                                                      return false;
                                                  }
                           if(Start=="")
                           {
                             alert("Please Enter the Start Date");
                             return false;
                           }
                           if(End=="")
                           {
                             alert("Please Enter the End Date");
                             return false;
                           }
                          }
              </script>
               <form role="form" action="" method="POST" onsubmit=" return validation()">
                <div class="card-body">
                  <div class="form-group">
                    <label>Deposit Id</label>
                    <input type="text" class="form-control" id="deposit" name="Deposit_id" placeholder="Enter Deposit Id" maxlength="12">
                  </div>
                  <div class="form-group">
                    <label>Fund Bank Name</label>
                    <input type="text" class="form-control" id="bank" name="Fund_Bank_Name" placeholder="Enter Fund Bank Name" maxlength="50">

                  </div>
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" id="a1" name="amount" placeholder="Enter Amount" maxlength="10">
                  </div>
                  <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" id="start" name="start_date" placeholder="Enter Start Date">
                  </div>
                  <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" id="end" name="end_date" placeholder="Enter End Date">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="fund_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            <?php
        if(isset($_POST['submit']))
        {          
                $Fund_Bank_Name=$_POST['Fund_Bank_Name'];
                $Amount=$_POST['amount'];
                $Deposit_Id=$_POST['Deposit_id'];
                $Start_Date=$_POST['start_date'];
                $End_date=$_POST['end_date'];
                $con=mysqli_connect('localhost','root','','samaj_db');
                $qr="INSERT INTO `fund_deposit`(`FUND_BANK_NAME`, `AMOUNT`, `DEPOSIT_ID`, `START_DATE`, `END_DATE`) VALUES ('$Fund_Bank_Name','$Amount','$Deposit_Id','$Start_Date','$End_date')";
                $run=mysqli_query($con,$qr);
                if($run==TRUE)
                {
                        echo "<script>alert('Fund Deposit')</script>";
                }
                else
                {
                        echo "<script>alert('Fund Does Not Deposit')</script>";
                }
        }
?>
            
<?php
include "footer.php";
 ?>
