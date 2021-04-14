<?php
        $con=mysqli_connect("localhost","root","","samaj_db");
        $output='';
        if(isset($_POST['query']))
        {
            $search=$_POST['query'];
            $stmt=$con->prepare("SELECT * FROM LOAN_view WHERE LD_ID LIKE CONCAT('%',?,'%') OR memname LIKE CONCAT('%',?,'%')");
            $stmt->bind_param("ss",$search,$search);
        }
        else
        {
            $stmt=$con->prepare("SELECT * FROM LOAN_view");
        }
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            $output = "<thead>
            <tr>
                        <th>LD_ID</th>
                        <th>MEM_NAME</th>
                        <th>LOAN_APPLY_DATE</th>
                        <th>LOAN_AMOUNT</th>
                        <th>LOAN_PURPOSE</th>
                        <th>APPROVEL STATUS</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
            </tr>
            </thead>
            <tbody>";
            while($row=$result->fetch_assoc())
            {
                $output.="<tr>
                <td>".$row['LD_ID']."</td>
                <td>".$row['memname']."</td>
                <td>".$row['LOAN_APPLY_DATE']."</td>
                <td>".$row['LOAN_AMOUNT']."</td>
                <td>".$row['LOAN_PURPRSE']."</td>
                <td><a href='loupdate.php?LD_ID=".$row['LD_ID']."'>Status</a></td>
                <td><a href='loan_update.php?LD_ID=".$row['LD_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a></td>
                <td><a href='loanrecorddelete.php?LD_ID=".$row['LD_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a></td>
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