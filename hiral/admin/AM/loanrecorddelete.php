<html>
        <head>
                <title></title>
        </head>
        <body>
                <form>
                        <?php
                               if(isset($_GET['LD_ID']))
                               {
                                   $LD_ID=$_GET['LD_ID'];
                                   $con=mysqli_connect('localhost','root','','samaj_db');
                                   $qr=mysqli_query($con,"DELETE FROM LOAN_APPLY WHERE LD_ID='$LD_ID'");
                                   if($qr==TRUE)
                                   {
                                       echo "<script>alert('Record Delete')</script>";
                                   }
                                   else
                                   {
                                    echo "<script>alert('Record Does Not Delete')</script>";
                                   }

                               }
                        ?>
                </form>
        </body>
</html>