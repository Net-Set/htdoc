<html>
        <head>
                <title>Delete the Record </title>
        </head>
        <body>
                <form>
                            <?php
                                if(isset($_GET['DDD_ID']))
                                {
                                        $DDD_ID=$_GET['DDD_ID'];
                                        $con=mysqli_connect('localhost','root','','samaj_db');
                                        $del=mysqli_query($con,"DELETE FROM DONATION_DISTRIBUTE_DETAILS WHERE DDD_ID='$DDD_ID'");
                                        if($del==TRUE)
                                        {
                                            echo "<script>alert('Record Are Delete')</script>";
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