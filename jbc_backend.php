<?php
session_start();
// error_reporting(0);
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['openpoid']) && isset($_POST['jobcdate']))
{
  
        $insertstocksql="INSERT INTO `jobcardmaster`(`jobcarddate`,`jbcstatus`,`poline`) VALUES ('$jobcdate','OPEN','$openpoid')";
 
        if(mysqli_query($con,$insertstocksql))
        {			
			$last_id = mysqli_insert_id($con);
			updatejobcardno($con,$last_id);
			updateopenpostatustoone($con,$openpoid);

        	$output="done";


        }
    }



//update party data
    if(isset($_POST['jobcardnumber']) && isset($_POST['invo']))
{
   $updatelegerrecord="UPDATE `jobcardmaster` SET `jbcstatus`='Complete',`jbcinvno`='$invo' WHERE `jobcardid`='$jobcardnumber'";
			///echo $insertsql;
				if(mysqli_query($con,$updatelegerrecord))
				{
					$output="updated";
				
				}
                echo $output;
}

    if(isset($_POST['jobcardnumberforlot']) && isset($_POST['lotno']))
{
   $updatelegerrecord="UPDATE `jobcardmaster` SET `jbcstatus`='Production',`lotno`='$lotno' WHERE `jobcardid`='$jobcardnumberforlot'";
			// echo $updatelegerrecord;
				if(mysqli_query($con,$updatelegerrecord))
				{
					$output="updated";
				
				}
                echo $output;
}




		///delete data
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="DELETE FROM `itemmaster` WHERE itemid='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}





if (isset($_POST['updateid']))
	{


		$itemid=$_POST['updateid'];
		$selectquery="SELECT * FROM `itemmaster` where `itemid`='$itemid'";

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


		if (isset($_POST['fpartyid']))
		{
			$sql="SELECT * FROM `partydata` WHERE id='$fpartyid'";
			// echo $sql;
			$result=mysqli_query($con, $sql);
			$address="ee";
			if($row = mysqli_fetch_assoc($result))
			{
				$address=$row['address'];
			}
			echo $address;
		}

		if (isset($_POST['partylegderid']))
		{
			$sql="SELECT * FROM `ledgermaster` WHERE `ledgerid`='$partylegderid'";
			//  echo $sql;
			$result=mysqli_query($con, $sql);
			 $openingbalance=00;
			if($row = mysqli_fetch_assoc($result))
			{
				$openingbalance=$row['openingbalance'];
			}
			echo $openingbalance;
		}

?>