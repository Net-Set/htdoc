<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loan Apply Form </h1>
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
                              var Loan = document.getElementById('loan').value;
                              var text=/^[0-9]+$/;
                              var text1=/^[A-Za-z" "]+$/;
                              var Amount = document.getElementById('a1').value;
                              var Purpose = document.getElementById('purpose').value;
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
              <form role="form" action="Loan Apply Details.php" method="POST" onsubmit="return validation()">
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
                    <label>Loan Apply Date</label>
                    <input type="date" class="form-control" id="loan" name="loan_date">
                  </div>
                  <div class="form-group">
                    <label>Loan Amount</label>
                    <input type="text" class="form-control" id="a1" name="loan_amount" placeholder="Enter Loan Amount" maxlength="12"> 
                  </div>
                  <div class="form-group">
                    <label>Loan Purpose</label>
                    <input type="text" class="form-control" id="purpose" name="loan_purpose" placeholder="Enter Loan Purpose" maxlength="30">
                  </div>
                  
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="loanapply_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>

            <?php
        if(isset($_POST['submit']))
        {
            $MEM_ID=$_POST['member'];
            $loan_date=$_POST['loan_date'];
            $Loan_Amount=$_POST['loan_amount'];
            $Loan_Purpose=$_POST['loan_purpose'];
            $con=mysqli_connect('localhost','root','','samaj_db');
            $qr="INSERT INTO `loan_apply`(`MEM_ID`, `LOAN_APPLY_DATE`, `LOAN_AMOUNT`, `LOAN_PURPRSE`) VALUES (' $MEM_ID','$loan_date','$Loan_Amount','$Loan_Purpose')";
            $run=mysqli_query($con,$qr);
            if($run==TRUE)
            {
                echo "<script>alert('Loan Detail Are Submit')</script>";
            }
            else
            {
                echo "<script>alert('Loan Detail Does Not Submit')</script>";
            }
        }
?>
<?php
include "footer.php";
 ?>
