<?php
session_start();
include('config.php');
include('functions.php');
if($_SESSION['BillNO']=='')
{
    echo "<script>";
//echo "alert('Logout Successfull');";
echo 'window.location.href="sales.php";';
echo "</script>";
}

$BillNO=$_SESSION['BillNO'];
// $CustomerID="2";

//-------------------------------------------------------------
//---------------------Bill Data ------------------------------
$selectquery = "SELECT * FROM `sales` where `BillNo`='$BillNO'";
//  echo $selectquery;
$result = mysqli_query($con, $selectquery);
$row = mysqli_fetch_assoc($result);
$BillId=$row['BillId'];
$invno=$row['BillNo'];
$CustomerID=$row['CustId'];
$invdate=$row['BillDate'];
$invpaymenttype=$row['PaymentType'];
$SubPaymentType=$row['SubPaymentType'];
//----------------------------------------------------------------
//----------------------Customer Data ----------------------------
$SelectCustomerData = "SELECT * FROM `customermaster` where `CustId`='$CustomerID'";
//  echo $SelectCustomerData;
$Customerres = mysqli_query($con, $SelectCustomerData);
$row = mysqli_fetch_assoc($Customerres);
$CustName=$row['CustName'];
$Address=$row['Address'];




?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A4 Bill Design</title>
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
                    <h1>CURVEDENT   HEALTH CARE PRIVATE LIMITED</h1>
                    <p>CURVDENT CLINIC, NAVIN NAGAR ROAD, SANGAMNER, DIST : AHMEDNAGAR - 422605</p>
                    <p>Mobile: 9143950950 , State: Maharashtra</p>
                   </center>
                </div>
            </div>
<hr>
            <div class="row pt-2 pb-2" style="background-color:rgb(230, 230, 230);">
                <div class="col"><h5>Invoice No.: <?php echo $invno;?></h5></div>
                <div class="col"><h5>Invoice Date: <?php echo $invdate;?></h5></div>
                <div class="col"><h5>Payment Type: <?php echo $invpaymenttype."<br>".$SubPaymentType;?></h5></div>
            </div>
            <div class="row">
                <p><b>Bill To</b></p>
                <div class="col-7">
                    <h5><?php echo $CustName; ?></h5>
                    <p><?php echo $Address; ?></p>
                </div>
                <div class="col-5"></div>
            </div>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Rate</th>
                        <th>Taxable Amt</th>
                        <th>Tax(%)</th>
                        <th>Tax Amt</th>
                        <th>Net Total</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  
                        $TotalTaxable=0;
                        $TotalTaxAmt=0;
                        $NetTotal=0;


                        $selectsalesdtlsQuery="SELECT * FROM `salesdetails` WHERE `BillId`='$BillId'";

                        $ressales=mysqli_query($con,$selectsalesdtlsQuery);

                        if(mysqli_num_rows($ressales)>0)
                        {
                        $num=1;
                                while($row=mysqli_fetch_array($ressales))
                        {
                            $TotalTaxable= $TotalTaxable+$row['TaxableAmt'];
                            $TotalTaxAmt= $TotalTaxAmt+$row['TaxAmt1'];
                            $NetTotal= $NetTotal+$row['NetAmt'];
                            
                            ?>
                                <tr>
                                <td><?php echo $num; ?></td>
                                
                                <td><?php echo getitemnamebyID($con,$row['ItemId']); ?></td>
                                <td><?php echo $row['Qty']; ?></td>
                                <td><?php echo $row['Rate']; ?></td>
                                <td><?php echo $row['TaxableAmt']; ?></td>
                                <td><?php echo getitemTaxpercentbyID($con,$row['ItemId']); ?></td>
                                <td><?php echo $row['TaxAmt1']*2; ?></td>
                                <td><?php echo $row['NetAmt']; ?></td>
                                </tr>
                            <?php 
                            $num++;
                        }
                        }else{
                        echo "<tr>
                                <td colspan='3' align='center'>No Component Found</td>
                        </tr>";
                        }
                        $TotalTaxAmt= $TotalTaxAmt*2;


                  ?>
                    <tr>
                        <td colspan="4" class="text-end"><b>SubTotal</b></td>
                        
                        <td><b><?php echo $TotalTaxable; ?></b></td>
                        <td></td>
                        <td><b><?php echo $TotalTaxAmt; ?></b></td>
                        <td><b><?php echo $NetTotal; ?></b></td>
                    </tr>
                </tbody>
              </table>

              <div class="row">
                <div class="col-7">
                    <!-- <B>BANK DETAILS</B>
                    <P>Name: CURVEDENT HEALTH CARE PVT.LTD</P>
                    
                    <P> <br>
                        IFSC Code: ICIC0001095<br>
                        Account No: 109505005440<br>
                        Bank: ICICI Bank,SANGAMNER</P> -->
                </div>
                <div class="col-5 float-right">
                    <h6>TAXABLE AMOUNT ₹ <?php echo $TotalTaxable; ?></h6>
                    <hr>
                    <h6>TOTAL AMOUNT ₹ <?php echo $NetTotal; ?></h6>
                    <hr>
                    <p>Received Amount ₹ 0</p>
                  
                </div>
              </div>

              <div class="row">
                <div class="col-7">
                    <!-- <p><b>TERMS AND CONDITIONS</b></p>
                    <p>1. Domain & Hosting Charges belong to the client only.<br>
                        2. All disputes are subject to Sangamner jurisdiction only</p> -->
                </div>
                <div class="col-5">
                    <br>
                    <b>AUTHORISED SIGNATORY FOR</b>
                    <p>CURVEDENT HEALTH CARE PVT.LTD</p>
                </div>
              </div>
        <!-- </div> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>