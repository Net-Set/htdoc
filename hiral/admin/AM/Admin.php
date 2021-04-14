<html>
    <head>
            <title>Login Form</title>
            <link rel="stylesheet" href="Admin.css">
    </head>
    <body>
            <table border="3" width="2000" bgcolor="lime">
                <tr><td><marquee scrollbars="5"><b>WELCOME TO SHREE PADMASHALI SAMAJ GUJARAT</b></marquee></td></tr>
                </table>
            <form class="admin" action="" method="POST">
            <h1>ADMIN</h1>
            <input type="text" class="email" name="Email" placeholder="USERNAME">
            <input type="password" class="password" name="Password" placeholder="Password">
            <input type="Submit" class="Submit" value="Login">
            <?php
                    session_start();
                    $con=mysqli_connect('localhost','root','','institute_db_ok');
                    if(isset($_POST['Email']))
                    {
                        $uname=$_POST['Email'];
                        $pwd=$_POST['Password'];
                        $sql="select * from admin where Email='$uname' and Password='$pwd'";
                        $rs=mysqli_query($con,$sql);
                        if(mysqli_num_rows($rs) > 0)
                        {
                        $row = mysqli_fetch_assoc($rs);
                        $_SESSION['Email']=$row['Email'];
                        $_SESSION['Password']=$row['Password'];

                            header("Location:header.php");
                        }
                        else
                        {
                            echo "Invalid username or Password..";
                        }
                        
                    }
?>

</form>
    </body>
</html>