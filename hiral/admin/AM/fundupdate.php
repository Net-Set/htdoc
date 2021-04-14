<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fund Updation Form </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Fund Deposit Details</li>
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
                <h3 class="card-title">Fund Deposit Details </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                          function validation()
                          {
                            var text=/^[A-Za-z" "]+$/;
                            var text1=/^[0-9]+$/;
                            var Fund = document.getElementById('fund').value;
                            var Deposit = document.getElementById('deposit').value;
                            var Bank = document.getElementById('bank').value;
                            var Amount = document.getElementById('a1').value;
                            var Start= document.getElementById('start').value;
                            var End = document.getElementById('end').value;
                            if(Fund=="")
                            {
                                  alert("Please Enter Fund Id");
                                  return false;
                            }
                                    if(Fund.length<1)
                                    {
                                          alert("Please Enter Minimum One Number");
                                          return false;
                                    }
                                    if(Fund.length>5)
                                    {
                                            alert("Please Enter Maximum 5 Number");
                                            return false;
                                    }
                                    if(Fund.match(text1))
                                    {
                                            true;
                                    }
                                    else
                                    {
                                          alert("Please Enter Only Number");
                                          return false;
                                    }
                           if(Deposit=="")
                           {
                             alert("Please Enter the Deposit Id");
                             return false;
                           }
                                                 if(Deposit.length<12)
                                                   {
                                                        alert("Please Enter  Minimum 12 Number");
                                                        return false;
                                                   }
                                                  if(Deposit.length>12)
                                                  {
                                                      alert("Please Enter  Maximum 12  Number");
                                                      return false;
                                                  }
                                                  if(Deposit.match(text1))
                                                  {
                                                    true;
                                                  }
                                                    else {
                                                      alert("Please Enter Only Number");
                                                      return false;
                                                  }
                                          
                           if(Bank=="")
                           {
                             alert("Please Enter the Bank Name");
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

<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $FUND_ID=$_POST['Fund_id'];
        $Deposit_Id=$_POST['Deposit_id'];
        $Fund_Bank_Name=$_POST['Fund_Bank_Name'];
        $Amount=$_POST['amount'];
        $Start_Date=$_POST['start_date'];
        $End_Date=$_POST['end_date'];
        if(mysqli_query($con,"UPDATE `fund_deposit` SET `FUND_ID`='$FUND_ID',`FUND_BANK_NAME`='$Fund_Bank_Name',`AMOUNT`='$Amount',`DEPOSIT_ID`='$Deposit_Id',`START_DATE`='$Start_Date',`END_DATE`='$End_Date' WHERE FUND_ID='$FUND_ID'"))
        {
                echo "<script>alert('Updated')</script>";
        }
        else
        {
                echo "<script>alert('Problem is Updation')</script>";
        }
    }
    else
    {
        $FUND_ID=$_GET['FUND_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM FUND_DEPOSIT WHERE FUND_ID='$FUND_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Deposit_Id=$row['DEPOSIT_ID'];
        $Fund_Bank_Name=$row['FUND_BANK_NAME'];
        $Amount=$row['AMOUNT'];
        $Start_Date=$row['START_DATE'];
        $End_Date=$row['END_DATE'];
    }
?>

               <form role="form" action="" method="POST" onsubmit=" return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Fund Id</label>
                    <input type="text" class="form-control" id="fund" name="Fund_id" placeholder="Enter Fund Id" maxlength="5" value="<?php echo $FUND_ID;?>">
                  </div>
                  <div class="form-group">
                    <label>Deposit Id</label>
                    <input type="text" class="form-control" id="deposit" name="Deposit_id" placeholder="Enter Deposit Id" maxlength="12" value="<?php echo $Deposit_Id;?>">
                  </div>
                  <div class="form-group">
                    <label>Fund Bank Name</label>
                    <input type="text" class="form-control" id="bank" name="Fund_Bank_Name" placeholder="Enter Fund Bank Name" maxlength="30" value="<?php echo $Fund_Bank_Name;?>">

                  </div>
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" id="a1" name="amount" placeholder="Enter Amount" maxlength="10" value="<?php echo $Amount;?>">
                  </div>
                  <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" id="start" name="start_date" placeholder="Enter Start Date" value="<?php echo $Start_Date;?>">
                  </div>
                  <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" id="end" name="end_date" placeholder="Enter End Date" value="<?php echo $End_Date;?>">
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
include "footer.php";
 ?>
