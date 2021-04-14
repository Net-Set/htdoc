<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-6">
            <h1>Loan Updation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Loan Updation</li>
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
                <h3 class="card-title">Loan Updation</h3>
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
                                    alert("Enter Loan Status");
                                    return false;
                                 }    
                                        if(Status.length<2)
                                        {
                                            alert("Enter Minimum 2 Character");
                                            return false;
                                        }
                                        if(Status.length>3)
                                        {
                                            alert("Enter Maximum 3 Character");
                                            return false;
                                        }
                                        if(Status.match(text))
                                        {
                                            true;
                                        }
                                        else
                                        {
                                             alert("Enter YES OR NO");
                                             return false;
                                        }
                          if(Adate=="")
                          {
                                  alert("Enter Loan Approve Date");
                                  return false;
                          }
                          if(Ainstallment=="")
                          {
                               alert("Enter Loan Installment Amount");
                               return false;
                          }
                                if(Ainstallment.length<4)
                                {
                                      alert("Enter Minimum 4 Number");
                                      return false;
                                }
                                if(Ainstallment.length>8)
                                {
                                   alert("Enter Maximum 8 Number");
                                   return false;
                                }
                                if(Ainstallment.match(text1))
                                {
                                     true;
                                }
                                else
                                {
                                    alert("Enter Only Number");
                                    return false;
                                }
                        if(Ninstallment=="")
                           {
                                alert("Enter Number Of Loan Installment");
                                return false;          
                           }
                                        if(Ninstallment.length<1)
                                        {
                                              alert("Enter Minimum One Digit");
                                              return false;
                                        }
                                        if(Ninstallment.length>2)
                                        {
                                          alert("Enter Maximum 2 Digit");
                                          return false;
                                        }
                                        if(Ninstallment.match(text1))
                                        {
                                          true;
                                        }
                                        else
                                        {
                                             alert("Enter Only Number");
                                             return false;
                                        }
                          if(Loanamount=="")
                          {
                               alert("Enter Loan Approve Amount");
                               return false;
                          }
                                if(Loanamount.length<4)
                                {
                                      alert("Enter Minimum 4 Number");
                                      return false;
                                }
                                if(Loanamount.length>10)
                                {
                                   alert("Enter Maximum 10 Number");
                                   return false;
                                }
                                if(Loanamount.match(text1))
                                {
                                     true;
                                }
                                else
                                {
                                    alert("Enter Only Number");
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
        $Loan_Status=$_POST['loan_status'];
        $Approve_Date=$_POST['approve_date'];
        $Intallment_Amount=$_POST['installment_amount'];
        $No_Of_Installment=$_POST['no_of_installment'];
        $Approve_Amount=$_POST['approve_amount'];
        $qr="INSERT INTO `loan_approval`(`LD_ID`, `APROVE_AMOUNT`, `LOAN_STATUS`, `APPROVAL_DATE`, `INSTALLMENT_AMOUNT`, `NO_OF_INSTALLMENT`) VALUES ('$LD_ID','$Approve_Amount','$Loan_Status','$Approve_Date','$Intallment_Amount','$No_Of_Installment')";
        $run=mysqli_query($con,$qr);
        if($run==TRUE)
        {
                echo "<script>alert('Loan Updation')</script>";
        }
        else
        {
                echo "<script>alert('Loan Updation Problem')</script>";
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
                    <input type="text" class="form-control" id="loan_id" readonly="true" name="ld_id" placeholder="Enter Loan Detail Id" maxlength="5" value="<?php echo $LD_ID?>">
                  </div>
                  <div class="form-group">
                    <label>Member Id</label>
                    <?php
                         $con=mysqli_connect('localhost','root','','samaj_db');
                         $rs=mysqli_query($con,"SELECT `MEM_ID`,concat(convert(`MEM_ID`, char),\"-\",`MEM_NAME`) as member FROM `member_management`");
                     ?>
                     <select name="member" disabled> 
                     <option ><?php echo $Mem_Id;?></option>
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
                    <input type="date" class="form-control" id="loan" readonly="true" name="loan_date" value="<?php echo $Loan_Apply_Date;?>">
                  </div>
                  <div class="form-group">
                    <label>Loan Amount</label>
                    <input type="text" class="form-control" id="a1" readonly="true" name="loan_amount" placeholder="Enter Loan Amount" maxlength="12" value="<?php echo $Loan_Amount;?>"> 
                  </div>
                  <div class="form-group">
                    <label>Loan Purpose</label>
                    <input type="text" class="form-control" id="purpose" readonly="true" name="loan_purpose" placeholder="Enter Loan Purpose" maxlength="30" value="<?php echo $Loan_Purpose;?>">
                  </div>
                 <div class="form-group">
                    <label>Loan Status</label>
                    <input type="text" name="loan_status" class="form-control" id="status" list="blood" placeholder="Loan Status">
                    <datalist id="blood">
                                        <option value="Yes"></option>
                                        <option value="No"></option>
                        </datalist>
                  </div>
                  <div class="form-group">
                    <label>Loan Approvel Date </label>
                    <input type="date" class="form-control" name="approve_date" id="adate"> 
                  </div>
                  <div class="form-group">
                    <label>Loan Installment Amount</label>
                    <input type="text" class="form-control" readonly="true" name="installment_amount" id="ainstallment"  placeholder="Enter Loan Installment Amount" maxlength="8" value="<?php echo $Loan_Amount/10;?>">
                  </div>
                  <div class="form-group">
                    <label>No. Of Installment</label>
                    <input type="text" class="form-control" readonly="true" name="no_of_installment" id="ninstallment" readonly="true" placeholder="Enter No. Of Installmen" maxlength="4" value="10">
                  </div>
                  <div class="form-group">
                    <label>Loan Approve Amount</label>
                    <input type="text" class="form-control" readonly="true" name="approve_amount" id="laamount" placeholder="Enter Loan Approve Amount" maxlength="10" value="<?php echo $Loan_Amount;?>">
                  </div>
                  
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Updated</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                   <a href="loanapply_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>

<?php
include "footer.php";
 ?>