<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['catename']) && isset($_POST['catedisc']) )
{

$checksql="SELECT * FROM `categorymaster` WHERE `CategoryName`='$catename'";

	$checkres=mysqli_query($con,$checksql);
	$output="";
	if(mysqli_num_rows($checkres)==0)
	{
		$inseruser="INSERT INTO `categorymaster`(`CategoryName`,`Disc`,`CreateBy`) VALUES ('$catename','$catedisc','$loginuserid')";


		echo $inseruser;
		if(mysqli_query($con,$inseruser))
		{			

		$output="Done";

		}
		
	}else
	{
		$output="Exist";
	}
  
    echo $output;

}


//update party data
if(isset($_POST['hidden_id']) && isset($_POST['upcatname']) && isset($_POST['upcatedisc']))
{
   $updatecomponentquery="UPDATE `categorymaster` SET `CategoryName`='$upcatname',`Disc`='$upcatedisc' WHERE CategoryId='$hidden_id'";
			 echo $updatecomponentquery;
				if(mysqli_query($con,$updatecomponentquery))
				{
					$output="updated";
				}
                echo $output;
}


if (isset($_POST['updateid']))
	{


		$itemid=$_POST['updateid'];
		$selectquery="SELECT * FROM `categorymaster` where `CategoryId`='$itemid'";

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
		  $sql="UPDATE `categorymaster` SET `status`='1' WHERE CategoryId='$deleteid' ";
		  echo($sql);
		  mysqli_query($con,$sql);

		}
?>