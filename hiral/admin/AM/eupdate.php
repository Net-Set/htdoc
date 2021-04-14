<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Event Updation Form </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Event Details</li>
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
                <h3 class="card-title">Event Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
                          function validation()
                          {
                            var text=/^[A-Za-z" "]+$/;
                            var text1=/^[0-9]+$/;
                            var Event_Id = document.getElementById('Eid').value;
                            var Name = document.getElementById('name').value;
                            var Place = document.getElementById("place").value;
                            var Edate = document.getElementById("edate").value;
                            var Etime = document.getElementById("etime").value;
                            if(Event_Id=="")
                            {
                                  alert("Please Enter Event Item");
                                  return  false;
                            }
                                    if(Event_Id.length<1)
                                    {
                                        alert("Please Enter Minimum  One Number");
                                        return false;
                                    }
                                    if(Event_Id.length>5)
                                    {
                                      alert("Please Enter Minimum 5 Number");
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
                                  alert("Please Enter Event Name");
                                  return  false;
                            }
                                    if(Name.length<3)
                                    {
                                        alert("Please Enter Minimum 3 Character");
                                        return false;
                                    }
                                    if(Name.length>40)
                                    {
                                      alert("Please Enter Minimum 40 Character");
                                      return false;
                                    }
                                    if(Name.match(text))
                                    {
                                      true;
                                    }
                                    else
                                    {
                                        alert("Please Enter Only Event Name");
                                        return false;
                                    }

                            if(Place=="")
                            {
                                  alert("Please Enter Event Place");
                                  return  false;
                            }
                                    if(Place.length<3)
                                    {
                                        alert("Please Enter Minimum 3 Character");
                                        return false;
                                    }
                                    if(Place.length>40)
                                    {
                                      alert("Please Enter Minimum 40 Character");
                                      return false;
                                    }
                                    if(Place.match(text))
                                    {
                                      true;
                                    }
                                    else
                                    {
                                        alert("Please Enter Only Event Place");
                                        return false;
                                    }   
                          if(Edate=="")
                          {
                                alert("Please Enter Event Date");
                                return false;
                          }
                          if(Etime=="")
                          {
                                alert("Please Enter Event Time");
                                return false;
                          }     
                          }
              </script>

              <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $con=mysqli_connect('localhost','root','','samaj_db');
            $EVENT_ID=$_POST['event_id'];
            $Event_Name=$_POST['event_name'];
            $Event_Place=$_POST['event_place'];
            $Event_Date=$_POST['event_date'];
            $Event_Time=$_POST['event_time'];
            if(mysqli_query($con,"UPDATE `event_details` SET `EVENT_ID`='$EVENT_ID',`EVENT_NAME`='$Event_Name',`EVENT_PLACE`='$Event_Place',`EVENT_DATE`='$Event_Date',`EVENT_TIME`='$Event_Time' WHERE EVENT_ID='$EVENT_ID'"))
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
            $EVENT_ID=$_GET['EVENT_ID'];
            $con=mysqli_connect('localhost','root','','samaj_db');
            $rs=mysqli_query($con,"SELECT *FROM EVENT_DETAILS WHERE EVENT_ID='$EVENT_ID'");
            $row=mysqli_fetch_assoc($rs);
            $Event_Name=$row['EVENT_NAME'];
            $Event_Place=$row['EVENT_PLACE'];
            $Event_Date=$row['EVENT_DATE'];
            $Event_Time=$row['EVENT_TIME'];
        }
?>

              <form role="form" action="eupdate.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                <div class="form-group">
                    <label>Event Id</label>
                    <input type="text" class="form-control" id="Eid" name="event_id" placeholder="Enter Event Id" maxlength="5" value="<?php echo $EVENT_ID;?>">
                  </div>
                  <div class="form-group">
                    <label>Event Name</label>
                    <input type="text" class="form-control" id="name" name="event_name" placeholder="Enter Event Name" maxlength="40" value="<?php echo $Event_Name;?>">
                  </div>
                  <div class="form-group">
                    <label>Event Place </label>
                    <input type="text" class="form-control" id="place" name="event_place" placeholder="Enter Event Place" maxlength="40" value="<?php echo $Event_Place;?>">
                  </div>
                  <div class="form-group">
                    <label> Event Date</label>
                    <input type="date" class="form-control" id="edate" name="event_date" value="<?php echo $Event_Date;?>">
                  </div>
                  <div class="form-group">
                    <label>Event Time</label>
                    <input type="time" class="form-control" id="etime" name="event_time" placeholder="Enter Event Time" value="<?php echo $Event_Time;?>">
                  </div>
                  
                  <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>
                 <a href="event_view.php"  class="btn btn-primary">view</a>
                </div>
              </form>
            </div>
            
<?php
include "footer.php";
 ?>
