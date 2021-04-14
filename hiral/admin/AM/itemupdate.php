<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donation Item  Updation Form </h1>
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
                                      var Did_Id = document.getElementById('item_id').value;
                                      var Dmem_Id = document.getElementById('dmem_id').value;
                                      var Event_Id = document.getElementById('event').value;
                                      var Name = document.getElementById("name").value;
                                      var Qty = document.getElementById("qty").value;
                                      var Description = document.getElementById("description").value;
                                      if(Did_Id=="")
                                      {
                                          alert("Please Enter Donation Item Id");
                                          return false;
                                      }
                                                if(Did_Id.length<1)
                                                    {
                                                        alert("Please Enter Minimum 1 Number ");
                                                        return false;
                                                    }
                                                    if(Did_Id.length>5)
                                                    {
                                                        alert("Please Enter Item Maximum 5 Number");
                                                        return false;
                                                    }
                                                    if(Did_Id.match(text1))
                                                    {
                                                            true;
                                                    }
                                                    else
                                                    {
                                                            alert("Please Enter Only Number");
                                                            return false;
                                                    }
                                     if(Dmem_Id=="")
                                      {
                                          alert("Please Enter Donation Member Id ");
                                          return false;
                                      }
                                                    if(Dmem_Id.length<1)
                                                    {
                                                        alert("Please Enter Minimum 1 Number ");
                                                        return false;
                                                    }
                                                    if(Dmem_Id.length>5)
                                                    {
                                                        alert("Please Enter Item Maximum 5 Number");
                                                        return false;
                                                    }
                                                    if(Dmem_Id.match(text1))
                                                    {
                                                            true;
                                                    }
                                                    else
                                                    {
                                                            alert("Please Enter Only Number");
                                                            return false;
                                                    } 
                                     if(Event_Id=="")
                                      {
                                          alert("Please Enter Event Id");
                                          return false;
                                      }
                                                if(Event_Id.length<1)
                                                    {
                                                        alert("Please Enter Minimum One Number ");
                                                        return false;
                                                    }
                                                    if(Event_Id.length>5)
                                                    {
                                                        alert("Please Enter Item Maximum 5 Number");
                                                        return false;
                                                    }
                                                    if(Event_Id.match(text1))
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

              <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $con=mysqli_connect('localhost','root','','samaj_db');
        $DID_ID=$_POST['did_id'];
        $Dtm_Id=$_POST['DTM_ID'];
        $Event_Id=$_POST['event'];
        $Item_Name=$_POST['item_name'];
        $Item_Description=$_POST['item_description'];
        $Item_Qty=$_POST['item_qty'];
        if(mysqli_query($con,"UPDATE `donation_item_details` SET `DID_ID`='$DID_ID',`DTM_ID`='$Dtm_Id',`EVENT_ID`='$Event_Id',`ITEM_NAME`='$Item_Name',`ITEM_DESCRIPTION`='$Item_Description',`ITEM_QTY`='$Item_Qty' WHERE DID_ID='$DID_ID'"))
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
        $DID_ID=$_GET['DID_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"SELECT *FROM DONATION_ITEM_DETAILS WHERE DID_ID='$DID_ID'");
        $row=mysqli_fetch_assoc($rs);
        $Dtm_Id=$row['DTM_ID'];
        $Event_Id=$row['EVENT_ID'];
        $Item_Name=$row['ITEM_NAME'];
        $Item_Description=$row['ITEM_DESCRIPTION'];
        $Item_Qty=$row['ITEM_QTY'];
    }
?>

              <form role="form" action="itemupdate.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Donation Item Detail Id</label>
                    <input type="text" class="form-control" id="item_id" name="did_id" placeholder="Enter Item Detail Id" maxlength="5" value="<?php echo $DID_ID;?>">
                  </div>
                  <div class="form-group">
                    <label>Donation Member Id</label>
                    <?php
                                          $con=mysqli_connect('localhost','root','','samaj_db');
                                          $rs=mysqli_query($con,"SELECT *FROM donation_member");
                                       ?>
                                        <select name="DTM_ID"> 
                                        <option><?php echo $Dtm_Id;?></option>
                                         <?php
                                         while($row=mysqli_fetch_assoc($rs))
                                           {
                                               echo "<option value='".$row["DTM_ID"]."'>".$row["DTM_ID"]."</option>";
                                            }
                                        ?>
                                       </select>
                  </div>
                     <div class="form-group">
                        <label>Event Id </label>
                          <?php
                             $con=mysqli_connect('localhost','root','','samaj_db');
                             $rs=mysqli_query($con,"SELECT `EVENT_ID`,concat(convert(`EVENT_ID`,char),\"-\",`EVENT_NAME`) as event FROM `EVENT_DETAILS`");
                          ?>
                    <select name="event"> 
                    <option><?php echo $Event_Id;?></option>
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
                    <input type="text" class="form-control" id="name" name="item_name" placeholder="Enter Item Name" maxlength="15" value="<?php echo $Item_Name;?>">
                  </div>
                  <div class="form-group">
                    <label>Item Quantity</label>
                    <input type="text" class="form-control" id="qty" name="item_qty" placeholder="Enter Item Quantity" maxlength="4" value="<?php echo $Item_Qty;?>">
                  </div>
                  <div class="form-group">
                    <label>Item Description</label>
                    <input type="text" class="form-control" id="description" name="item_description" placeholder="Enter Item Description" maxlength="30" value="<?php echo $Item_Description;?>">
                  </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="donationitem_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
                        
<?php
include "footer.php";
 ?>
