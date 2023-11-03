<?php

include('config.php');
include('functions.php');

// $fromdate="2022-11-2";
// $todate="2023-11-2";

if(!isset($_GET['fromdate']) || !isset($_GET['todate']))
{
  header('Location:newchallan.php');
}

$fromdate=$_GET['fromdate'];
$todate=$_GET['todate'];


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curvdent Health Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  

        <!-- <div class="container"> -->
            <div class="row">
                <div class="col-3">
                <img src="images/curevelogo.png" height="150px" width="200px" alt="">
                </div>
                <div class="col-9">
                   <center>
                    <h1><?php echo getfirmname($con,2); ?></h1>
                    <p><?php echo getfirmAddress($con,2); ?></p>
                    <p>Mobile: <?php echo getFirmMob($con,2); ?> , State: Maharashtra</p>
                   </center>
                </div>
            </div>
<hr>
            <div class="row pt-2 pb-2" style="background-color:rgb(230, 230, 230);">
               <center>
               <h4> Item-Wise Sales</h4>
               </center>
            </div>
            <div class="row ">
               <div class="col d-flex justify-content-end mt-1">
                    <b>Form: <?php echo $fromdate; ?> - TO: <?php echo $todate; ?></b>
               </div>
            </div>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Rate</th>                        
                        <th>Qty</th>
                        <th>Net Total</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                        $totalQty=0;
                        $NetTotal=0;
                        $selectsalesdtlsQuery="Select MT.ItemName, Sum(SD.Qty) as Quantity,MT.Rate, Sum(SD.NetAmt) as SalesAmt From salesdetails SD Inner Join itemmaster MT On SD.ItemId=MT.ItemId Inner Join Sales TS On TS.BillId=SD.BillId Where TS.BillDate>='$fromdate' and TS.BillDate<='$todate' Group By MT.ItemName,MT.Rate Order By MT.ItemName;";

                        $ressales=mysqli_query($con,$selectsalesdtlsQuery);

                        if(mysqli_num_rows($ressales)>0)
                        {
                        $num=1;
                                while($row=mysqli_fetch_array($ressales))
                        {
                          $totalQty= $totalQty+$row['Quantity'];
                          $NetTotal= $NetTotal+$row['SalesAmt'];
                            
                            ?>
                                <tr>
                                <td><?php echo $num; ?></td>
                                
                                <!-- <td><?php //  ?></td> -->
                                <td><?php echo $row['ItemName']; ?></td>
                                <td><?php echo $row['Rate']; ?></td>
                                <td><?php echo $row['Quantity']; ?></td>
                                <td><?php echo $row['SalesAmt']; ?></td>
                                </tr>
                            <?php 
                            $num++;
                        }
                        }else{
                        echo "<tr>
                                <td colspan='3' align='center'>No Component Found</td>
                        </tr>";
                        }


                  ?>
                  <tr>
                    <td colspan='3' class="text-end"><b>SubTotal</b> </td>
                    <td><b><?php echo $totalQty;?></b></td>
                   
                    <td><b><?php echo $NetTotal;?></b></td>
                  </tr>
                </tbody>
              </table>
<!-- 
              <div class="row">
                <div class="col-7">
                    <B>BANK DETAILS</B>
                    <P>Name: SPARKSOUL INFOTECH PRIVATE LIMITED</P>
                    
                    <P> <br>
                        IFSC Code: ICIC0001095<br>
                        Account No: 109505005440<br>
                        Bank: ICICI Bank,SANGAMNER</P>
                </div>
                <div class="col-5 float-right">
                    <h6>TAXABLE AMOUNT ₹ <?php// echo $TotalTaxable; ?></h6>
                    <hr>
                    <h6>TOTAL AMOUNT ₹ <?php// echo $NetTotal; ?></h6>
                    <hr>
                    <p>Received Amount ₹ 0</p>
                  
                </div>
              </div> -->

              <div class="row">
                <div class="col-7">
                    <!-- <p><b>TERMS AND CONDITIONS</b></p>
                    <p>1. Domain & Hosting Charges belong to the client only.<br>
                        2. All disputes are subject to Sangamner jurisdiction only</p> -->
                </div>
                <div class="col-5">
                   <center>
                   <br>
                   <br>
                   <br>
                   <br>
                    <b>AUTHORISED SIGNATORY FOR</b>
                    <p><?php echo getfirmname($con,2); ?></p>
                   </center>
                </div>
              </div>
        <!-- </div> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>