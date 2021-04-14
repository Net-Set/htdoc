<html>
        <head>
        <title>Delete Record</title>
        </head>
        <body>
                <form>
                            <?php
                                    if(isset($_GET['LA_ID']))
                                    {
                                        $LA_ID=$_GET['LA_ID'];
                                        $con=mysqli_connect('localhost','root','','samaj_db');
                                        $qr=mysqli_query($con,"DELETE FROM LOAN_APPROVAL WHERE LA_ID='$LA_ID'");
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