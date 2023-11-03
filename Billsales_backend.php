<?php
session_start();
error_reporting(0);
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

		if(isset($_POST['Billno']))
		{
            $_SESSION['BillNO']=$Billno;
            if( $_SESSION['BillNO']!="")
            {
                echo "SET";
            }else
            {
                echo "ERROR";
            }

		}
		


        	// 	///delete data
	// if(isset($_POST['deleteid']))
	// 	{
	// 			$deleteid=$_POST['deleteid'];
	// 	//   $sql="DELETE FROM `unitmaster` WHERE UnitID='$deleteid' ";
	// 	  $sql="UPDATE `bankmaster` SET `Status`='1' WHERE id='$deleteid' ";
	// 	  //echo($sql);
	// 	  mysqli_query($con,$sql);

	// 	}


?>