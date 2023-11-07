<?php
session_start();
error_reporting(1);
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];
// echo "from backend";
    //insert new Menu
    if(isset($_POST['BillNO']) && isset($_POST['ItemID']) && isset($_POST['ItemDisc']) &&
     isset($_POST['UnitID']) && isset($_POST['Qty']) && isset($_POST['Rate']) &&
     isset($_POST['ItemTotal']) && isset($_POST['DiscountPercentage']) && isset($_POST['DiscountAmount']) &&
     isset($_POST['TaxableAmount'])&& isset($_POST['CgstPercetage']) && isset($_POST['CgstAmt']) && 
	 isset($_POST['SgstPercentage'])&& isset($_POST['SgstAmt']) && isset($_POST['TaxAmount']) && isset($_POST['NetAmount']) )
{
	
	// $output='';

	$checksql="SELECT * FROM `tempsalesdetails` WHERE `BillId`='$BillNO' AND `ItemId`='$ItemID'";
	// echo $checksql;
	$checkres=mysqli_query($con,$checksql);
	if(mysqli_num_rows($checkres)>0)
	{
			// echo "Error to fouind please Add new";
			$$updatetotal="UPDATE `tempsalesdetails` SET `Qty`=`Qty`+'$Qty',`ItemTotal`=`ItemTotal`+'$ItemTotal',`TaxableAmt`=`TaxableAmt`+'$TaxableAmount',`TaxAmt1`=`TaxAmt1`+'$CgstAmt',`TaxAmt2`=`TaxAmt2`+'$SgstAmt',`TotalTax`=`TotalTax`+'$TaxAmount',`NetAmt`=`NetAmt`+'$NetAmount' WHERE `BillId`='$BillNO' AND `ItemId`='$ItemID'";
            // echo $$updatetotal;
            if(mysqli_query($con,$$updatetotal))
            {			
            	$output="updated";
            }

            echo $output;

	}else{
			// echo "Error to fouind please Add new";
			  $Insertitemtodb="INSERT INTO `tempsalesdetails`(`BillId`, `ItemId`, `ItemDescription`, `UnitId`, `Qty`, `Rate`, `ItemTotal`, `DiscPer`, `DiscAmt`,`TaxableAmt`, `TaxPer1`, `TaxAmt1`, `TaxPer2`, `TaxAmt2`, `TotalTax`, `NetAmt`)VALUES ('$BillNO','$ItemID','$ItemDisc','$UnitID','$Qty','$Rate','$ItemTotal','$DiscountPercentage','$DiscountAmount','$TaxableAmount','$CgstPercetage','$CgstAmt','$SgstPercentage','$SgstAmt','$TaxAmount','$NetAmount')";
            // echo $Insertitemtodb;
            if(mysqli_query($con,$Insertitemtodb))
            {			
            	$output="Done";
            }

            echo $output;

	}


}
// echo "Inside backend";

    if(isset($_POST['TEMPBillNo']) && isset($_POST['BillDate']) && isset($_POST['customerid']) && isset($_POST['paymentType']) && 
	 isset($_POST['SubPaymentType']) && isset($_POST['AccountName']) && isset($_POST['TotalItemAmt']) && isset($_POST['TotalDiscAmt'])&&
     isset($_POST['TotalTaxAbleAmt']) && isset($_POST['TotalTax']) && isset($_POST['NetTotal']) && isset($_POST['RoundOff'])&&
     isset($_POST['NetBillTotal'])&& isset($_POST['BillCharges']) && isset($_POST['ExtraBilldiscount'])&& isset($_POST['BillAmountForPaid']))
{
	
	// && isset($_POST['PaidAmount']) && isset($_POST['BalanceAmount'])
	$totalQty="0";

    $Insertitemtodb="INSERT INTO `sales`(`BillDate`, `CustId`,`PaymentType`,`SubPaymentType`,`AccountName`,`TotItemAmt`, `TotDiscAmt`, `TaxableTotal`, `TotalTax`,`NetTotal`, `RoundOff`, `NetBillTotal`, `ExtraBillCharges`, `ExtraBillDiscount`, `BillAmtForPaid`, `PaidAmt`, `BalanceAmt`)
								 VALUES ('$BillDate','$customerid','$paymentType','$SubPaymentType','$AccountName','$TotalItemAmt','$TotalDiscAmt','$TotalTaxAbleAmt','$TotalTax','$NetTotal','$RoundOff','$NetBillTotal','$BillCharges','$ExtraBilldiscount','$BillAmountForPaid','$PaidAmount','$BalanceAmount')";

	$output='';
            echo $Insertitemtodb;
            if(mysqli_query($con,$Insertitemtodb))
            {			
				$last_inserted_id = mysqli_insert_id($con);
				$FinalBillNO=generateBillNumber($con,$last_inserted_id);
				$_SESSION['BillNO']=$FinalBillNO;
				SetBillNoToBill($con,$FinalBillNO,$last_inserted_id);
				ConvertTempsalesBillToSalesDtls($con,$TEMPBillNo,$last_inserted_id);
            	$output="Done";
            }
            echo $FinalBillNO;
    // }

}


//update party data
if(isset($_POST['hidden_id']) && isset($_POST['upbankname']) && isset($_POST['upAccountName']) && isset($_POST['upAccountNo']) 
&& isset($_POST['upAccountIFSC']) && isset($_POST['upAccountBranchName']) && isset($_POST['upAccountBranchAddress']) )
{
   $updatecomponentquery="UPDATE `bankmaster` SET `BankName`='$upbankname',`AcName`='$upAccountName',`AcNo`='$upAccountNo',`IFSC`='$upAccountIFSC',`BranchName`='$upAccountBranchName',`BranchAddress`='$upAccountBranchAddress' WHERE `id`='$hidden_id'";
			//  echo $updatecomponentquery;
				if(mysqli_query($con,$updatecomponentquery))
				{
					$output="updated";
				}
                echo $output;
}


if (isset($_POST['itemid']) && isset($_POST['getdata']))
	{


		$itemid=$_POST['itemid'];
		$selectquery="SELECT * FROM `itemmaster` where `ItemId`='$itemid'";

		$result=mysqli_query($con, $selectquery);

		$responce=array();

		if(mysqli_num_rows($result)>0)
		{

			while ($row=mysqli_fetch_assoc($result))
			{
				$responce =$row;
			}
		}else
		{
					$responce['status']=200;
					$responce['message']="No Record Found";

		}
			echo json_encode($responce);
		}else
		{
			            $responce['status']=200;
						$responce['message']="Invalid Request";
		}

		///delete data
	if(isset($_POST['salesdeleteid']))
		{
				$salesdeleteid=$_POST['salesdeleteid'];
		
		  deletesalesdtls($con,$salesdeleteid);
		  deletesales($con,$salesdeleteid);

		}



		if(isset($_POST['readrecord']) && isset($_POST['BillNO']))
		{
			

			// $selectmenulist="SELECT * FROM `tempsalesdetails` where BillId='$BillNO'";
			$selectmenulist="SELECT * FROM `tempsalesdetails` where BillId='$BillNO'";
			echo $selectmenulist;

			$res=mysqli_query($con,$selectmenulist);
			$output="";
			if(mysqli_num_rows($res)>0)
			{
			$num=1;
					while($row=mysqli_fetch_array($res))
			{
				$output.="<tr>
					<td>".$num."</td>
					   <td>".getitemnamebyID($con,$row['ItemId'])."<br><small>".$row['ItemDescription']."</small></td>				 
					<td>".$row['Qty']." ".getunitnamebyID($con,$row['UnitId'])."</td>
					<td>".$row['Rate']."</td>
					<td>".$row['ItemTotal']."</td>					
					<td>".$row['DiscAmt']."</td>
					<td>".$row['TaxableAmt']."</td>
					<td>".$row['TaxAmt1']." / ".$row['TaxAmt1']."</td>				
					<td>".$row['NetAmt']."</td>                                         
					<td>
						<button class='mt-1 btn btn-danger' onclick='deletedata(".$row['id'].")'>X</button>
					</td>
					</tr>";
				// <?php 
				$num++;
			}
			}else{
				$output= "<tr>
					<td colspan='12' align='center'>No Items in this Bill</td>
			</tr>";
			}

			echo $output;

			
		}
		// <td>".$row['DiscPer']."</td>
		// <td>".$row['TotalTax']."</td>
		if(isset($_POST['subtotal']) && isset($_POST['subBillNO']))
		{
			$selectmenulist="SELECT * FROM `tempsalesdetails` where BillId='$subBillNO'";
			$res=mysqli_query($con,$selectmenulist);
			$subtotal=0;
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_array($res))
				{
					$subtotal=$subtotal+$row['ItemTotal'];
				}
			}
			else
			{
				$subtotal=0;
			}
			echo $subtotal;			
		}

		if(isset($_POST['TaxBillNO']) && isset($_POST['taxableAmount']))
		{
			$selectmenulist="SELECT * FROM `tempsalesdetails` where BillId='$TaxBillNO'";
			$res=mysqli_query($con,$selectmenulist);
			$TaxableAmt=0;
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_array($res))
				{
					$TaxableAmt=$TaxableAmt+$row['TaxableAmt'];
				}
			}
			else
			{
				$TaxableAmt=0;
			}
			echo $TaxableAmt;			
		}
		if(isset($_POST['GstBillNO']) && isset($_POST['TaxAmt']))
		{
			$selectmenulist="SELECT * FROM `tempsalesdetails` where BillId='$GstBillNO'";
			$res=mysqli_query($con,$selectmenulist);
			$GSTAMT=0;
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_array($res))
				{
					$GSTAMT=$GSTAMT+$row['TotalTax'];
				}
			}
			else
			{
				$GSTAMT=0;
			}
			echo $GSTAMT;			
		}

		///delete data
		if(isset($_POST['deleteID']))
		{
				$deleteID=$_POST['deleteID'];
			$sql="DELETE FROM `tempsalesdetails` WHERE id='$deleteID'";
			//echo($sql);
			mysqli_query($con,$sql);

		}
		
?>