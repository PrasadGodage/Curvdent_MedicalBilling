<?php
include('header/header.php');

// select bank list ---------------
$query = "SELECT * FROM bankmaster";
$result = mysqli_query($con, $query);
$banklist='<option value="0">--- Select Bank ---</option>';
while ($row = mysqli_fetch_assoc($result)) {
    $banklist.='<option value="' . $row['BankName'] . '">' .$row['BankName'].'</option>';
}
// select item list ----------------
$query1 = "SELECT * FROM itemmaster";
$result1 = mysqli_query($con, $query1);
$itemlist='<option value="0">--- Select Item ---</option>';
while ($row = mysqli_fetch_assoc($result1)) {
    $itemlist.='<option value="' . $row['ItemId'] . '">' .$row['ItemName'].'</option>';
}
// select item list ----------------
$query1 = "SELECT * FROM customermaster";
$result1 = mysqli_query($con, $query1);
$customerlist='<option value="0">--- Select Customer ---</option>';
while ($row = mysqli_fetch_assoc($result1)) {
    $customerlist.='<option value="' . $row['CustId'] . '">' .$row['CustName'].'</option>';
}


?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Sales Panel</h3>
      <!-- <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add</button>
      </div> -->
      <hr>
            <div class="box-body">
                <div class="card shadow">
                    <div class="card-body">
                        <!-- <form class="form" id="" method="post"> -->
                            <div class="row mb-2">
                            <div class="col-6 col-md-3 col-lg-3 col-xs-3 input-group-sm ">
                                    <div class="form-group">
                                        <label class="form-label" style="text-align:right;">Select Customer </label>
                                        <select class="form-control" placeholder="Select Item" id="slscustomer" name="">
                                        <?php echo $customerlist; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2 col-lg-2 col-xs-2 input-group-sm ">
                                    <div class="form-group">
                                        <label>Bill No:</label>
                                        <input type="text" class="form-control" placeholder="Enter BillNo."
                                            id="txtTempbillno" value="<?php echo generateTempBillNumber($con);?>" name="" readonly>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2 col-lg-2 col-xs-2 input-group-sm ">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Date:</label>
                                        <input type="date" class="form-control" id="BillDate" name="" placeholder="MM/DD/YYYY" />
                                    </div>
                                </div>
                                <div class="col-6 col-md-2 col-lg-2 col-xs-2 input-group-sm ">
                                    <div class="form-group">
                                        <label class="form-label">Payment Mode</label>
                                            <select class="form-control" id="paymentMtd">
                                                <option value="Cash" selected="selected">Cash</option>
                                                <option value="Credit">Credit</option>
                                                <option value="Bank">Bank</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-3 col-xs-3 input-group-sm ">
                                    <div class="form-group">
                                        <label class="form-label" style="text-align:right;"></label>
                                        <!-- <input type="text" class="form-control" name="" id="" readonly> -->
                                        <select class="form-control mt-2" placeholder="Select Bank"
                                        id="selectBank" name="" readonly>
                                        <?php echo $banklist;  ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="mb-1 col-6 col-md-3 col-lg-3 col-xs-3 input-group-sm">
                                    <label>Select Item Name</label>
                                    <select class="form-control" placeholder="Select Item" id="slsitemname" name="">
                                        <?php echo $itemlist; ?>
                                    </select>
                                    <br>                                 
                                </div>
                                <div class="mb-1 col-6 col-md-3 col-lg-3 col-xs-3 input-group-sm">
                                <label class="form-label" style="text-align:right;">Discription</label>
                                
                                   <textarea name="" class="form-control" id="txtitemdisc" cols="30" rows="10"></textarea>
                                    <span id=""></span>
                                </div>
                                <div class="mb-2 col-4 col-md-2 col-lg-2 col-xs-2 input-group-sm">
                                    <label class="form-label" style="text-align:right;">Qty:</label>
                                    <input type="text" class="form-control" name="" id="txtqty">
                                </div>
                                <div class="mb-2 col-4 col-md-2 col-lg-2 col-xs-2 input-group-sm">
                                    <label class="form-label" style="text-align:right;">Rate:</label>
                                    <input type="text" class="form-control" name="" id="txtrate">
                                </div>
                              
                                <div class="mb-2 col-4 col-md-2 col-lg-2 col-xs-2 input-group-sm">
                                    <label class="form-label" style="text-align:right;">Discount (%)</label>
                                    <input type="text" class="form-control" name="" id="discper" value="0">
                                </div>
                                                   
                            </div>
                            <div class="row mb-3">
                             
                            <div class="mb-1 col-4 col-md-2 col-lg-2 col-xs-2 input-group-sm">
                                    <label class="form-label" style="text-align:right;">Discount (₹)</label>
                                    <input type="text" class="form-control" name="" id="discamt" value="0">
                                </div>                        
                                <div class="mb-1 col-4 col-md-1 col-lg-1 col-xs-1 input-group-sm">
                                    <label class="form-label" style="text-align:right;">CGST(%):</label>
                                    <input type="text" class="form-control" name="" id="cgst" readonly>
                                </div>
                                <div class="mb-1 col-4 col-md-1 col-lg-1 col-xs-1 input-group-sm">
                                    <label class="form-label" style="text-align:right;">SGST(%):</label>
                                    <input type="text" class="form-control" name="" id="sgst" readonly>
                                </div>
                                <div class="mb-2 col-4 col-md-2 col-lg-2 col-xs-2 input-group-sm">
                                   
                                    <label class="form-label" style="text-align:right;">Taxable Amt:</label>
                                    <input type="text" class="form-control" name="" id="taxableamount" readonly>
                                </div>
                                <div class="mb-2 col-4 col-md-2 col-lg-2 col-xs-2 input-group-sm">
                                    <label class="form-label" style="text-align:right;">Tax Amt:</label>
                                    <input type="text" class="form-control" name="" id="taxamount" readonly>
                                </div>
                                <div class="mb-1 col-4 col-md-2 col-lg-2 col-xs-2 input-group-sm">
                                    <label class="form-label" style="text-align:right;">Total Amt:</label>
                                    <input type="text" class="form-control" name="" id="txttotalamt" readonly>
                                </div>
                                <div class="mb-2 col-4 col-md-2 col-lg-2 col-xs-2 input-group-sm">
                                    <button class="form-control btn btn-primary mt-4" onclick="saveitementry()" name="add" id="add"
                                        style="text-align:center;">Add</button>
                                </div>


                                <input type="hidden" id="txttaxrate">
                                <input type="hidden" id="txtunitid">
                            </div>
                            <hr>
                        
                            <!-- <div class="card shadow"> -->
                                <div class="card-body mb-3">
                                    <!-- <h5 class="box-title text-info text-center">View Purchase Details</h5> -->
                                    <!-- <hr class="my-15"> -->
                                </div>
                                <div class="card-body" style="margin-top: -65px;">
                                   <!-- <div class="row">
                                    <div class="col-10"> -->
                                    <div class="table-responsive">
                                        <!-- <table class="table table-bordered table-striped table-hover" id="tableExport" style="width:100%;"> -->
                                        <table class="table table-bordered table-striped table-hover" id="" style="width:100%;">
                                            <thead>
                                            <tr>
                                                    <th>Sr No</th>
                                                    <th>Item Name <br><small>Discription</small></th>
                                                    <th>Qty</th>
                                                    <th>Rate</th>
                                                    <th>Sub Total</th>
                                                    <!-- <th>Disc(%)</th> -->
                                                    <th>Disc(₹)</th>
                                                    <th>Taxable Amt</th>
                                                    <th>CGST / SGST</th>
                                                    <!-- <th>Tax Amt</th> -->
                                                    <th>Tot Amt</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>

                                            <tbody id="tablerecord">

                                            </tbody>
                                        </table>
                                    <!-- </div>
                                    </div> -->
                                    <hr>
                                    <!-- <div class="col-2"> -->
                                       <div class="row">
                                            <div class="col">
                                                Sub Total <input type="text" class="form-control" id="subtotal" readonly>
                                            </div>
                                            <div class="col">
                                                Discount<input type="text" class="form-control" id="totaldiscount" readonly>
                                            </div>
                                            <div class="col">
                                                Taxable Amt <input type="text" class="form-control" id="totaltaxableamount" readonly>
                                            </div>
                                            <div class="col">
                                                Tax Amt <input type="text" class="form-control" id="totaltaxamount" readonly>
                                            </div>
                                            <div class="col">
                                                Bill Total  <input type="text" class="form-control" id="billtotal" readonly>
                                            </div>
                                            <div class="col">
                                            Round Off <input type="text" class="form-control" id="roundoff" value="0">
                                            </div>
                                            <!-- <div class="col">
                                                Net Bill Amount <input type="text" class="form-control" id="NetBillTotal">
                                            </div> -->
                                       </div>               
                                       <div class="row mt-1 mb-2">
                                           
                                            <div class="col">
                                            Net Bill Total <input type="text" class="form-control" id="NetBillTotal" readonly>
                                            </div>  
                                            <div class="col">
                                            Bill Charges <input type="text" class="form-control" id="BillCharges" value="0">
                                            </div>
                                            <div class="col">
                                            Bill Discount <input type="text" class="form-control" id="BillDiscount" value="0">
                                            </div>
                                            <div class="col">
                                            Final Bill Total  <input type="text" class="form-control" id="FinalBillAmt" value="0" readonly>
                                            </div>
                                            <div class="col">
                                                Paid Amount <input type="text" class="form-control" id="PaidAmount" value="0">
                                            </div>
                                            <div class="col">
                                                Balance Amount <input type="text" class="form-control" id="BalanceAmount" value="0" readonly>
                                            </div>
                                       </div>               
                                    <!-- </div> -->
                                   </div>
                                 <hr>
                                </div>
                            <!-- </div> -->
                        </form>
                        <div class="row ">
                                        <div class="col-12 col-md-8">
                                        
                                        </div>
                                        <div class="col-12 col-md-4 align-items-end ">
                                        <button class="btn btn-primary" onclick="SaveBill()">Save Bill</button>
                                            <button class="btn btn-success" onclick="SaveAndPrintBill()">Save + Print Bill</button>
                                            <button class="btn btn-danger">Exit</button>
                                        </div>
                                   </div>
                    </div>
                </div>
            </div>

        </div>
      
    </div>
  </section>


  <!-- Code Ends -->


  <?php
  include('footers/footer.php');
  ?>
<script>
    function SaveAndPrintBill()
    {
        alert('Hii from SaveAndPrintBill');
    }
    function resetitemdataform()
    {
        // $('#slsitemname').val();
        // $('#txtitemdisc').val();
        // $('#txtunitid').val();
        $('#txtqty').val(0);
        $('#txtrate').val(0);
        $('#discper').val(0);
         $("#discamt").val(0);
         $("#taxableamount").val(0);
        $('#cgst').val(0);
        $('#sgst').val(0);
        $('#taxamount').val(0);
        $('#txttotalamt').val(0);
    }
    function SaveBill()
    {
        // alert('Hii from SaveBill');
        var TEMPBillNo = $('#txtTempbillno').val();
        var BillDate = $('#BillDate').val();
        var customerid = $('#slscustomer').val();
        var paymentType = $('#paymentMtd').val();
        
        // var SubPaymentType = $('#SubPaymentType').val();
        // var totalQty = $('#slscustomer').val();
        var TotalItemAmt = $('#subtotal').val();
        var TotalDiscPer = "";
        var TotalDiscAmt = $('#totaldiscount').val();
        var TotalTaxAbleAmt = $('#totaltaxableamount').val();
        var TotalTax = $('#totaltaxamount').val();
        var RoundOff = $('#roundoff').val();
        var NetBillTotal = $('#NetBillTotal').val();
        var BillCharges = $('#BillCharges').val();
        var ExtraBilldiscount = $('#BillDiscount').val();
        var BillAmountForPaid = $('#FinalBillAmt').val();
        var PaidAmount = $('#PaidAmount').val(); 
        var BalanceAmount = $('#BalanceAmount').val(); 
   


        var AccountName="";
        var SubPaymentType="";
        if(paymentType=="Bank")
        {
            AccountName=$('#selectBank').val();
            SubPaymentType="Bank";
        }

 var NetTotal = parseFloat(TotalTaxAbleAmt)+parseFloat(TotalTax);

        // selectBank
        $.ajax({
        url: "sales_backend.php",
        type: "POST",
        data: {
              TEMPBillNo:TEMPBillNo,
              BillDate:BillDate,
              customerid:customerid,
              paymentType:paymentType,
              SubPaymentType:SubPaymentType,
              AccountName:AccountName,
            //   totalQty:totalQty,
              TotalItemAmt:TotalItemAmt,
            //   TotalDiscPer:TotalDiscPer,
              TotalDiscAmt:TotalDiscAmt,
              TotalTaxAbleAmt:TotalTaxAbleAmt,
              TotalTax:TotalTax,
              NetTotal:NetTotal,
              RoundOff:RoundOff,
              NetBillTotal:NetBillTotal,
              BillCharges:BillCharges,
              ExtraBilldiscount:ExtraBilldiscount,
              BillAmountForPaid:BillAmountForPaid,
              PaidAmount:PaidAmount,
              BalanceAmount:BalanceAmount,

        },
        success: function(data) {
          console.log(data);
          location.reload();
       },
     }
     );
      
    }
</script>
<!-- show current date -->
<script>
$(document).ready(function() {
    // Get the current date
    var currentDate = new Date();
   
    // Format the date as "YYYY-MM-DD" for the input[type=date]
    var formattedDate = currentDate.toISOString().substring(0, 10);

    // Set the value of the input field
    $('#dateField').val(formattedDate);
    readbilldata()
});
</script>


<!-- // select bank option -->
<script>
$(document).ready(function() {
    // Initially, disable the second select field
    $('#selectBank').prop('disabled', true);


//Request for setting item data into fields ------------------------------------------------------------
    $('#slsitemname').on('change', function(e) {
        var itemid = $(this).val();
        var getdata="getdata";
        
      $.post("sales_backend.php", {
        itemid: itemid,
        getdata:getdata,
      }, function(data, status) {
        // alert("Successfully");
        var item = JSON.parse(data);
        console.log(item);
        $('#txtrate').val(item.Rate);
        $('#txttaxrate').val(item.Taxrate);
        $('#txtunitid').val(item.UnitId);
        // $('#txttaxrate').val(item.Taxrate);
        // //   $('#up_categoryname').val(user.name);
        // $('#hidden_id').val(item.ItemId);
      });

      if (e.which == 9) {
   
    $("#txtqty").focus();
    e.preventDefault();
  }

    });

// ======================================================================================================

// ------------------------------------------------------------------------------------------------------
    // Listen for changes in the first select field
    $('#paymentMtd').on('change', function() {
        var selectedValue = $(this).val();

        // If "Bank" is selected, enable the second select field; otherwise, disable it
        if (selectedValue === "Bank") {
            $('#selectBank').prop('disabled', false);
        } else {
            $('#selectBank').prop('disabled', true);
        }
    });
// ======================================================================================================

    $("#txtrate").keyup(function(e){

        if(e.which == 13) {
            saveitementry();
            $('#txtqty').val();
            $('#slsitemname').focus();   
        }
        var qty=$('#txtqty').val();
        var rate=$('#txtrate').val();
        var taxpercentage = $('#txttaxrate').val();

        var cgstsgst=0;
        // var cgstsgst=taxpercentage/2;
        var totalamt=qty*rate;

        var taxamt=gettaxamount(totalamt,taxpercentage)
        $('#taxableamount').val(totalamt);
        $('#cgst').val(cgstsgst);
        $('#sgst').val(cgstsgst);
        $('#taxamount').val(taxamt);
        $('#txttotalamt').val(totalamt+taxamt);



    // // alert(rate);
        });

    $("#txtqty").keyup(function(e){

        if(e.which == 13) {
            saveitementry();
            $('#txtqty').val();
            $('#slsitemname').focus();   
        }
        var qty=$('#txtqty').val();
        var rate=$('#txtrate').val();
        var taxpercentage = $('#txttaxrate').val();
        var totalamt=qty*rate;

        var taxamt=gettaxamount(totalamt,taxpercentage)
        // var cgstsgst=0;
        var cgstsgst=taxpercentage/2;

        $('#cgst').val(cgstsgst);
        $('#sgst').val(cgstsgst);
        $('#taxableamount').val(totalamt);
        $('#taxamount').val(taxamt);
        $('#txttotalamt').val(totalamt+taxamt);


    // alert(rate);
        });
//---------------------------------------Disount code as per amount ------------------------
    $("#discamt").keyup(function(){
        var discountamount= $('#discamt').val();
        var TEMPtotalamt= $('#totalamt').val();
        if(discountamount==0)
        {
            var qty=$('#txtqty').val();
        var rate=$('#txtrate').val();
        var taxpercentage = $('#txttaxrate').val();
        var totalamt=qty*rate;

        var taxamt=gettaxamount(totalamt,taxpercentage)
        // var cgstsgst=0;
        var cgstsgst=taxpercentage/2;

        $('#cgst').val(cgstsgst);
        $('#sgst').val(cgstsgst);
        $('#taxableamount').val(totalamt);
        $('#taxamount').val(taxamt);
        $('#txttotalamt').val(totalamt+taxamt);
        }else
        {
            var qty=$('#txtqty').val();
        var rate=$('#txtrate').val();
        var taxpercentage = $('#txttaxrate').val();
        var totalamt=qty*rate;

        // applying discount on the total amount before tax
        discountamount= $('#discamt').val();
        var discountedamount=totalamt-discountamount;
        // $('#txttotalamt').val(discountedamount);

        taxamt=gettaxamount(discountedamount,taxpercentage)
        // var cgstsgst=0;
        var cgstsgst=taxpercentage/2;

        $('#cgst').val(cgstsgst);
        $('#sgst').val(cgstsgst);
        $('#taxableamount').val(discountedamount);
        $('#taxamount').val(taxamt);
        $('#txttotalamt').val(discountedamount+taxamt);

        }

    });
   


//==========================================================================================
//---------------------------------------Disount code as per Percentage ------------------------
    $("#discper").keyup(function(){
        var discountpercent= $('#discper').val();
        // alert("Discount Percentage : "+discountpercent);
        var TEMPtotalamt= $('#totalamt').val();
        if(discountpercent==0)
        {
            var qty=$('#txtqty').val();
        var rate=$('#txtrate').val();
        var taxpercentage = $('#txttaxrate').val();
        var totalamt=qty*rate;

        var taxamt=gettaxamount(totalamt,taxpercentage)
        // var cgstsgst=0;
        var cgstsgst=taxpercentage/2;

        $('#cgst').val(cgstsgst);
        $('#sgst').val(cgstsgst);
        $('#taxableamount').val(totalamt);
        $('#taxamount').val(taxamt);
        $('#txttotalamt').val(totalamt+taxamt);
        }else
        {
            var qty=$('#txtqty').val();
        var rate=$('#txtrate').val();
        var taxpercentage = $('#txttaxrate').val();
        var totalamt=qty*rate;
        // alert("Total Amount"+totalamt);
     
        discountamount=gettaxamount(totalamt,discountpercent)
        var discountedamount=totalamt-discountamount;
        // alert("Disconted Amount"+discountedamount);
        // var cgstsgst=0;
        var taxamt=gettaxamount(discountedamount,taxpercentage)
        var cgstsgst=taxpercentage/2;

        $('#cgst').val(cgstsgst);
        $('#sgst').val(cgstsgst);
        // $('#cgst').val(cgstsgst+"%");
        // $('#sgst').val(cgstsgst+"%");
        $('#taxableamount').val(discountedamount);
        $('#taxamount').val(taxamt);
        $('#txttotalamt').val(discountedamount+taxamt);

        }
        });

//---------------------------------------ROUND OFF------------------------
$("#roundoff").keyup(function(){
        var roundoffvalue=$(this).val();
        var Billtotal= $('#billtotal').val();
        // var discountamount= $('#NetBillTotal').val();
            if(roundoffvalue!="")
            {
                    var netbilltotal=parseFloat(Billtotal)+parseFloat(roundoffvalue);
                    $('#NetBillTotal').val(netbilltotal);

            }else
            {
                $('#NetBillTotal').val(Billtotal);
            }
    });
//==========================================================================================
//---------------------------------------ROUND OFF------------------------
$("#PaidAmount").keyup(function(){
        var PaidAmount=$(this).val();
        var FinalBillAmt= $('#FinalBillAmt').val();
        // var discountamount= $('#NetBillTotal').val();
            if(PaidAmount!="")
            {
                    var Balanceamount=parseFloat(FinalBillAmt)-parseFloat(PaidAmount);
                    $('#BalanceAmount').val(Balanceamount);

            }else
            {
                $('#BalanceAmount').val(FinalBillAmt);
            }
    });
//==========================================================================================


//--------------------------------------- BILL CHARGES------------------------
$("#BillCharges").keyup(function(){
        var Billcharges=$(this).val();
        var NetBillTotal=  $('#NetBillTotal').val();
        var BillDiscount=  $('#BillDiscount').val();
        // var discountamount= $('#NetBillTotal').val();
            if(Billcharges!="")
            {
            
                    var DiscountableAmount=parseFloat(NetBillTotal)+parseFloat(Billcharges);
                    var finalBillAmount=DiscountableAmount - parseFloat(BillDiscount);
                    $('#FinalBillAmt').val(finalBillAmount);
                    $('#BalanceAmount').val(finalBillAmount);

            }else
            {
                $('#FinalBillAmt').val(NetBillTotal);
                $('#BalanceAmount').val(NetBillTotal);
            }
    });
//==========================================================================================

//--------------------------------------- BILL CHARGES------------------------
$("#BillDiscount").keyup(function(){
        var BillDiscount=$(this).val();
        var NetBillTotal=  $('#NetBillTotal').val();
        var Billcharges=  $('#BillCharges').val();
        // var discountamount= $('#NetBillTotal').val();
            if(Billcharges!="")
            {
            
                    var DiscountableAmount=parseFloat(NetBillTotal)+parseFloat(Billcharges);
                    var finalBillAmount=DiscountableAmount - parseFloat(BillDiscount);
                    $('#FinalBillAmt').val(finalBillAmount);
                    $('#BalanceAmount').val(finalBillAmount);

            }else
            {
                $('#FinalBillAmt').val(NetBillTotal);
                $('#BalanceAmount').val(NetBillTotal);
            }
    });
//==========================================================================================

});


</script>
<script>
    function gettaxamount(totalAmount,gstPercentage)
    {
        var gstAmount = (totalAmount * gstPercentage) / 100;
       return gstAmount;
    }

    function saveitementry()
    {
        var BillNO = $('#txtTempbillno').val();
        var ItemID = $('#slsitemname').val();
        var ItemDisc = $('#txtitemdisc').val();
        var UnitID = $('#txtunitid').val();
        // alert("ID records : ItemID : "+ItemID+" ItemDisc : "+ItemDisc+" Unit ID : "+UnitID);
        var Qty = $('#txtqty').val();
        var Rate = $('#txtrate').val();
        var ItemTotal = Qty*Rate;
        // alert("Qty : "+Qty+" * Rate : "+Rate+" = "+ItemTotal);
        var DiscountPercentage = $('#discper').val();
        var DiscountAmount =  $("#discamt").val();
        var TaxableAmount =  $("#taxableamount").val();
    
        // alert("Discount Amount : "+DiscountAmount+" Discount percentage "+DiscountPercentage);

        var CgstPercetage = $('#cgst').val();
        var CgstAmt = gettaxamount(ItemTotal,CgstPercetage);
        var SgstPercentage = $('#sgst').val();
        var SgstAmt = gettaxamount(ItemTotal,SgstPercentage);

        // alert("CgstPercetage : "+CgstPercetage+" CgstAmt "+CgstAmt+"SgstPercentage : "+SgstPercentage+" SgstAmt "+SgstAmt);

        var TaxAmount = $('#taxamount').val();
        var NetAmount = $('#txttotalamt').val();
        // alert("TaxAmount : "+TaxAmount+" NetAmount "+NetAmount);



        $.ajax({
        url: "sales_backend.php",
        type: "POST",
        data: {
                BillNO: BillNO,
                ItemID: ItemID,
                ItemDisc: ItemDisc,
                UnitID: UnitID,
                Qty: Qty,
                Rate: Rate,
                ItemTotal: ItemTotal,
                DiscountPercentage: DiscountPercentage,
                DiscountAmount: DiscountAmount,
                TaxableAmount:TaxableAmount,
                CgstPercetage: CgstPercetage,
                CgstAmt: CgstAmt,
                SgstPercentage: SgstPercentage,
                SgstAmt: SgstAmt,
                TaxAmount: TaxAmount,
                NetAmount: NetAmount,                 
        },
        success: function(data) {
          console.log(data);
          readbilldata();
          resetitemdataform();
        //   getallbillamounts(BillNO);
        //   $('#basicModal').modal('hide');
        //  location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );



    }


    function readbilldata()
    {
        var BillNO = $('#txtTempbillno').val();
        var readrecord="readrecord";
        
        $.ajax({
        url: "sales_backend.php",
        type: "POST",
        data: {
                readrecord:readrecord,  
                BillNO:BillNO                
        },
        success: function(data) {
          console.log(data);
        //   $('#basicModal').modal('hide');
        //  location.reload();
         $('#tablerecord').html(data);
         getallbillamounts(BillNO);
       },
     }
     );

    }

    async function getallbillamounts($billno)
    {
        getsubtotal();
        gettaxableamount();
        // calculatediscount()
        getgstamount();
        
    }

    function getsubtotal()
    {
        var subBillNO = $('#txtTempbillno').val();
        var subtotal="readrecord";
        
        $.ajax({
        url: "sales_backend.php",
        type: "POST",
        data: {
                subtotal:subtotal,  
                subBillNO:subBillNO                
        },
        success: function(data) {
          console.log(data);
        //   $('#basicModal').modal('hide');
        //  location.reload();
        $('#subtotal').val(data);
       },
     }
     );
    }
    function gettaxableamount()
    {
        var TaxBillNO = $('#txtTempbillno').val();
        var taxableAmount="taxableAmount";
        
        $.ajax({
        url: "sales_backend.php",
        type: "POST",
        data: {
                TaxBillNO:TaxBillNO,  
                taxableAmount:taxableAmount                
        },
        success: function(data) {
          console.log(data);
        $('#totaltaxableamount').val(data);
        calculatediscount();
       },
     }
     );
    }
    function getgstamount()
    {
        var GstBillNO = $('#txtTempbillno').val();
        var TaxAmt="taxableAmount";
        
        $.ajax({
        url: "sales_backend.php",
        type: "POST",
        data: {
                GstBillNO:GstBillNO,  
                TaxAmt:TaxAmt                
        },
        success: function(data) {
          console.log(data);
        $('#totaltaxamount').val(data);
        // calculatediscount();
        calculateBillAmount();
       },
     }
     );
    }
    function calculatediscount()
    {
        var subtotaldisc = $('#subtotal').val();
        var totaltaxableamountdisc = $('#totaltaxableamount').val();
        var discountedamount=subtotaldisc-totaltaxableamountdisc;
        console.log(discountedamount);
        $('#totaldiscount').val(discountedamount);
    }
    function calculateBillAmount()
    {
        var totaltaxamount = $('#totaltaxamount').val();
        var totaltaxableamountdisc = $('#totaltaxableamount').val();
        var TotalBillAmount= parseFloat(totaltaxamount) +  parseFloat(totaltaxableamountdisc);
        console.log("Total Bill Amount : "+TotalBillAmount);
        $('#billtotal').val(TotalBillAmount);
        $('#NetBillTotal').val(TotalBillAmount);
        // $('#Netbilltotal').val(discountedamount);
    }
</script>