<?php
        $con=mysqli_connect("localhost","root","","samaj_db");
        $output='';
        if(isset($_POST['query']))
        {
            $search=$_POST['query'];
            $stmt=$con->prepare("SELECT * FROM event_details WHERE EVENT_ID LIKE CONCAT('%',?,'%') OR EVENT_NAME LIKE CONCAT('%',?,'%')");
            $stmt->bind_param("ss",$search,$search);
        }
        else
        {
            $stmt=$con->prepare("SELECT * FROM event_details");
        }
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            $output = "<thead>
            <tr>
                          <th>EVENT_ID</th>
                          <th>EVENT_NAME</th>
                          <th>EVENT_PLACE</th>
                          <th>EVENT_DATE</th>
                          <th>EVENT_TIME</th>
                          <th>EDIT</th>
                          <th>DELETE</th>
            </tr>
            </thead>
            <tbody>";
            while($row=$result->fetch_assoc())
            {
                $output.="<tr>
                <td>".$row['EVENT_ID']."</td>
                <td>".$row['EVENT_NAME']."</td>
                <td>".$row['EVENT_PLACE']."</td>
                <td>".$row['EVENT_DATE']."</td>
                <td>".$row['EVENT_TIME']."</td>
                <td><a href='eupdate.php?EVENT_ID=".$row['EVENT_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a></td>
                <td><a href='eventdelete.php?EVENT_ID=".$row['EVENT_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a></td>
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