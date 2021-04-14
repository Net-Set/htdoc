<html>
        <head>
                <title>Delete the Record </title>
        </head>
        <body>
                <form>
                            <?php
                                if(isset($_GET['MMD_ID']))
                                {
                                        $MMD_ID=$_GET['MMD_ID'];
                                        $con=mysqli_connect('localhost','root','','samaj_db');
                                        $del=mysqli_query($con,"DELETE FROM MARRAIGE_MEMBER_DETAILS WHERE MMD_ID='$MMD_ID'");
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