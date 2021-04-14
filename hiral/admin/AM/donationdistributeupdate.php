<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donation Distribute Updation Form </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Donation Distribute Details</li>
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
                <h3 class="card-title">Donation Distribute Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                          function validation()
                          {
                             var text=/^[A-Za-z" "]+$/;
                             var text1=/^[0-9]+$/;
                             var Member_Id = document.getElementById('mem').value;
                             var DDD_ID = document.getElementById('ddd').value;
                             var Start = document.getElementById('distribute').value;
                             var Purpose=document.getElementById('purpose').value;
                             if(DDD_ID=="")
                             {
                                   alert("Please Enter Donation Distribute Detail Id");
                                   return false;
                             }
                                        if(DDD_ID.length<1)
                                        {
                                              alert("Please Enter Minimum One Number");
                                              return false;
                                        }
                                        if(DDD_ID.length>5)
                                        {
                                            alert("Please Ennter Maximum 5 Number");
                                            return false;
                                        }
                                        if(DDD_ID.match(text1))
                                        {
                                            true;
                                        }
                                        else
                                        {
                                            alert("Please Enter Only Number");
                                            return false;
                                        }
                             if(Member_Id=="")
                             {
                                   alert("Please Enter Member Id");
                                   return false;
                             }
                                        if(Member_Id.length<1)
                                        {
                                              alert("Please Enter Minimum One Number");
                                              return false;
                                        }
                                        if(Member_Id.length>5)
                                        {
                                            alert("Please Ennter Maximum 5 Number");
                                            return false;
                                        }
                                        if(Member_Id.match(text1))
                                        {
                                            true;
                                        }
                                        else
                                        {
                                            alert("Please Enter Only Number");
                                            return false;
                                        }            
                          if(Start=="")
                           {
                             alert("Please Enter the Distribute Date");
                             return false;
                           }
                           if(Purpose=="")
                           {
                             alert("Please Enter the Purpose");
                             return false;
                           }                       if(Purpose.length<3)
                                                   {
                                                        alert("Please Enter the Minimum 3 Caracter");
                                                        return false;
                                                   }
                                                  if(Purpose.length>15)
                                                  {
                                                      alert("Please Enter the Maximum 15 Character");
                                                      return false;
                                                  }
                                                  if(Purpose.match(text))
                                                  {
                                                    true;
                                                  }
                                                    else {
                                                      alert("Please Enter Only Purpose");
                                                      return false;
                                                  }
                              
                          }
              </script>
              <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $DDD_ID=$_POST['ddd_id'];
        $Mem_Id=$_POST['member'];
        $Donate_Amount=$_POST['donate_amount'];
        $Donate_Item=$_POST['donate_item'];
        $Distribute_Date=$_POST['distribute_date'];
        $Donate_Purpose=$_POST['donate_purpose'];
        if(mysqli_query($con,"UPDATE `donation_distribute_details` SET `DDD_ID`='$DDD_ID',`MEM_ID`='$Mem_Id',`DISTRIBUTE_DATE`='$Distribute_Date',`DONATE_AMOUNT`='$Donate_Amount',`DONATE_ITEM`='$Donate_Item',`DONATE_PURPOSE`='$Donate_Purpose' WHERE DDD_ID='$DDD_ID'"))
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
        $DDD_ID=$_GET['DDD_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT * FROM DONATION_DISTRIBUTE_DETAILS WHERE DDD_ID='$DDD_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Mem_Id=$row['MEM_ID'];
        $Donate_Amount=$row['DONATE_AMOUNT'];
        $Donate_Item=$row['DONATE_ITEM'];
        $Distribute_Date=$row['DISTRIBUTE_DATE'];
        $Donate_Purpose=$row['DONATE_PURPOSE'];
    }
?>

              <form role="form" action="donationdistributeupdate.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Donation Distribute Detail Id</label>
                    <input type="text" class="form-control" id="ddd" name="ddd_id" placeholder="Enter Donation Distribute Detail Id" maxlength="5" value="<?php echo $DDD_ID;?>">
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
                    <label>Donation Amount </label>
                    <input type="text" class="form-control" id="amount" name="donate_amount" placeholder="Enter Donation Amount" maxlength="10" value="<?php echo $Donate_Amount;?>">

                  </div>
                  <div class="form-group">
                    <label>Donation Item</label>
                    <input type="text" class="form-control" id="item" name="donate_item" placeholder="Enter Donation Item" maxlength="15" value="<?php echo $Donate_Item;?>">
                  </div>
                  <div class="form-group">
                    <label>Distribute Date</label>
                    <input type="date" class="form-control" id="distribute" name="distribute_date" value="<?php echo $Distribute_Date;?>">
                  </div>
                  <div class="form-group">
                    <label>Donate Purpose</label>
                    <input type="text" class="form-control" id="purpose" name="donate_purpose" placeholder="Enter Donate Purpose" maxlength="15" value="<?php echo $Donate_Purpose;?>">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="distribute_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
              
<?php
include "footer.php";
 ?>
