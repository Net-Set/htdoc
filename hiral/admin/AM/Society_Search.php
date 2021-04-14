<?php
        $con=mysqli_connect("localhost","root","","samaj_db");
        $output='';
        if(isset($_POST['query']))
        {
            $search=$_POST['query'];
            $stmt=$con->prepare("SELECT * FROM credit_view WHERE CSM_ID LIKE CONCAT('%',?,'%') OR memname LIKE CONCAT('%',?,'%')");
            $stmt->bind_param("ss",$search,$search);
        }
        else
        {
            $stmt=$con->prepare("SELECT * FROM credit_view");
        }
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            $output = "<thead>
            <tr>
                        <th>CSM_ID</th>
                        <th>MEM_NAME</th>
                        <th>JOIN_DATE</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
            </tr>
            </thead>
            <tbody>";
            while($row=$result->fetch_assoc())
            {
                $output.="<tr>
                <td>".$row['CSM_ID']."</td>
                <td>".$row['memname']."</td>
                <td>".$row['JOIN_DATE']."</td>
                <td><a href='cupdate.php?CSM_ID=".$row['CSM_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a></td>
                <td><a href='cdelete.php?CSM_ID=".$row['CSM_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a></td>
    </tr>";
            }
            $output.="</table>";
            echo $output;
        }
        else
        {
            echo "<h3> No  Record Found</h3>";
        }
?>