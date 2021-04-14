<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donation Member Updation Form </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Donation Member Updation Details</li>
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
                <h3 class="card-title">Donation Member Updation Details</h3>
              </div>            
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                              function validation()
                              {
                                 var text=/^[0-9]+$/;
                                 var Dtm_Id= document.getElementById('d1').value;
                               //  var Member = document.getElementById('member')
                                 var Donation = document.getElementById('donation').value;
                                 var Amount = document.getElementById('a1').value;
                                 var Total = document.getElementById('to').value;
                                 if(Dtm_Id=="")
                                 {
                                        alert("Please Enter Donation Type Master Id");
                                        return false;
                                 }
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
              <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $DTM_ID=$_POST['dtm_id'];
        $Mem_Id=$_POST['member'];
        $Dt_Id=$_POST['donation'];
        $Donation_Date=$_POST['donation_date'];
        $Amount=$_POST['amount'];
        $Total=$_POST['total'];
        if(mysqli_query($con,"UPDATE `donation_member` SET `DTM_ID`='$DTM_ID',`DT_ID`='$Dt_Id',`MEM_ID`='$Mem_Id',`DONATION_DATE`='$Donation_Date',`AMOUNT`='$Amount',`TOTAL`='$Total' WHERE DTM_ID='$DTM_ID'"))
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
        $DTM_ID=$_GET['DTM_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT * FROM DONATION_MEMBER WHERE DTM_ID='$DTM_ID'");
        $row=mysqli_fetch_assoc($rs);  
        $Dt_Id=$row['DT_ID'];
        $Mem_Id=$row['MEM_ID'];
        $Donation_Date=$row['DONATION_DATE'];
        $Amount=$row['AMOUNT'];
        $Total=$row['TOTAL'];
    }
?>

              <form role="form" action="Donationmemberupdate.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>DTM_Id</label>
                    <input type="text" class="form-control" id="d1" name="dtm_id" placeholder="Enter Donation Type Master Id" maxlength="5" value="<?php echo $DTM_ID;?>">
                  </div>
                  <div class="form-group">
                    <label>Donation Type Id</label>
                    <?php
                                $con=mysqli_connect('localhost','root','','samaj_db');
                                $rs=mysqli_query($con,"SELECT `DT_ID`,concat(convert(`DT_ID`, char),\"-\",`DONATION_TYPE_NAME`) as donation FROM `DONATION_TYPE_MASTER` ");
                            ?>
                           <select name="donation"> 
                           <option><?php echo $Dt_Id;?></option>
                           <?php
                           while($row=mysqli_fetch_assoc($rs))
                            {
                                echo "<option value='".$row["DT_ID"]."'>".$row["donation"]."</option>";
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
                    <label>Donation Date</label>
                    <input type="date" class="form-control" id="donation" name="donation_date"  value="<?php echo $Donation_Date?>">
                  </div>
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" id="a1" name="amount" placeholder="Enter Amount" maxlength="10" value="<?php echo $Amount;?>">
                  </div>
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" class="form-control" id="to"  name="total" placeholder="Total Amount" value="<?php echo $Total;?>">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="donationmember_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            
<?php
include "footer.php";
 ?>
