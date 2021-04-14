<html>
        <head>
                    <title>Delete Event Delete </title> 
        </head> 
        <body>
                <form>
                        <?php

                            if(isset($_GET['EVENT_ID']))
                            {
                                $EVENT_ID=$_GET['EVENT_ID'];
                                $con=mysqli_connect('localhost','root','','samaj_db');
                                $qr=mysqli_query($con,"DELETE FROM EVENT_DETAILS WHERE EVENT_ID='$EVENT_ID'");
                                if($qr==TRUE)
                                {
                                    echo"<script>alert('Record Deleted')</script>";
                                }
                                else
                                {
                                    echo"<script>alert('Record Does Not Delete')</script>";
                                }
                            }
                            ?>
                </form>
        </body>
</html>