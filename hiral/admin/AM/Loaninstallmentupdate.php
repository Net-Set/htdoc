<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loan Installment Updation Form </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Loan Installment Details</li>
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
                <h3 class="card-title">Loan Installment Details</h3>
              </div>
              <!-- card-header -->
              <!-- form start -->
              <script>
                         function validation()
                         {
                             var text=/^[0-9]+$/;
                             var Lid_Id = document.getElementById('installment_id').value;
                             var La_Id = document.getElementById('Loan_id').value;
                             var Mem_Id = document.getElementById('member_id').value;
                             var Amount = document.getElementById('amount').value;
                             var Idate = document.getElementById('idate').value;
                             var Total = document.getElementById('to').value;
                             if(Lid_Id=="")
                             {
                                  alert("Please Enter Loan Installment Id");
                                  return false;
                             }
                                          if(Lid_Id.length<1)
                                          {
                                                alert("Please Enter Minimum One Number");
                                                return false;
                                          }
                                          if(Lid_Id.length>5)
                                          {
                                                alert("Please Enter Maximum 5 Number");
                                                return false;
                                          }
                                          if(Lid_Id.match(text))
                                          {
                                              true;
                                          }
                                          else
                                          {
                                              alert("Please Enter Only Number");
                                              return false;
                                          }
                            if(La_Id=="")
                             {
                                  alert("Please Enter Loan Approvel Id");
                                  return false;
                             }
                                          if(La_Id.length<1)
                                          {
                                                alert("Please Enter Minimum One Number");
                                                return false;
                                          }
                                          if(La_Id.length>5)
                                          {
                                                alert("Please Enter Maximum 5 Number");
                                                return false;
                                          }
                                          if(La_Id.match(text))
                                          {
                                              true;
                                          }
                                          else
                                          {
                                              alert("Please Enter Only Number");
                                              return false;
                                          }
                             if(Mem_Id=="")
                             {
                                  alert("Please Enter Member Id");
                                  return false;
                             }
                                          if(Mem_Id.length<1)
                                          {
                                                alert("Please Enter Minimum One Number");
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
                                          else
                                          {
                                              alert("Please Enter Only Number");
                                              return false;
                                          }
                             if(Amount=="")
                             {
                                  alert("Please Enter Loan Installment Amount");
                                  return false;
                             }
                                          if(Amount.length<4)
                                          {
                                                alert("Please Enter Minimum 4 Number");
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
                                if(Idate=="")
                                {
                                      alert("Please Enter Installment Date");
                                      return false;
                                }

                            if(Total=="")
                             {
                                  alert("Please Enter Total Installment Amount");
                                  return false;
                             }
                                          if(Total.length<4)
                                          {
                                                alert("Please Enter Minimum 4 Number");
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

              <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $LID_ID=$_POST['lid_id'];
        $La_Id=$_POST['LA_ID'];
        $Mem_Id=$_POST['mem_id'];
        $Installment_Amount=$_POST['installment_amount'];
        $Installment_Date=$_POST['installment_date'];
        $Total=$_POST['total'];
        if(mysqli_query($con,"UPDATE `loan_installment_details` SET `LID_ID`='$LID_ID',`LA_ID`='$La_Id',`MEM_ID`='$Mem_Id',`INSTALLMENT_DATE`='$Installment_Date',`INSTALLMENT_AMOUNT`='$Installment_Amount',`TOTAL`='$Total' WHERE LID_ID='$LID_ID'"))
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
        $LID_ID=$_GET['LID_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM LOAN_INSTALLMENT_DETAILS WHERE LID_ID='$LID_ID'");
        $row=mysqli_fetch_assoc($rs);
        $La_Id=$row['LA_ID'];
        $Mem_Id=$row['MEM_ID'];
        $Installment_Amount=$row['INSTALLMENT_AMOUNT'];
        $Installment_Date=$row['INSTALLMENT_DATE'];
        $Total=$row['TOTAL'];
    }
?>

              <form role="form" action="Loaninstallmentupdate.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Loan Installment Detail Id</label>
                    <input type="text" class="form-control" name="lid_id" id="installment_id" placeholder="Enter Loan Installment Id" maxlength="5" value="<?php echo $LID_ID;?>">
                  </div>
                  <div class="form-group">
                    <label>Loan Approvel Id</label>
                      <?php
                          $con=mysqli_connect('localhost','root','','samaj_db');
                          $rs=mysqli_query($con,"SELECT *FROM loan_approval");
                      ?>
                      <select name="LA_ID"> 
                        <option><?php echo $La_Id;?></option>
                        <?php
                           while($row=mysqli_fetch_assoc($rs))
                             {
                              echo "<option value='".$row["LA_ID"]."'>".$row["LA_ID"]."</option>";
                             }
                        ?>
                      </select>
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
                    <label>Installment Amount</label>
                    <input type="text" class="form-control" name="installment_amount" id="amount" placeholder="Enter Installment Amount" maxlength="5" value="<?php echo $Installment_Amount;?>">
                  </div>
                  <div class="form-group">
                    <label>Installment Date </label>
                    <input type="date" class="form-control" name="installment_date" id="idate" value="<?php echo $Installment_Date;?>" > 
                  </div>
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" class="form-control" name="total" id="to" placeholder="Total" value="<?php echo $Total;?>">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="installment_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
<?php
include "footer.php";
 ?>
