<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['rmcode']) && isset($_POST['rmdate'])&& isset($_POST['rmcategory'])&& isset($_POST['rmdisc'])&& isset($_POST['rmqty'])&& isset($_POST['rmrate'])&& isset($_POST['rmsupplier'])&& isset($_POST['rmunit']))
{
	$target_file="images/noimage.jpg";

    $insertstocksql="INSERT INTO `reciptmaster`(`reciptdate`, `itemcode`, `category`, `reciptdisc`, `qty`, `rate`, `supplier`,`rmunitcode`) 
                                        VALUES ('$rmdate','$rmcode','$rmcategory','$rmdisc','$rmqty','$rmrate','$rmsupplier','$rmunit')";


            echo $insertstocksql;
            if(mysqli_query($con,$insertstocksql))
            {			
            $output="Done";

            }
            echo $output;
    // }

}


if(isset($_POST['jobcardnumberforlot']) && isset($_POST['lotno']))
{
   $updatelegerrecord="UPDATE `reciptmaster` SET `lotno`='$lotno' WHERE `id`='$jobcardnumberforlot'";
			// echo $updatelegerrecord;
				if(mysqli_query($con,$updatelegerrecord))
				{
					$output="updated";

					getreciptdatafortransaction($con,$jobcardnumberforlot);
				
				}
                echo $output;
}




//update party data
    if(isset($_POST['hidden_id']) && isset($_POST['upmenuname']) && isset($_POST['upmenuunit'])&& isset($_POST['upmenurate'])&& isset($_POST['upbehavior'])&& isset($_POST['upmenucategory'])&& isset($_POST['upmakingtime'])&& isset($_POST['updisc']))
{
   $updatelegerrecord="UPDATE `itemmaster` SET `itemname`='$upmenuname',`itemdisc`='$updisc',`unit`='$upmenuunit',`rate`='$upmenurate',`itemcategoryname`='$upmenucategory',`itembehavior`='$upbehavior',`makingtime`='$upmakingtime' WHERE `itemid`='$hidden_id'";
			///echo $insertsql;
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


	if (isset($_POST['rmcodeforrecipt']))
		{
			$sql="SELECT * FROM `gradediameteruniquecode` WHERE uniquecode='$rmcodeforrecipt'";
			// echo $sql;
			$result=mysqli_query($con, $sql);
			$diamerter;
			if($row = mysqli_fetch_assoc($result))
			{
				$diamerter=$row['diameter'];
				$gradename=getgradenamebyID($con,$row['grade']);
			}
			echo $gradename."-".$diamerter;
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