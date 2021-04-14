<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Committee Updation Form  </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Committee Member Details </li>
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
                <h3 class="card-title">Committee Member Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                              function validation()
                              {
                                    var text=/^[A-Za-z" "]+$/;
                                    var text1=/^[0-9]+$/;
                                    var Comm_Id = document.getElementById('com_id').value;
                                    var Mem_Id = document.getElementById('member_id').value;
                                    var Name = document.getElementById('name').value;
                                    var Join = document.getElementById('join').value;
                                    if(Comm_Id=="")
                                    {
                                         alert("Please Enter Committee Member Id");
                                         return false;
                                    }
                                          if(Comm_Id.length<1)
                                          {
                                               alert("Please Enter Minimum One Number");
                                               return false;
                                          }
                                          if(Comm_Id.length>5)
                                          {
                                              alert("Please Enter Maximum 5 Number");
                                              return false;
                                          }
                                          if(Comm_Id.match(text1))
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
                                          if(Mem_Id.match(text1))
                                          {
                                               true;
                                          }
                                          else
                                          {
                                                alert("Please Enter Only Number");
                                                return false;
                                          }
                                    if(Name=="")
                                    {
                                         alert("Please Enter Committee Name");
                                         return false;
                                    }
                                          if(Name.length<5)
                                          {
                                               alert("Please Enter Minimum 5 Character");
                                               return false;
                                          }
                                          if(Name.length>30)
                                          {
                                              alert("Please Enter Maximum 30 Character");
                                              return false;
                                          }
                                          if(Name.match(text))
                                          {
                                               true;
                                          }
                                          else
                                          {
                                                alert("Please Enter Only Character");
                                                return false;
                                          }
                                    if(Join=="")
                                    {
                                         alert("Please Enter Join Date");
                                         return false;
                                    }
                              }
              </script>

              <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $COMM_ID=$_POST['comm_id'];
        $Mem_Id=$_POST['member'];
        $Committee_Name=$_POST['committee_name'];
        $Join_Date=$_POST['join_date'];
        if(mysqli_query($con,"UPDATE `committee_member_details` SET `COMM_ID`='$COMM_ID',`MEM_ID`='$Mem_Id',`COMMITTEE_NAME`='$Committee_Name',`JOIN_DATE`='$Join_Date' WHERE COMM_ID='$COMM_ID'"))
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
        $COMM_ID=$_GET['COMM_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM COMMITTEE_MEMBER_DETAILS WHERE COMM_ID='$COMM_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Mem_Id=$row['MEM_ID'];
        $Committee_Name=$row['COMMITTEE_NAME'];
        $Join_Date=$row['JOIN_DATE'];
    }
?>

              <form role="form" action="comupdate.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Committee Member Id</label>
                    <input type="text" class="form-control" name="comm_id" id="com_id" placeholder="Enter Committee Member Id" maxlength="5" value="<?php echo $COMM_ID;?>">

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
                    <label>Committee Name</label>
                    <input type="text" class="form-control" name="committee_name" id="name" placeholder="Enter Committee Name" maxlength="30" value="<?php echo $Committee_Name;?>">

                  </div>
                  <div class="form-group">
                    <label>Join Date</label>
                    <input type="date" class="form-control" name="join_date" id="join" placeholder="Enter Join Date" value="<?php echo $Join_Date;?>">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="committee_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            
            
<?php
include "footer.php";
 ?>
