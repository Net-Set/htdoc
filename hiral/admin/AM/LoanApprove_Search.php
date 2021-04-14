<?php
        $con=mysqli_connect("localhost","root","","samaj_db");
        $output='';
        if(isset($_POST['query']))
        {
            $search=$_POST['query'];
            $stmt=$con->prepare("SELECT * FROM LOAN_APPROVAL WHERE LA_ID LIKE CONCAT('%',?,'%') OR LD_ID LIKE CONCAT('%',?,'%')");
            $stmt->bind_param("ss",$search,$search);
        }
        else
        {
            $stmt=$con->prepare("SELECT * FROM LOAN_APPROVAL");
        }
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            $output = "<thead>
            <tr>
                        <th>LA_ID</th>
                        <th>LD_ID</th>
                        <th>APPROVE_AMOUNT</th>
                        <th>LOAN_STATUS</th>
                        <th>APPROVE_DATE</th>
                        <th>INSTALLMENT_AMOUNT</th>
                        <th>NO_OF_INSTALLMENT</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
            </tr>
            </thead>
            <tbody>";
            while($row=$result->fetch_assoc())
            {
                $output.="<tr>
                <td>".$row['LA_ID']."</td>
                <td>".$row['LD_ID']."</td>
                <td>".$row['APROVE_AMOUNT']."</td>
                <td>".$row['LOAN_STATUS']."</td>
                <td>".$row['APPROVAL_DATE']."</td>
                <td>".$row['INSTALLMENT_AMOUNT']."</td>
                <td>".$row['NO_OF_INSTALLMENT']."</td>
                <td><a href='Loanapprovalupdate.php?LA_ID=".$row['LA_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a></td>
                <td><a href='Loanapprovaldelete.php?LA_ID=".$row['LA_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a></td>
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