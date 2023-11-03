<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];
// echo "from backend";
    //insert new Menu
    if(isset($_POST['bankname']) && isset($_POST['AccountName']) && isset($_POST['AccountNo']) &&
     isset($_POST['AccountIFSC']) && isset($_POST['AccountBranchName']) && isset($_POST['AccountBranchAddress']) )
{

    $inseruser="INSERT INTO `bankmaster`(`BankName`, `AcName`, `AcNo`, `IFSC`, `BranchName`, `BranchAddress`,`CreatedBy`) 
    VALUES ('$bankname','$AccountName','$AccountNo','$AccountIFSC','$AccountBranchName','$AccountBranchAddress','$loginuserid')";


            //echo $ledgerquery;
            if(mysqli_query($con,$inseruser))
            {			

            $output="Done";

            }
            echo $output;
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


if (isset($_POST['updateid']))
	{


		$itemid=$_POST['updateid'];
		$selectquery="SELECT * FROM `bankmaster` where `id`='$itemid'";

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
		  $sql="UPDATE `bankmaster` SET `Status`='1' WHERE id='$deleteid' ";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}
?>