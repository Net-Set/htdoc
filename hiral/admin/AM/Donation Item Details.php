<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donation Item Form </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Donation Item Details</li>
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
                <h3 class="card-title">Donation Item Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                            function validation()
                            {
                                      var text=/^[A-Za-z" "]+$/;
                                      var text1=/^[0-9]+$/;
                                      var Name = document.getElementById("name").value;
                                      var Qty = document.getElementById("qty").value;
                                      var Description = document.getElementById("description").value;
                                      if(Name=="")
                                      {
                                          alert("Please Enter Donation Item Name");
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


                                      if(Qty=="")
                                      {
                                          alert("Please Enter Item Quantity");
                                          return false;
                                      }
                                          if(Qty.length<1)
                                          {
                                              alert("Please Enter Minimum 1 Number ");
                                              return false;
                                          }
                                          if(Qty.length>4)
                                          {
                                              alert("Please Enter Item Maximum 4 Number");
                                              return false;
                                          }
                                          if(Qty.match(text1))
                                          {
                                                true;
                                          }
                                          else
                                          {
                                                alert("Please Enter Only Number");
                                                return false;
                                          } 
                                 if(Description=="")
                                 {
                                        alert("Please Enter Item Description");
                                        return false;
                                 }     
                                          if(Description.length<3)
                                          {
                                              alert("Please Enter Minimum 3 Character");
                                              return false;
                                          }
                                          if(Description.length>30)
                                          {
                                              alert("Please Enter Item Maximum 30 Chracter");
                                              return false;
                                          }
                                          if(Description.match(text))
                                          {
                                                true;
                                          }
                                          else
                                          {
                                                alert("Please Enter Only Description");
                                                return false;
                                          }
                            }
              </script>
              <form role="form" action="Donation Item Details.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                <label>Donation Member Id</label>
                <?php
                                      $con=mysqli_connect('localhost','root','','samaj_db');
                                      $rs=mysqli_query($con,"SELECT *FROM donation_member");
                                   ?>
                                    <select name="DTM_ID"> 
                                    <option value=0>--select--</option>
                                     <?php
                                     while($row=mysqli_fetch_assoc($rs))
                                       {
                                           echo "<option value='".$row["DTM_ID"]."'>".$row["DTM_ID"]."</option>";
                                        }
                                    ?>
                                   </select>

              </div>
              <div class="form-group">
              <label>Event Name</label>
              <?php
                    $con=mysqli_connect('localhost','root','','samaj_db');
                    $rs=mysqli_query($con,"SELECT `EVENT_ID`,concat(convert(`EVENT_ID`,char),\"-\",`EVENT_NAME`) as event FROM `EVENT_DETAILS`");
              ?>
              <select name="event"> 
              <option value=0>--select--</option>
              <?php
                    while($row=mysqli_fetch_assoc($rs))
                    {
                      echo "<option value='".$row["EVENT_ID"]."'>".$row["event"]."</option>";
                    }
              ?>
              </select>
            </div>
                  <div class="form-group">
                    <label> Item Name</label>
                    <input type="text" class="form-control" id="name" name="item_name" placeholder="Enter Item Name" maxlength="15">
                  </div>
                  <div class="form-group">
                    <label>Item Quantity</label>
                    <input type="text" class="form-control" id="qty" name="item_qty" placeholder="Enter Item Quantity" maxlength="4">
                  </div>
                  <div class="form-group">
                    <label>Item Description</label>
                    <input type="text" class="form-control" id="description" name="item_description" placeholder="Enter Item Description" maxlength="15">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="donationitem_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            <?php
                if(isset($_POST['submit']))
                {
                        $DTM_ID=$_POST['DTM_ID'];
                        $EVENT_NAME=$_POST['event'];
                        $Item_Name=$_POST['item_name'];
                        $Item_Qty=$_POST['item_qty'];
                        $Item_Description=$_POST['item_description'];
                        $con=mysqli_connect('localhost','root','','samaj_db');
                        $qr="INSERT INTO `donation_item_details`(`DTM_ID`, `EVENT_ID`, `ITEM_NAME`, `ITEM_DESCRIPTION`, `ITEM_QTY`) VALUES ('$DTM_ID','$EVENT_NAME','$Item_Name','$Item_Description','$Item_Qty')";
                        $run=mysqli_query($con,$qr);
                        if($run==TRUE)
                        {
                                echo "<script>alert('You have Donation Item Save')</script>";
                        }
                        else
                        {
                                echo "<script>alert('Save Fail')</script>";
                        }
                }
?>

            
<?php
include "footer.php";
 ?>
