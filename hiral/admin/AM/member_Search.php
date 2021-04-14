<?php
        $con=mysqli_connect("localhost","root","","samaj_db");
        $output='';
        if(isset($_POST['query']))
        {
            $search=$_POST['query'];
            $stmt=$con->prepare("SELECT * FROM member_view WHERE MEM_ID LIKE CONCAT('%',?,'%') OR MEM_NAME LIKE CONCAT('%',?,'%')");
            $stmt->bind_param("ss",$search,$search);
        }
        else
        {
            $stmt=$con->prepare("SELECT * FROM member_view");
        }
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            $output = "<thead>
            <tr>
                        <th>MEM_ID</th>
                        <th>MEM_NAME</th>
                        <th>ADDRESS</th>
                        <th>PINCODE</th>
                        <th>JOIN_DATE</th>
                        <th>DATE_OF_BORTH</th>
                        <th>CONTECT_NO</th>
                        <th>EDUCATION</th>
                        <th>GENDER</th>
                        <th>EMAIL</th>
                        <th>BLOODGROUP</th>
                        <th>TOTALINCOME</th>
                        <th>TRIBE</th>
                        <th>AADHARCARDNO</th>
                        <th>MEM_RELATION</th>    
                        <th>PARENT_ID</th> 
                        <th>IMAGES</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
            </tr>
            </thead>
            <tbody>";
            while($row=$result->fetch_assoc())
            {
                $output.="<tr>
                <td>".$row['MEM_ID']."</td>
                <td>".$row['MEM_NAME']."</td>
                <td>".$row['ADDRESS']."</td>
                <td>".$row['PINCODE']."</td>
                <td>".$row['JOIN_DATE']."</td>
                <td>".$row['D_O_B']."</td>
                <td>".$row['CONTECT_NO']."</td>
                <td>".$row['EDUCATION']."</td>
                <td>".$row['GENDER']."</td>
                <td>".$row['EMAIL']."</td>
                <td>".$row['BLOOD_GROUP']."</td>
                <td>".$row['TOTAL_INCOME_OF_YEAR']."</td>
                <td>".$row['TRIBE']."</td>
                <td>".$row['AADHAR_CARD_NO']."</td>
                <td>".$row['MEM_RELATION']."</td>
                <td>".$row['parentname']."</td>
                <td><a href='$row[IMAGES]'><img src='".$row['IMAGES']."' height='100' width='100'/></a></td>
                <td><a href='update.php?MEM_ID=".$row['MEM_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a></td>
                <td><a href='delete.php?MEM_ID=".$row['MEM_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a></td>
        
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