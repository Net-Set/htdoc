<html>
        <head>
                <title></title>
        </head>
        <body>
                <?php
                        if(isset($_GET['LID_ID']))
                        {
                            $LID_ID=$_GET['LID_ID'];
                             $con=mysqli_connect('localhost','root','','samaj_db');
                             $qr=mysqli_query($con,"DELETE FROM LOAN_INSTALLMENT_DETAILS WHERE LID_ID='$LID_ID'");
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