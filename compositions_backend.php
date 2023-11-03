<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['gradename']) )
{

    $inseruser="INSERT INTO `grademaster`(`GradeName`) VALUES ('$gradename')";


            //echo $ledgerquery;
            if(mysqli_query($con,$inseruser))
            {			

            $output="Done";

            }
            echo $output;
    // }

}



		///delete data
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="DELETE FROM `grademaster` WHERE Gradeid='$deleteid'";
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


if(isset($_POST['slslotno']))
{
  $gradename=getgradenamebylotno($con,$slslotno);
  echo $gradename;
}

if(isset($_POST['chemmechgradeid']))
{
  
  $selectmenulist="SELECT * FROM `itemchemicalcompositionmaster` where `ItemId`='$chemmechgradeid'";
      // echo $selectmenulist;
  $res=mysqli_query($con,$selectmenulist);
  $output="<option>Select Components<option>";
  if(mysqli_num_rows($res)>0)
  {
          while($row=mysqli_fetch_array($res))
      {
        $output.="<option value='".$row['id']."'>".getchem_mechID($con,$row['ChemMechId'])."</option>";

      }
     
  }else{
    $output="<option>Please Add Components<option>";
  }


  echo $output;
}
if(isset($_POST['selectedcomponent']))
{
  
  $selectmenulist="SELECT * FROM `itemchemicalcompositionmaster` where `id`='$selectedcomponent'";
      // echo $selectmenulist;
  $res=mysqli_query($con,$selectmenulist);

  $min="";
  $max="";

  if(mysqli_num_rows($res)>0)
  {

          while($row=mysqli_fetch_array($res))
      {
        $min=$row['MnValue'];
        $max=$row['MxValue'];
      
      }
     
  }


  echo $min."-".$max;
}







if(isset($_POST['chemgradeid']))
{
    $rowcode= "<tr> <th></th> "; 
        
    
    $selectmenulist="SELECT * FROM `itemchemicalcompositionmaster` where `ItemId`='$chemgradeid'";
    
    $res=mysqli_query($con,$selectmenulist);
    
    if(mysqli_num_rows($res)>0)
    {
      $num=1;
            while($row=mysqli_fetch_array($res))
        {
       
            $rowcode.="<th>".getchem_mechID($con,$row['ChemMechId'])."</th>";
             
        $num++;
      }
    }
   
    $rowcode.="</tr>";

    $minrow= "<tr> <td>Min</td> "; 
        
    
    $selectmenulist="SELECT * FROM `itemchemicalcompositionmaster` where `ItemId`='$chemgradeid'";
    
    $res=mysqli_query($con,$selectmenulist);
    
    if(mysqli_num_rows($res)>0)
    {
      $num=1;
            while($row=mysqli_fetch_array($res))
        {
       
            $minrow.="<td>".$row['MnValue']."</td>";
             
        $num++;
      }
    }
   
    $minrow.="</tr>";

    $maxrow= "<tr> <td>Max</td> "; 
        
    
    $selectmenulist="SELECT * FROM `itemchemicalcompositionmaster` where `ItemId`='$chemgradeid'";
    
    $res=mysqli_query($con,$selectmenulist);
    
    if(mysqli_num_rows($res)>0)
    {
      $num=1;
            while($row=mysqli_fetch_array($res))
        {
       
            $maxrow.="<td>".$row['MxValue']."</td>";
             
        $num++;
      }
    }
   
    $maxrow.="</tr>";



    echo $rowcode.$minrow.$maxrow;
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