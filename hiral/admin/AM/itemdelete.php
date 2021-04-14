<html>
        <head>
                <title></title>
        </head>
        <body>
                <?php
                        if(isset($_GET['DID_ID']))
                        {
                            $DID_ID=$_GET['DID_ID'];
                             $con=mysqli_connect('localhost','root','','samaj_db');
                             $qr=mysqli_query($con,"DELETE FROM DONATION_ITEM_DETAILS WHERE DID_ID='$DID_ID'");
                             if($qr==TRUE)
                             {
                                 echo "<script>alert('Recrod Delete')</script>";
                             }
                             else
                             {
                                echo "<script>alert('Recrod Does Not Delete')</script>";
                             }
                        }
                ?>
        </body>
</html>