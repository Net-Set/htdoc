<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Event Form </h1>
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
                            var Name = document.getElementById('name').value;
                            var Place = document.getElementById("place").value;
                            var Edate = document.getElementById("edate").value;
                            var Etime = document.getElementById("etime").value;
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
              <form role="form" action="Event Details.php" method="POST" onsubmit="return validation()">
                <div class="card-body">
                  <div class="form-group">
                    <label>Event Name</label>
                    <input type="text" class="form-control" id="name" name="event_name" placeholder="Enter Event Name" maxlength="40">
                  </div>
                  <div class="form-group">
                    <label>Event Place </label>
                    <input type="text" class="form-control" id="place" name="event_place" placeholder="Enter Event Place" maxlength="40">
                  </div>
                  <div class="form-group">
                    <label> Event Date</label>
                    <input type="date" class="form-control" id="edate" name="event_date">
                  </div>
                  <div class="form-group">
                    <label>Event Time</label>
                    <input type="time" class="form-control" id="etime" name="event_time" placeholder="Enter Event Time">
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
        if(isset($_POST['event_name']))
        {
            $Event_name=$_POST['event_name'];
            $Event_Place=$_POST['event_place'];
            $Event_Date=$_POST['event_date'];
            $Event_Time=$_POST['event_time'];
            $con=mysqli_connect('localhost','root','','samaj_db');
            $qr="INSERT INTO `event_details`(`EVENT_NAME`, `EVENT_PLACE`, `EVENT_DATE`, `EVENT_TIME`) VALUES ('$Event_name','$Event_Place','$Event_Date','$Event_Time')";
            $run=mysqli_query($con,$qr);
            if($run==TRUE)
            {
                echo "<script>alert('Record Are Inserted Successfull')</script>";
            }
            else
            {
                echo "<script>alert('Record Does Not Inserted Successfull')</script>";
            }
        }
?>
            
<?php
include "footer.php";
 ?>
