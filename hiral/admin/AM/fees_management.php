<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1>Member Fees </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Member Fees</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Member Fees</h3>
              </div>            
              <!-- /.card-header -->
              <!-- form start -->
<?php
//session_start();
require_once("config.php");

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding product in cart
	case "add":
		if(!empty($_POST["QTY"])) {
			$FEESTYPE_NAME=$_GET["FEESTYPE_NAME"];
			$result=mysqli_query($con,"SELECT * FROM fees_type_master WHERE FEESTYPE_NAME='$FEESTYPE_NAME'");
	          while($feesid=mysqli_fetch_array($result)){
			$itemArray = array($feesid["FEESTYPE_NAME"]=>array('FT_ID'=>$feesid["FT_ID"],'FEESTYPE_NAME'=>$feesid["FEESTYPE_NAME"], 'QTY'=>$_POST["QTY"],'AMOUNT'=>$feesid["AMOUNT"],'DURATION'=>$feesid["DURATION"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($feesid["FEESTYPE_NAME"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($feesid["FEESTYPE_NAME"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["QTY"])) {
									$_SESSION["cart_item"][$k]["QTY"] = 0;
								}
								$_SESSION["cart_item"][$k]["QTY"] += $_POST["QTY"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			}  else {
				$_SESSION["cart_item"] = $itemArray;
			}
        }
    }
    break;
    
        // code for removing product from cart
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["FEESTYPE_NAME"] == $k)
                            unset($_SESSION["cart_item"][$k]);				
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                }
            }
        break;
        // code for if cart is empty
        case "empty":
            unset($_SESSION["cart_item"]);
        break;	
    }
    }
    ?>
<!-- Cart ---->
<div id="shopping-cart">
<a id="btnEmpty" href="fees_management.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"]))
{
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:center;">FT_ID</th>
<th style="text-align:center;">Name</th>
<th style="text-align:center;" width="10%">Quantity</th>
<th style="text-align:center;" width="15%">Amount</th>
<th style="text-align:center;" width="20%">Duration</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>
<?php		
    foreach ($_SESSION["cart_item"] as $item)
    {
        $item_price = $item["QTY"]*$item["AMOUNT"];
		?>
				<tr>
				<td  style="text-align:center;"><?php echo $item["FT_ID"]; ?></td>
				<td  style="text-align:center;"><?php echo $item["FEESTYPE_NAME"]; ?></td>
				<td  style="text-align:center;"><?php echo $item["QTY"]; ?></td>
				<td  style="text-align:center;"><?php echo "Rs.". number_format($item_price,2);?></td>
                <td  style="text-align:center;"><?php echo $item["DURATION"]; ?></td>
				<td  style="text-align:center;"><a href="fees_management.php?action=remove&FEESTYPE_NAME=<?php echo $item["FEESTYPE_NAME"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["QTY"];
				$total_price += ($item["AMOUNT"]*$item["QTY"]);
        }
        $_SESSION["totalprice"]=$total_price;
		?>
<tr>
<td colspan="2" align="right">Total:</td>
<td align="center"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "Rs. ".number_format($total_price, 2); ?></strong></td>
</tr>
</tbody>
</table>		
  <?php
} else {
  //echo "<script>alert('Fees Cart Can Not Empty')</script>";
?>
<div class="no-records">Your Fees Cart is Empty</div>
<?php 
}
?>
<script>
          function validation()
          {
             var date = document.getElementById("join").value;
             //var Qty = document.getElementById("qty").value;
             if(date=="")
             {
               alert("Please Enter Fees Pay Date");
               return false;
             }
    
          }
</script>
<form action="fees_management.php" method="post" onsubmit="return validation()">
<div class="product-title" style="text-align:left;">
                <label>MEMBER ID</label>
                <?php
                     $con=mysqli_connect('localhost','root','','samaj_db');
                     $rs=mysqli_query($con,"SELECT `MEM_ID`,concat(convert(`MEM_ID`, char),\"-\", `MEM_NAME`) as member FROM `member_management`");
                 ?>
                 <select name="member"> 
                 <option value=0>--select--</option>
                  <?php
                   while($row=mysqli_fetch_assoc($rs))
                     {
                        echo "<option value='".$row["MEM_ID"]."'>".$row["member"]."</option>";
                     }
                    ?>
                   </select>           
              </div>
			  <div style="text-align:left;" class="product-title">
                    <label>PAY DATE</label>
                    <input type="date" name="pay_date" id="join" placeholder="Enter Join Date">
                  </div>
           <div style="text-align:left;">
             <input type="submit" name="submit" class="btn btn-primary" value="submit"/><br/> 
          </div>
       </form>
</div>
</div>
<div id="product-grid">
	<div class="txt-heading">Fees</div>
	<?php
	$fees= mysqli_query($con,"SELECT * FROM FEES_TYPE_MASTER ORDER BY FT_ID ASC");
	if (!empty($fees)) { 
		while ($row=mysqli_fetch_array($fees)) {
		
	?>
      
		<div class="product-item">
			<form method="post" action="fees_management.php?action=add&FEESTYPE_NAME=<?php echo $row["FEESTYPE_NAME"]; ?>">
			<div class="product-tile-footer">
            <div class="product-title" ><?php echo $row["FEESTYPE_NAME"]; ?></div>
            <div class="product-title"><?php echo $row["DURATION"]; ?></div>
			<div class="product-price"><?php echo "Rs.".$row["AMOUNT"]; ?></div>
            <div class="cart-action"><input type="text" class="product-quantity"  id="qty" name="QTY"  value="1" size="2" /><input type="submit" value="Add to Fees" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}  else {
 echo "No Records.";

    }
	?>	
</div>
<?php
            if(isset($_POST['submit']))
            {
              if(isset($_SESSION["cart_item"]))
              {
                            
              $MEM_ID=$_POST['member'];
              $Pay_Date=$_POST['pay_date'];
              $Total=$_SESSION["totalprice"];
              $con=mysqli_connect('localhost','root','','samaj_db');
              $qr="INSERT INTO `member_fees`(`MEM_ID`, `PAY_DATE`, `TOTAL_AMOUNT`) VALUES ('$MEM_ID','$Pay_Date','$Total')";
              $run=mysqli_query($con,$qr);
              if($run==TRUE)
              {
                    echo "<script>alert('Fees Submited')</script>";
              }
              else
              {
                echo "<script>alert('Fees Not Submited')</script>";
              }
            $rs=mysqli_query($con,"SELECT max(mf_id) as mfid FROM member_fees");
            $row=mysqli_fetch_assoc($rs);
            //echo $row;
            $MF_ID= $row["mfid"];
            foreach($_SESSION["cart_item"] as $k)
            {
                        $Qty=$k["QTY"];      
                        $ftid=$k["FT_ID"];          
                        $qr="INSERT INTO `member_fees_details`(`MF_ID`,`FT_ID`,`QTY`) VALUES ('$MF_ID','$ftid','$Qty')";
                        $run=mysqli_query($con,$qr);
            }
          }
          else {
            echo "<script>alert('Cart is empty')</script>";
            
          }
        }

?>            

            

    