<html>
        <head>
        <title>Delete Record</title>
        </head>
        <body>
                <form>
                            <?php
                                    if(isset($_GET['DTM_ID']))
                                    {
                                        $DTM_ID=$_GET['DTM_ID'];
                                        $con=mysqli_connect('localhost','root','','samaj_db');
                                        $qr=mysqli_query($con,"DELETE FROM DONATION_MEMBER WHERE DTM_ID='$DTM_ID'");
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