<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['unitname']))
{
	$checksql="SELECT * FROM `unitmaster` WHERE `UnitName`='$unitname'";

	$checkres=mysqli_query($con,$checksql);
	$output="";
	if(mysqli_num_rows($checkres)==0)
	{
		$inseruser="INSERT INTO `unitmaster`(`UnitName`, `CreatedBy`,`Satus`) VALUES ('$unitname','$loginuserid','0')";

		$output="";
				// echo $inseruser; 
				if(mysqli_query($con,$inseruser))
				{			
	
				$output="Done";
	
				}
				
	}
	else
	{
		$output="Exist";
	}

	echo $output;
    // }

}



//getting unit data by ID

if (isset($_POST['updateid']))
	{


		$itemid=$_POST['updateid'];
		$selectquery="SELECT * FROM `unitmaster` where `UnitID`='$itemid'";

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

// updating unit data
if(isset($_POST['hidden_id']) && isset($_POST['upcatename']))
{
   $updatecomponentquery="UPDATE `unitmaster` SET `UnitName`='$upcatename' WHERE UnitID='$hidden_id' ";
			//  echo $updatecomponentquery;
				if(mysqli_query($con,$updatecomponentquery))
				{
					$output="updated";
				}
                echo $output;
}



		///delete data
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		//   $sql="DELETE FROM `unitmaster` WHERE UnitID='$deleteid' ";
		  $sql="UPDATE `unitmaster` SET `Satus`='1' WHERE UnitID='$deleteid' ";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}



?>