<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];
    
// echo "Backend calling";
    //insert new Menu
    if(isset($_POST['firmname']) && isset($_POST['firmaddress']) && isset($_POST['firmdisc']) && 
	isset($_POST['firmno']) && isset($_POST['firmemail']) && isset($_POST['firmgst'])&& isset($_POST['firmpan'])&& isset($_POST['prifix']))
{

    $insetitemsql="INSERT INTO `firmmaster`(`FirmName`, `FirmType`, `FirmAddress`, `FirmDisc`, `FirmNo`, `FirmEmail`, `FirmGst`, `FirmTin`, `FirmPAN`,`prefix`) 
                                    VALUES ('$firmname','GST','$firmaddress','$firmdisc','$firmno','$firmemail','$firmgst','','$firmpan','$prifix')";

        echo $insetitemsql;

            if(mysqli_query($con,$insetitemsql))
            {			

            $output="Done";

            }
            echo $output;
    // }

}


if (isset($_POST['updateid']))
	{


		$itemid=$_POST['updateid'];
		$selectquery="SELECT * FROM `itemmaster` where `ItemId `='$itemid'";

		$result=mysqli_query($con,$selectquery);
		$responce=array();

            if(mysqli_num_rows($result)>0)
            {

                while ($row=mysqli_fetch_assoc($result))
                {
                    $responce =$row;
                }
            }
            else
            {
                        $responce['status']=200;
                        $responce['message']="No Record Found";

            }
			echo json_encode($responce);
		}
else
	{
			            $responce['status']=200;
						$responce['message']="Invalid Request";
	}



?>