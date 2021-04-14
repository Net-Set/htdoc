<html>  
        <head>
                <title>View of Fees </title>
        </head>
        <body>
                <form>
                            <?php
                                    if(isset($_GET['FT_ID']))
                                    {
                                        $FT_ID=$_GET['FT_ID'];
                                        $con=mysqli_connect('localhost','root','','samaj_db');
                                        $qr=mysqli_query($con,"DELETE FROM `fees_type_master` WHERE FT_ID='$FT_ID'");
                                        if($qr==TRUE)
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