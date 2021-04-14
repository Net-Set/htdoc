<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loan Approvel Updation Form </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Loan Approvel Details</li>
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
                <h3 class="card-title">Loan Approvel Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                            function validation()
                            { 
                                 var La_Id = document.getElementById('loan_id').value;
                                 var Ld_Id = document.getElementById('detail_id').value;
                                 var Status = document.getElementById('status').value;
                                 var text=/^[A-Za-z]+$/;
                                 var Adate = document.getElementById('adate').value;
                                 var text1=/^[0-9]+$/;
                                 var Ainstallment = document.getElementById('ainstallment').value;
                                 var Ninstallment = document.getElementById('ninstallment').value;
                                 var Loanamount = document.getElementById('laamount').value;
                         if(La_Id=="")
                          {
                               alert("Please Enter Loan Approvel Id");
                               return false;
                          }
                                if(La_Id.length<1)
                                {
                                      alert("Please Enter Minimum  One Number");
                                      return false;
                                }
                                if(La_Id.length>5)
                                {
                                   alert("Please Enter Maximum 5 Number");
                                   return false;
                                }
                                if(La_Id.match(text1))
                                {
                                     true;
                                }
                                else
                                {
                                    alert("Please Enter Only Number");
                                    return false;
                                }
                        if(Ld_Id=="")
                          {
                               alert("Please Enter Loan Detail Id");
                               return false;
                          }
                                if(Ld_Id.length<1)
                                {
                                      alert("Please Enter Minimum  One Number");
                                      return false;
                                }
                                if(Ld_Id.length>5)
                                {
                                   alert("Please Enter Maximum 5 Number");
                                   return false;
                                }
                                if(Ld_Id.match(text1))
                                {
                                     true;
                                }
                                else
                                {
                                    alert("Please Enter Only Number");
                                    return false;
                                }
                    if(Status=="")
                     {
                        alert(" Please Enter Loan Status ");
                        return false;
                     }    
                                        if(Status.length<2)
                                        {
                                            alert("Please Enter Minimum 2 Character");
                                            return false;
                                        }
                                        if(Status.length>3)
                                        {
                                            alert("Please Enter Maximum 3 Character");
                                            return false;
                                        }
                                        if(Status.match(text))
                                        {
                                            true;
                                        }
                                        else
                                        {
                                             alert("Please Enter YES OR NO");
                                             return false;
                                        }
                          if(Adate=="")
                          {
                                  alert("Please Enter Loan Approvel Date");
                                  return false;
                          }
                          if(Ainstallment=="")
                          {
                               alert("Please Enter Loan Installment Amount");
                               return false;
                          }
                                if(Ainstallment.length<4)
                                {
                                      alert("Please Enter Minimum 4 Number");
                                      return false;
                                }
                                if(Ainstallment.length>8)
                                {
                                   alert("Please Enter Maximum 8 Number");
                                   return false;
                                }
                                if(Ainstallment.match(text1))
                                {
                                     true;
                                }
                                else
                                {
                                    alert("Please Enter Only Number");
                                    return false;
                                }
                        if(Ninstallment=="")
                           {
                                alert("Please Enter Number Of Loan Installment");
                                return false;          
                           }
                                        if(Ninstallment.length<1)
                                        {
                                              alert("Please Enter Minimum One Digit");
                                              return false;
                                        }
                                        if(Ninstallment.length>2)
                                        {
                                          alert("Please Enter Maximum 2 Digit");
                                          return false;
                                        }
                                        if(Ninstallment.match(text1))
                                        {
                                          true;
                                        }
                                        else
                                        {
                                             alert("Please Enter Only Number");
                                             return false;
                                        }
                          if(Loanamount=="")
                          {
                               alert("Please Enter Loan Approvel Amount");
                               return false;
                          }
                                if(Loanamount.length<5)
                                {
                                      alert("Please Enter Minimum 5 Number");
                                      return false;
                                }
                                if(Loanamount.length>10)
                                {
                                   alert("Please Enter Maximum 10 Number");
                                   return false;
                                }
                                if(Loanamount.match(text1))
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

              <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $LA_ID=$_POST['la_id'];
        $Ld_Id=$_POST['LD_ID'];
        $Loan_Status=$_POST['loan_status'];
        $Approval_Date=$_POST['approve_date'];
        $Installment_Amount=$_POST['installment_amount'];
        $No_Of_Installment=$_POST['no_of_installment'];
        $Approve_Amount=$_POST['approve_amount'];
        if(mysqli_query($con,"UPDATE `loan_approval` SET `LA_ID`='$LA_ID',`LD_ID`='$Ld_Id',`APROVE_AMOUNT`='$Approve_Amount',`LOAN_STATUS`='$Loan_Status',`APPROVAL_DATE`='$Approval_Date',`INSTALLMENT_AMOUNT`='$Installment_Amount',`NO_OF_INSTALLMENT`='$No_Of_Installment' WHERE LA_ID='$LA_ID'"))
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
        $LA_ID=$_GET['LA_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM LOAN_APPROVAL WHERE LA_ID='$LA_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Ld_Id=$row['LD_ID'];
        $Loan_Status=$row['LOAN_STATUS'];
        $Approval_Date=$row['APPROVAL_DATE'];
        $Installment_Amount=$row['INSTALLMENT_AMOUNT'];
        $No_Of_Installment=$row['NO_OF_INSTALLMENT'];
        $Approve_Amount=$row['APROVE_AMOUNT'];
    }
?>
              <form role="form" action="Loanapprovalupdate.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Loan Approvel Id</label>
                    <input type="text" class="form-control" name="la_id" id="loan_id" placeholder="Please Enter Loan Approvel Id" maxlength="5" value="<?php echo $LA_ID;?>"> 
                  </div>
                  <div class="form-group">
                    <label>Loan Detail Id</label>
                    <?php
                                                $con=mysqli_connect('localhost','root','','samaj_db');
                                                $rs=mysqli_query($con,"SELECT *FROM loan_apply");
                                             ?>
                                             <select name="LD_ID"> 
                                             <option><?php echo $Ld_Id;?></option>
                                             <?php
                                             while($row=mysqli_fetch_assoc($rs))
                                                {
                                                     echo "<option value='".$row["LD_ID"]."'>".$row["LD_ID"]."</option>";
                                                }
                                                 ?>
                                             </select>
                  </div>
                  <div class="form-group">
                    <label>Loan Status</label>
                    <input type="text" class="form-control" name="loan_status" id="status" placeholder="Loan Status" maxlength="3" value="<?php echo $Loan_Status;?>">
                  </div>
                  <div class="form-group">
                    <label>Loan Approvel Date </label>
                    <input type="date" class="form-control" name="approve_date" id="adate" value="<?php echo $Approval_Date;?>"> 
                  </div>
                  <div class="form-group">
                    <label>Loan Installment Amount</label>
                    <input type="text" class="form-control" name="installment_amount" id="ainstallment"  placeholder="Enter Loan Installment Amount" maxlength="8" value="<?php echo $Installment_Amount;?>">
                  </div>
                  <div class="form-group">
                    <label>No. Of Installment</label>
                    <input type="text" class="form-control" name="no_of_installment" id="ninstallment" placeholder="Enter No. Of Installmen" maxlength="2" value="<?php echo $No_Of_Installment;?>">
                  </div>
                  <div class="form-group">
                    <label>Loan Approve Amount</label>
                    <input type="text" class="form-control" name="approve_amount" id="laamount" placeholder="Enter Loan Approve Amount" maxlength="10" value="<?php echo $Approve_Amount;?>">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="approve_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            
<?php
include "footer.php";
 ?>
