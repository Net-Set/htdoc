<html>
        <head>
                    <title></title>
        </head>
        <body>
                <form>
                            <?php
                                    if(isset($_GET['FUND_ID']))
                                    {
                                        $FUND_ID=$_GET['FUND_ID'];
                                        $con=mysqli_connect('localhost','root','','samaj_db');
                                        $qr=mysqli_query($con,"DELETE  FROM FUND_DEPOSIT WHERE FUND_ID='$FUND_ID'");
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