<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fees Updation Form </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Fees Details</li>
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
                <h3 class="card-title">Fees Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                            function validation()
                            {
                                      var text=/^[A-Za-z" "]+$/;
                                      var text1=/^[0-9]+$/;
                                      var Ft_Id = document.getElementById('ft').value;
                                      var Name = document.getElementById('type').value;
                                      var Amount = document.getElementById('a1').value;
                                      var Duration = document.getElementById('d1').value;
                                     // var Qty = document.getElementById("qty").value;
                                     // var Description = document.getElementById("description").value;
                                      if(Ft_Id=="")
                                      {
                                          alert("Please Enter  Member Fees Id");
                                          return false;
                                      }
                                                if(Ft_Id.length<1)
                                                    {
                                                        alert("Please Enter Minimum 1 Number ");
                                                        return false;
                                                    }
                                                    if(Ft_Id.length>5)
                                                    {
                                                        alert("Please Enter Item Maximum 5 Number");
                                                        return false;
                                                    }
                                                    if(Ft_Id.match(text1))
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
                                          alert("Please Enter Fees Name");
                                          return false;
                                      }
                                          if(Name.length<3)
                                          {
                                              alert("Please Enter Minimum 3 Character");
                                              return false;
                                          }
                                          if(Name.length>30)
                                          {
                                              alert("Please Enter Item Maximum 30 Chracter");
                                              return false;
                                          }
                                          if(Name.match(text))
                                          {
                                                true;
                                          }
                                          else
                                          {
                                                alert("Please Enter Only Name");
                                                return false;
                                          }

                                     if(Amount=="")
                                      {
                                          alert("Please Enter Amount ");
                                          return false;
                                      }
                                                    if(Amount.length<3)
                                                    {
                                                        alert("Please Enter Minimum 3 Number ");
                                                        return false;
                                                    }
                                                    if(Amount.length>5)
                                                    {
                                                        alert("Please Enter Item Maximum 5 Number");
                                                        return false;
                                                    }
                                                    if(Amount.match(text1))
                                                    {
                                                            true;
                                                    }
                                                    else
                                                    {
                                                            alert("Please Enter Only Number");
                                                            return false;
                                                    } 
                                        if(Duration=="")
                                            {
                                                        alert("Please Enter Fees Duration");
                                                        return false;
                                           }
                                                        if(Duration.length<3)
                                                        {
                                                            alert("Please Enter Minimum 3 Character");
                                                            return false;
                                                        }
                                                        if(Duration.length>10)
                                                        {
                                                            alert("Please Enter Item Maximum 10 Chracter");
                                                            return false;
                                                        }
                                                        if(Duration.match(text))
                                                        {
                                                              true;
                                                        }
                                                        else
                                                        {
                                                              alert("Please Enter Only Duration");
                                                              return false;
                                                        }
                            }
              </script>

    <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $FT_ID=$_POST['ft_id'];
        $Name=$_POST['fees_name'];
        $Amount=$_POST['amount'];
        $Duration=$_POST['duration'];
        if(mysqli_query($con,"UPDATE `fees_type_master` SET `FT_ID`='$FT_ID',`FEESTYPE_NAME`='$Name',`AMOUNT`='$Amount',`DURATION`='$Duration' WHERE FT_ID='$FT_ID'"))
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
        $FT_ID=$_GET['FT_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM FEES_TYPE_MASTER WHERE FT_ID='$FT_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Name=$row['FEESTYPE_NAME'];
        $Amount=$row['AMOUNT'];
        $Duration=$row['DURATION'];
    }
?>

              <form role="form" action="" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Member Fees Id</label>
                    <input type="text" class="form-control" id="ft" name="ft_id" placeholder="Enter Member Fees Id" maxlength="5" value="<?php echo $FT_ID;?>">
                  </div>
                     <div class="form-group">
                        <label>Fees Name </label>
                        <input type="text" class="form-control" id="type" name="fees_name" placeholder="Enter Member Fees Name" value="<?php echo $Name;?>">
                  </div>
                  <div class="form-group">
                    <label> Amount</label>
                    <input type="text" class="form-control" id="a1" name="amount" placeholder="Amount" value="<?php echo $Amount;?>">
                  </div>
                  <div class="form-group">
                    <label>Duration</label>
                    <input type="text" class="form-control" id="d1" name="duration" placeholder="duration" value="<?php echo $Duration;?>">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="fees_type_View.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
                        
<?php
include "footer.php";
 ?>
