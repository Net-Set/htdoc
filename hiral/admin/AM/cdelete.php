<html>
        <head>
                <head>
                            <title>Creating the Delete Data</title>
        </head>
        <body>
                <?php

                if(isset($_GET['CSM_ID']))
                {
                        $CSM_ID=$_GET['CSM_ID'];
                        $con=mysqli_connect('localhost','root','','samaj_db');
                        $qr=mysqli_query($con,"DELETE FROM credit_society_member WHERE CSM_ID='$CSM_ID'");
                        if($qr==TRUE)
                        {
                                echo "<script>alert('Data will be Delete')</script>";
                        }
                        else
                        {
                                echo "<script>alert('Data Does Not Delete')</script>";
                        }
                        
                }
                ?>
        </body>
</html>