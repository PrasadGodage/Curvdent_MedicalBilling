<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];
// echo "from backend";
    //insert new Menu
    if(isset($_POST['custname']) && isset($_POST['address']) && isset($_POST['mob']) &&
     isset($_POST['pan']) && isset($_POST['adhar']) && isset($_POST['disc']) )
{
	$checksql="SELECT * FROM `customermaster` WHERE `CustName`='$custname' AND `Mobile`='$mob' AND `PAN`='$pan'";
    $custno=0000;
    $LedgerId=1;
	$checkres=mysqli_query($con,$checksql);
	$output="";
		if(mysqli_num_rows($checkres)==0)
		{
			$inseruser="INSERT INTO `customermaster`(`CustNo`, `CustName`, `Address`, `Mobile`, `PAN`, `Aadhar`, `Description`, `LedgerId`) VALUES
			('$custno','$custname','$address','$mob','$pan','$adhar','$disc','$LedgerId')";
	 
	 
				 //echo $ledgerquery;
				 if(mysqli_query($con,$inseruser))
				 {			
	 
				 $output="Done";
	 
				 }
				

		}
		else
		{
			
		}

		echo $output;
    // }

}


//update party data
if(isset($_POST['hidden_id']) && isset($_POST['upcustname']) && isset($_POST['upaddress']) && isset($_POST['upmob']) &&
isset($_POST['uppan']) && isset($_POST['upadhar']) && isset($_POST['updisc']) )
{
    $custno=0000;
    $LedgerId=1;
   $updatecomponentquery="UPDATE `customermaster` SET `CustNo`='$custno',`CustName`='$upcustname',`Address`='$upaddress',`Mobile`='$upmob',`PAN`='$uppan',`Aadhar`='$upadhar',`Description`='$updisc',`LedgerId`='$LedgerId' WHERE `CustId`='$hidden_id'";
			//  echo $updatecomponentquery;
				if(mysqli_query($con,$updatecomponentquery))
				{
					$output="updated";
				}
                echo $output;
}


if (isset($_POST['updateid']))
	{


		$itemid=$_POST['updateid'];
		$selectquery="SELECT * FROM `customermaster` where `CustId`='$itemid'";

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
	if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		//   $sql="DELETE FROM `unitmaster` WHERE UnitID='$deleteid' ";
		  $sql="UPDATE `customermaster` SET `Status`='1' WHERE CustId='$deleteid' ";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}
?>