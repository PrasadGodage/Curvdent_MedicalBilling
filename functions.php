<?php
include('config.php');

function getusernamebyid($con,$id)
{
    $selectquery = "SELECT * FROM `usermaster` where `userid`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $legerid=$row['name'];

   echo $legerid;
}
function getfirmname($con,$id)
{
    $selectquery = "SELECT * FROM `firmmaster` where `FirmId`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $FirmId=$row['FirmName'];

   echo $FirmId;
}
function getfirmAddress($con,$id)
{
    $selectquery = "SELECT * FROM `firmmaster` where `FirmId`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $FirmAddress=$row['FirmAddress'];

   echo $FirmAddress;
}
function getFirmMob($con,$id)
{
    $selectquery = "SELECT * FROM `firmmaster` where `FirmId`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $FirmNo=$row['FirmNo'];

   echo $FirmNo;
}

function getcustomernameById($con,$CustomerID)
{
    $selectquery = "SELECT * FROM `customermaster` where `CustId`='$CustomerID'";
   //   echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $CutomerName=$row['CustName'];
   if($CutomerName=="")
   {
    echo "Cash Customer";
   }

   return $CutomerName;
}

function getFinancialYear() {
  $today = date('Y-m-d');
    $year = date('y', strtotime($today));

    if (date('m', strtotime($today)) < 4) {
        $year--;
    }

    $nextYear = $year + 1;

    return "$year-$nextYear";
}

function getSerialNumber($con) {

   $selectquery = "SELECT MAX(billid) AS max_billid FROM sales";
  // echo $selectquery;
  $result = mysqli_query($con, $selectquery);
  if(mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_assoc($result);
    $lastBillId = $row["max_billid"];

    // Increment the last billid by one
    $newBillId = $lastBillId + 1;
  }else{
        // If no records exist, start with billid 001
        $newBillId = "001";
  }

return $newBillId;
// return "001";

}
function getTempSerialNumber($con) {

   $selectquery = "SELECT SalesBillID FROM tempbillserias";
  // echo $selectquery;
  $result = mysqli_query($con, $selectquery);
  if(mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_assoc($result);
    $lastBillId = $row["SalesBillID"];
    // -----------------------------------------------------  
    increamenttempbillvalue($con);
      // ---------------------------------------------------
    // Increment the last billid by one
    $newBillId = $lastBillId;
  }else{
        // If no records exist, start with billid 001
        $newBillId = "001";
  }

return $newBillId;
// return "001";

}

function increamenttempbillvalue($con)
{
  $updateIDSql = "UPDATE `tempbillserias` SET `SalesBillID`=`SalesBillID`+1";
   
    mysqli_query($con, $updateIDSql);
}

function getprefix($con) {
  $selectquery = "SELECT * FROM `firmmaster` where `FirmId`='1'";
  // echo $selectquery;
  $prefixname="No Record Found";
$result = mysqli_query($con, $selectquery);
$row = mysqli_fetch_assoc($result);
$prefixname=$row['prefix'];

return $prefixname;
}


function generateBillNumber($con,$serial) {
  $prefix =  getprefix($con);
  $financialYear = getFinancialYear();
  // $serial = getSerialNumber($con);

  $billNumber = "$prefix/$financialYear/$serial";

  return $billNumber;
}
function generateTempBillNumber($con) {
  $prefix =  getprefix($con);
  $financialYear = getFinancialYear();
  $serial = getTempSerialNumber($con);

  $billNumber = "$prefix/$financialYear/$serial";

  return $billNumber;
}

// function getcategorynamebyid($con,$id)
// {
//     $selectquery = "SELECT * FROM `categorymaster` where `CategoryId `='$id'";
//       echo $selectquery;
//       $GradeName="No Record Found";
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $GradeName=$row['CategoryName'];

//    return $GradeName;
// }
function getunitnamebyID($con,$id)
{
    $selectquery = "SELECT * FROM `unitmaster` where `UnitID`='$id'";
      // echo $selectquery;
      $unitname="No Record Found";
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $unitname=$row['UnitName'];

   return $unitname;
}
function getitemnamebyID($con,$id)
{
    $selectquery = "SELECT * FROM `itemmaster` where `ItemId`='$id'";
      // echo $selectquery;
      $unitname="No Record Found";
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $unitname=$row['ItemName'];

   return $unitname;
}
function getitemTaxpercentbyID($con,$id)
{
    $selectquery = "SELECT * FROM `itemmaster` where `ItemId`='$id'";
      // echo $selectquery;
      $unitname="No Record Found";
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $unitname=$row['Taxrate'];

   return $unitname;
}


function SetBillNoToBill($con,$FinalBillNO,$TransactionID)
{
  // echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
    $selectquery = "UPDATE `sales` SET `BillNo`='$FinalBillNO' WHERE `BillId`='$TransactionID'";
      // echo $selectquery;
   $result = mysqli_query($con, $selectquery);
  //  ConvertTempsalesBillToSalesDtls($con,$tempBillNO,$TransactionID);
}

function ConvertTempsalesBillToSalesDtls($con,$tempBillNO,$BillId)
{
  $selectmenulist="SELECT * FROM `tempsalesdetails` where `BillId`='$tempBillNO'";
  // echo $selectmenulist;
  //  echo $tempBillNO;
  $res=mysqli_query($con,$selectmenulist);
  
  if(mysqli_num_rows($res)>0)
  {
    $num=1;
    // echo "Record Founded in this query is : ".mysqli_num_rows($res);
    while($row=mysqli_fetch_array($res))
      {  

       if(insertsalesdtls($con,$BillId,$row['ItemId'],$row['ItemDescription'],$row['UnitId'],$row['Qty'],$row['Rate'],$row['ItemTotal'],$row['DiscPer'],$row['DiscAmt'],$row['TaxableAmt'],$row['TaxPer1'],$row['TaxAmt1'],$row['TaxPer2'],$row['TaxAmt2'],$row['TotalTax'],$row['NetAmt'])) 
       {
        //delete the Data
        $TempID = $row['id'];
        deleteTempsalesdata($con,$TempID);
       }else
       {
        Echo "Facing Issue to delete The data... (Functions.php)";
       }
    
      // $num++;
    }
    echo $num;
  }
}

function insertsalesdtls($con,$BillID,$ItemID,$ItemDisc,$UnitID,$Qty,$Rate,$ItemTotal,$DiscountPercentage,$DiscountAmount,$TaxableAmount,$CgstPercetage,$CgstAmt,$SgstPercentage,$SgstAmt,$TaxAmount,$NetAmount)
{
  $Insertitemtodb="INSERT INTO `salesdetails`(`BillId`, `ItemId`, `ItemDescription`, `UnitId`, `Qty`, `Rate`, `ItemTotal`, `DiscPer`, `DiscAmt`,`TaxableAmt`, `TaxPer1`, `TaxAmt1`, `TaxPer2`, `TaxAmt2`, `TotalTax`, `NetAmt`)VALUES ('$BillID','$ItemID','$ItemDisc','$UnitID','$Qty','$Rate','$ItemTotal','$DiscountPercentage','$DiscountAmount','$TaxableAmount','$CgstPercetage','$CgstAmt','$SgstPercentage','$SgstAmt','$TaxAmount','$NetAmount')";

          if( mysqli_query($con,$Insertitemtodb))
          {
            return true;
          }
          else
          {            
            return false;
          }
}

function deleteTempsalesdata($con,$TempID)
{
		  $sql="DELETE FROM `tempsalesdetails` WHERE `id`='$TempID'";
		  mysqli_query($con,$sql);
}

function deletesalesdtls($con,$deleteid)
{
		  $sql="DELETE FROM `salesdetails` WHERE `BillId`='$deleteid'";
      echo $sql;
		  mysqli_query($con,$sql);
}
function deletesales($con,$deleteid)
{
		  $sql="DELETE FROM `sales` WHERE `BillId`='$deleteid'";
      echo $sql;
		  mysqli_query($con,$sql);
}


function getgradenamebychildcode($con,$childcode)
{
    $selectquery = "SELECT * FROM `gradediameteruniquecode` where `uniquecode`='$childcode'";
      // echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $gradeid=$row['grade'];

   // $GradeName=getgradenamebyID($con,$gradeid);

   return $gradeid;
}


function getobservactiontable($con,$lotnoformasters)
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

   

   $obsrow= "<tr> <td><b>".$lotnoformasters."</b></td> <td>Observed</td> "; 
       
   
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

function getgradenamebylotno($con,$lotno)
{
   $selectquery = "SELECT * FROM `reciptmaster` where `lotno`='$lotno'";
   // echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $itemchildcode=$row['itemcode'];

   return getgradenamebychildcode($con,$itemchildcode);
}


function updatejobcardno($con,$jbcid)
{
  $prefix="JBC-";
  $jobcardID=$prefix.$jbcid;
    $updatesql="UPDATE `jobcardmaster` SET `jbcno`='$jobcardID' WHERE `jobcardid`='$jbcid'";
    $result=mysqli_query($con,$updatesql);

}
function updateopenpostatustoone($con,$openpoid)
{
    $updatesql="UPDATE `openporawdata` SET `status`='1' WHERE `id`='$openpoid'";
    $result=mysqli_query($con,$updatesql);
}



function getreciptdatafortransaction($con,$reciptid)
{
  $selectquery = "SELECT * FROM `reciptmaster` where `id`='$reciptid'";
  // echo $selectquery;
  $result = mysqli_query($con, $selectquery);
  if(mysqli_num_rows($result)>0)
  {
        $row = mysqli_fetch_assoc($result);
        $date=$row['reciptdate'];
        $childcode=$row['itemcode'];
        $category=$row['category'];
        $itemdisc=$row['reciptdisc'];
        $qty=$row['qty'];
        $lotno=$row['lotno'];
        $itemunit=getunitnamebyID($con,$row['rmunitcode']);
        $itemcode=getgradenamebychildcode($con,$childcode);

        $itemname=getgradenamebyID($con,$itemcode);

      makestocktransactionentry($con,$date,$itemcode,"INWARD",$qty,$lotno);

      makestockentry($con,$itemname,$itemcode,$itemdisc,$category,"ROW",$qty,$itemunit);
  }
  else
  {
    echo " Data Not For this recipt Id".$reciptid;
  }
}

function makestocktransactionentry($con,$date,$itemcode,$transactiotype,$qty,$lotno)
{

  $selectsql="SELECT * FROM `stocktransactionmaster` WHERE `date`='$date' AND `itemcode`='$itemcode' AND `type`='$transactiotype' AND `qty`='$qty' AND `lotno`='$lotno'";

  $res=mysqli_query($con,$selectsql);

  if(mysqli_num_rows($res)>0)
  {
    echo " Transactio Record Founded";
  }else{
    $insertsql="INSERT INTO `stocktransactionmaster`(`date`, `itemcode`, `type`, `qty`, `lotno`) 
    VALUES ('$date','$itemcode','$transactiotype','$qty','$lotno')";
$result=mysqli_query($con,$insertsql);
  }

    
}



function makestockentry($con,$itemname,$itemcode,$disc,$category,$type,$qty,$unit)
{
  $checkrecordexistornotsql="SELECT * FROM `stocktable` WHERE `itemcode`='$itemcode' AND `itemcat`='$category' AND `type`='$type'";

  $rescheck=mysqli_query($con,$checkrecordexistornotsql);

  if(mysqli_num_rows($rescheck)>0)
  {
    //Update Stock
    $updateqty="UPDATE `stocktable` SET `qty`=qty+$qty WHERE `itemcode`='$itemcode'";
    mysqli_query($con,$updateqty);
    
  }else
  {
    //Create new stock Entry 
    $inserttostocksql="INSERT INTO `stocktable`(`itemcode`, `itemname`, `itemdisc`, `itemcat`, `type`, `qty`, `unit`) 
                                VALUES ('$itemcode','$itemname','$disc','$category','$type','$qty','$unit')";
      mysqli_query($con,$inserttostocksql);

  }

}



?>


