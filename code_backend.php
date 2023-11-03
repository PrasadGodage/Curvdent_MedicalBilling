<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['grade']) && isset($_POST['dia'])&& isset($_POST['code']))
{

    $checksql="SELECT * from `gradediameteruniquecode` where `grade`='$grade' AND `diameter`='$dia'";
    // echo $checksql;
    $checkrs=mysqli_query($con,$checksql);
 
    if(mysqli_num_rows($checkrs)>0)
    {
        $output="Exist";
    }else
    {


    $inseruser="INSERT INTO `gradediameteruniquecode`(`grade`, `diameter`, `uniquecode`) VALUES ('$grade','$dia','$code')";


            //echo $ledgerquery;
            if(mysqli_query($con,$inseruser))
            {			

            $output="Done";

            }
           
    }
    echo $output;

}



		///delete data
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="DELETE FROM `gradediameteruniquecode` WHERE id='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}




// codeing of composition masters add composition

if(isset($_POST['slsgrade']) && $_POST['slscompo']&& $_POST['minval']&& $_POST['maxval'])
{
    $checksql="SELECT * from `itemchemicalcompositionmaster` where `ItemId`='$slsgrade' AND `ChemMechId`='$slscompo'";
    // echo $checksql;
    $checkrs=mysqli_query($con,$checksql);
 
    if(mysqli_num_rows($checkrs)>0)
    {
        $output="Exist";
    }else
    {
        $inseruser="INSERT INTO `itemchemicalcompositionmaster`(`ItemId`, `ChemMechId`, `Type`, `MnValue`, `MxValue`) VALUES ('$slsgrade','$slscompo','".getchem_mechtype($con,$slscompo)."','$minval','$maxval')";
        // echo $inseruser;
        if(mysqli_query($con,$inseruser))
        {			

        $output="Done";

        }
      
    }
 
    echo $output;
   

}


if(isset($_POST['getdata']))
{       
    $rowcode="";   
    $selectmenulist="SELECT * FROM `gradediameteruniquecode`";
        // echo $selectmenulist;
    $res=mysqli_query($con,$selectmenulist);
    
    if(mysqli_num_rows($res)>0)
    {
      $num=1;
            while($row=mysqli_fetch_array($res))
        {
            $rowcode.="<tr>";
            $rowcode.="<th>".getgradenamebyID($con,$row['grade'])."</th>";
            $rowcode.="<th>".$row['diameter']."</th>";
            $rowcode.="<th>".$row['uniquecode']."</th>";
            $rowcode.="<th><button class='btn btn-danger' onclick=deletedata(".$row['id'].")>X</button></th>";
            $rowcode.="</tr>";
             
        $num++;
      }
    }
   
    $rowcode.="</tr>";



    echo $rowcode;
}





function getchem_mechtype($con,$id)
{
    $selectquery = "SELECT * FROM `chem_mechmaster` where `ChemMechId`='$id'";
      echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $typecode=$row['Type'];

   return $typecode;
}











?>