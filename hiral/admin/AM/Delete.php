<html>
<head>
<title> Delete Data</title>
</head>
<body>
<form>
<?php
    if(isset($_GET['MEM_ID']))
    {
        $MEM_ID=$_GET['MEM_ID'];
        $con=mysqli_connect('localhost','root','','samaj_db');
        $rs=mysqli_query($con,"DELETE FROM MEMBER_MANAGEMENT WHERE MEM_ID='$MEM_ID'");              
          if($rs==TRUE)
          {
              echo "<script>alert('Deleted')</script>";
          }
          else
          {
            echo "<script>alert('Not Deleted')</script>";
          }
        }
?>
</form>
</body>
</html>