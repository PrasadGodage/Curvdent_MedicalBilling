<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];





// codeing of composition masters add composition

if(isset($_POST['lotno']) && isset($_POST['showgradeid']) && isset($_POST['slscompo']) && isset($_POST['minval']) && isset($_POST['maxval']) && isset($_POST['obsvalue']))
{
    $checksql="SELECT * from `itemchemicalcompositionobs` where `ItemId`='$showgradeid' AND `ChemMechId`='$slscompo' AND `lotno`='$lotno'";
    // echo $checksql;
    $checkrs=mysqli_query($con,$checksql);
 
    if(mysqli_num_rows($checkrs)>0)
    {
        $output="Exist";
    }else
    {
        $inseruser="INSERT INTO `itemchemicalcompositionobs`(`lotno`, `ItemId`, `ChemMechId`, `Type`, `MnValue`, `MxValue`, `obsvalue`) 
                                        VALUES ('$lotno','$showgradeid','$slscompo','".getchem_mechtype($con,$slscompo)."','$minval','$maxval','$obsvalue')";
        // echo $inseruser;
        if(mysqli_query($con,$inseruser))
        {			

        $output="Done";

        }
      
    }
 
    echo $output;
   

}







if(isset($_POST['lotnoformasters']))
{
    $rowcode= "<tr> <th>Lot No</th> <th></th> "; 
        
    
    $selectmenulist="SELECT * FROM `itemchemicalcompositionobs` where `lotno`='$lotnoformasters'";
    
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

    $minrow= "<tr> <td></td> <td>Min</td> "; 
        
    
    $selectmenulist="SELECT * FROM `itemchemicalcompositionobs` where `lotno`='$lotnoformasters'";
    
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

    $maxrow= "<tr>  <td></td><td>Max</td> "; 
        
    
    $selectmenulist="SELECT * FROM `itemchemicalcompositionobs` where `lotno`='$lotnoformasters'";
    
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

    

    $obsrow= "<tr> <td><b>".$lotnoformasters."</b></td> <td>obs</td> "; 
        
    
    $selectmenulist="SELECT * FROM `itemchemicalcompositionobs` where `lotno`='$lotnoformasters'";
    
    $res=mysqli_query($con,$selectmenulist);
    
    if(mysqli_num_rows($res)>0)
    {
      $num=1;
            while($row=mysqli_fetch_array($res))
        {
       
            $obsrow.="<td>".$row['obsvalue']."</td>";
             
        $num++;
      }
    }
   
    $obsrow.="</tr>";




    echo $rowcode.$minrow.$maxrow.$obsrow;
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