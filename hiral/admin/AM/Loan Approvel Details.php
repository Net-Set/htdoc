<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loan Approvel Form </h1>
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
                                 var Status = document.getElementById('status').value;
                                 var text=/^[A-Za-z]+$/;
                                 var Adate = document.getElementById('adate').value;
                                 var text1=/^[0-9]+$/;
                                 var Ainstallment = document.getElementById('ainstallment').value;
                                 var Ninstallment = document.getElementById('ninstallment').value;
                                 var Loanamount = document.getElementById('laamount').value;
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
                                if(Loanamount.length<4)
                                {
                                      alert("Please Enter Minimum 4 Number");
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
              <form role="form" action="Loan Approvel Details.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                  <div class="form-group">
                    <label>Loan Detail Id</label>
                    <?php
                                                $con=mysqli_connect('localhost','root','','samaj_db');
                                                $rs=mysqli_query($con,"SELECT *FROM loan_apply");
                                             ?>
                                             <select name="LD_ID"> 
                                             <option value=0>--select--</option>
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
                    <input type="text" class="form-control" name="loan_status" id="status" placeholder="Loan Status" maxlength="3">
                  </div>
                  <div class="form-group">
                    <label>Loan Approvel Date </label>
                    <input type="date" class="form-control" name="approve_date" id="adate"> 
                  </div>
                  <div class="form-group">
                    <label>Loan Installment Amount</label>
                    <input type="text" class="form-control" name="installment_amount" id="ainstallment"  placeholder="Enter Loan Installment Amount" maxlength="8">
                  </div>
                  <div class="form-group">
                    <label>No. Of Installment</label>
                    <input type="text" class="form-control" name="no_of_installment" id="ninstallment" placeholder="Enter No. Of Installmen" maxlength="2">
                  </div>
                  <div class="form-group">
                    <label>Loan Approve Amount</label>
                    <input type="text" class="form-control" name="approve_amount" id="laamount" placeholder="Enter Loan Approve Amount" maxlength="10">
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
                if(isset($_POST['LD_ID']))
                {
                        $LD_ID=$_POST['LD_ID'];
                        $Loan_Status=$_POST['loan_status'];
                        $Approve_Date=$_POST['approve_date'];
                        $Intallment_Amount=$_POST['installment_amount'];
                        $No_Of_Installment=$_POST['no_of_installment'];
                        $Approve_Amount=$_POST['approve_amount'];
                        $con=mysqli_connect('localhost','root','','samaj_db');
                        $qr="INSERT INTO `loan_approval`(`LD_ID`, `APROVE_AMOUNT`, `LOAN_STATUS`, `APPROVAL_DATE`, `INSTALLMENT_AMOUNT`, `NO_OF_INSTALLMENT`) VALUES ('$LD_ID','$Approve_Amount','$Loan_Status','$Approve_Date','$Intallment_Amount','$No_Of_Installment')";
                        $run=mysqli_query($con,$qr);
                        if($run==TRUE)
                        {
                                echo "<script>alert('Loan Appeove ')</script>";
                        }
                        else
                        {
                                echo "<script>alert('Loan Does Not Approve')</script>";
                        }
                         
                }
?>
            
<?php
include "footer.php";
 ?>
