<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loan Apply Updation Form </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Loan Apply Details</li>
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
                <h3 class="card-title">Loan Apply Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                          function validation()
                          {
                            var text=/^[0-9]+$/;
                             var Loan_Id = document.getElementById('loan_id').value;
                             var Mem_Id = document.getElementById('member_id').value;
                              var Loan = document.getElementById('loan').value;
                              var text1=/^[A-Za-z" "]+$/;
                              var Amount = document.getElementById('a1').value;
                              var Purpose = document.getElementById('purpose').value;
                              if(Loan_Id=="")
                              {
                                 alert("Please Enter Loan Detail Id")
                                 return false;
                              }
                                                 if(Loan_Id.length<1)
                                                   {
                                                        alert("Please Enter Minimum 1 Number");
                                                        return false;
                                                   }
                                                  if(Loan_Id.length>5)
                                                  {
                                                      alert("Please Enter Maximum 5 Number");
                                                      return false;
                                                  }
                                                  if(Loan_Id.match(text))
                                                  {
                                                    true;
                                                  }
                                                    else {
                                                      alert("Please Enter Only Number");
                                                      return false;
                                                  }
                             if(Mem_Id=="")
                              {
                                 alert("Please Enter Member Id")
                                 return false;
                              }
                                                 if(Mem_Id.length<1)
                                                   {
                                                        alert("Please Enter Minimum 1 Number");
                                                        return false;
                                                   }
                                                  if(Mem_Id.length>5)
                                                  {
                                                      alert("Please Enter Maximum 5 Number");
                                                      return false;
                                                  }
                                                  if(Mem_Id.match(text))
                                                  {
                                                    true;
                                                  }
                                                    else {
                                                      alert("Please Enter Only Number");
                                                      return false;
                                                  }
                              if(Loan=="")
                              {
                                    alert("Please Enter Loan Apply Date");
                                    return false;
                              }
                              if(Amount=="")
                              {
                                 alert("Please Enter the Amount")
                                 return false;
                              }
                                                 if(Amount.length<5)
                                                   {
                                                        alert("Please Enter Minimum 5 Number");
                                                        return false;
                                                   }
                                                  if(Amount.length>12)
                                                  {
                                                      alert("Please Enter Maximum 12 Number");
                                                      return false;
                                                  }
                                                  if(Amount.match(text))
                                                  {
                                                    true;
                                                  }
                                                    else {
                                                      alert("Please Enter Only Number");
                                                      return false;
                                                  }
                              if(Purpose=="")
                              {
                                   alert("Please Enter Loan Purpose");
                                   return false;
                              }
                                      if(Purpose.length<8)
                                      {
                                          alert("Please Enter Minimum 8 Character");
                                          return false;
                                      }
                                      if(Purpose.length>30)
                                      {
                                          alert("Please Enter Maximum 30 Character");
                                          return false;
                                      }
                                      if(Purpose.match(text1))
                                      {
                                          true;
                                      }
                                      else
                                      {
                                           alert("Please Enter Only Purpose");
                                           return false;

                                      }
                                      
                          }
              </script>
              <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $LD_ID=$_POST['ld_id'];
        $Mem_Id=$_POST['member'];
        $Loan_Apply_Date=$_POST['loan_date'];
        $Loan_Amount=$_POST['loan_amount'];
        $Loan_Purpose=$_POST['loan_purpose'];
        if(mysqli_query($con,"UPDATE `loan_apply` SET `LD_ID`='$LD_ID',`MEM_ID`='$Mem_Id',`LOAN_APPLY_DATE`='$Loan_Apply_Date',`LOAN_AMOUNT`='$Loan_Amount',`LOAN_PURPRSE`='$Loan_Purpose' WHERE LD_ID='$LD_ID'"))
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
        $LD_ID=$_GET['LD_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM LOAN_APPLY WHERE LD_ID='$LD_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Mem_Id=$row['MEM_ID'];
        $Loan_Apply_Date=$row['LOAN_APPLY_DATE'];
        $Loan_Amount=$row['LOAN_AMOUNT'];
        $Loan_Purpose=$row['LOAN_PURPRSE'];
    }
?>

              <form role="form" action="loupdate.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Loan Detail Id</label>
                    <input type="text" class="form-control" id="loan_id" name="ld_id" placeholder="Enter Loan Detail Id" maxlength="5" value="<?php echo $LD_ID?>">
                  </div>
                  <div class="form-group">
                    <label>Member Id</label>
                    <?php
                         $con=mysqli_connect('localhost','root','','samaj_db');
                         $rs=mysqli_query($con,"SELECT `MEM_ID`,concat(convert(`MEM_ID`, char),\"-\",`MEM_NAME`) as member FROM `member_management`");
                     ?>
                     <select name="member"> 
                     <option><?php echo $Mem_Id;?></option>
                      <?php
                       while($row=mysqli_fetch_assoc($rs))
                         {
                            echo "<option value='".$row["MEM_ID"]."'>".$row["member"]."</option>";
                         }
                        ?>
                       </select>           
                  </div>
                  <div class="form-group">
                    <label>Loan Apply Date</label>
                    <input type="date" class="form-control" id="loan" name="loan_date" value="<?php echo $Loan_Apply_Date;?>">
                  </div>
                  <div class="form-group">
                    <label>Loan Amount</label>
                    <input type="text" class="form-control" id="a1" name="loan_amount" placeholder="Enter Loan Amount" maxlength="12" value="<?php echo $Loan_Amount;?>"> 
                  </div>
                  <div class="form-group">
                    <label>Loan Purpose</label>
                    <input type="text" class="form-control" id="purpose" name="loan_purpose" placeholder="Enter Loan Purpose" maxlength="30" value="<?php echo $Loan_Purpose;?>">
                  </div>
                  
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="loanapply_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>

<?php
include "footer.php";
 ?>
