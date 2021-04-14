<?php
        $con=mysqli_connect("localhost","root","","samaj_db");
        $output='';
        if(isset($_POST['query']))
        {
            $search=$_POST['query'];
            $stmt=$con->prepare("SELECT * FROM installment_view WHERE LID_ID LIKE CONCAT('%',?,'%') OR memname LIKE CONCAT('%',?,'%')");
            $stmt->bind_param("ss",$search,$search);
        }
        else
        {
            $stmt=$con->prepare("SELECT * FROM installment_view");
        }
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0)
        {
            $output = "<thead>
            <tr>
                        <th>LID_ID</th>
                        <th>LA_ID</th>
                        <th>MEM_NAME</th>
                        <th>INSTALLMENT_DATE</th>
                        <th>INSTALLMENT_AMOUNT</th>
                        <th>TOTAL</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
            </tr>
            </thead>
            <tbody>";
            while($row=$result->fetch_assoc())
            {
                $output.="<tr>
                <td>".$row['LID_ID']."</td>
                <td>".$row['laid']."</td>
                <td>".$row['memname']."</td>
                <td>".$row['INSTALLMENT_DATE']."</td>
                <td>".$row['INSTALLMENT_AMOUNT']."</td>
                <td>".$row['TOTAL']."</td>
                <td><a href='Loaninstallmentupdate.php?LID_ID=".$row['LID_ID']."'><img src='../am/pencil.png' width='30px' height='40px'></a></td>
                <td><a href='Loaninstallmentdelete.php?LID_ID=".$row['LID_ID']."'><img src='../am/delete.png' width='30px' height='40px'></a></td>
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