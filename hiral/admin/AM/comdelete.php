<html>
        <head>
                <title>Delete the Record </title>
        </head>
        <body>
                <form>
                            <?php
                                if(isset($_GET['COMM_ID']))
                                {
                                        $COMM_ID=$_GET['COMM_ID'];
                                        $con=mysqli_connect('localhost','root','','samaj_db');
                                        $del=mysqli_query($con,"DELETE FROM COMMITTEE_MEMBER_DETAILS WHERE COMM_ID='$COMM_ID'");
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