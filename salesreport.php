<?php
include('header/header.php');
error_reporting(0);
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Sales Report</h3>
      <!-- <div class="row justify-content-end">
        <a  class="btn btn-primary" href="sales.php">Create New Sales</a>
      </div> -->
      <hr>

      <div class="card">
                  <div class="card-header">
                    <h4>Select Details For Sales Report</h4>
                  </div>
                  <div class="card-body">
                        <div class="row">
                            <div class="col">

                            From Date
                            <input type="Date" class="form-control" id="fromdate">                          

                            </div>
                            <div class="col">
                            To Date
                            <input type="Date" class="form-control" id="todate">
                            </div>
                        </div>
                       <div class="mt-3 d-felx justify-content-end">
                       <button class="btn btn-primary" onclick="ViewItemWiseReport()">ItemWise Report</button>
                        <button class="btn btn-primary" onclick="ViewBillWiseReport()">Bill Wise Report</button>
                       </div>
                  </div>
                  <!-- <div class="card-footer">
                    Footer Card
                  </div> -->
        </div>

  </section>
  </div>



  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
    });

    function ViewItemWiseReport(jocno)
    {
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        // alert('Item Wise Sales: '+fromdate+" - "+todate);
        location.href = "ItemWiseSalesA4.php?fromdate="+fromdate+"&todate="+todate;
    }

    function ViewBillWiseReport(jocno)
    {
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        location.href = "BillWiseSalesA4.php?fromdate="+fromdate+"&todate="+todate;
        // alert('Item Wise Sales: '+fromdate+" - "+todate);
    }

  </script>