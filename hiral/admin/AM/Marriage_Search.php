<?php
        $con=mysqli_connect("localhost","root","","samaj_db");
        $output='';
        if(isset($_POST['query']))
        {
            $search=$_POST['query'];
            $stmt=$con->prepare("SELECT * FROM marraige_VIEW WHERE MMD_ID LIKE CONCAT('%',?,'%') OR memname LIKE CONCAT('%',?,'%')");
            $stmt->bind_param("ss",$search,$search);
        }
        else
        {
            $stmt=$con->prepare("SELECT * FROM marraige_VIEW");
        }
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            $output = "<thead>
            <tr>
                        <th>MMD_ID</th>
                        <th>MEM_NAME</th>
                        <th>EVENT_NAME</th>
                        <th>REGISTRATION_DATE</th>
                        <th>STATUS</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
            </tr>
            </thead>
            <tbody>";
            while($row=$result->fetch_assoc())
            {
                $output.="<tr>
                <td>".$row['MMD_ID']."</td>
                <td>".$row['memname']."</td>
                <td>".$row['eventname']."</td>
                <td>".$row['REGISTRATION_DATE']."</td>
                <td>".$row['STATUS']."</td>
                <td><a href='Marriageupdate.php?MMD_ID=".$row['MMD_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a></td>
                <td><a href='Marriagememberdelete.php?MMD_ID=".$row['MMD_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a></td>
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