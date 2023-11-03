<?php
include('header/header.php');
error_reporting(0);
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Bill Details</h3>
      <div class="row justify-content-end">
        <a  class="btn btn-primary" href="sales.php">Create New Sales</a>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>
            <th>id</th>
            <th>Bill NO</th>
            <th>Bill Date</th>
            <th>Bill TO</th>
            <th>Payment Type</th>
            <th>Taxable</th>
            <th>Total Tax</th>
            <th>Net Total</th>
            <th>Remove Bill</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `sales` ORDER BY `sales`.`BillId` DESC";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <!-- <td><?php //echo $num; ?></td> -->
          
          <td><?php echo $row['BillId']; ?></td>
          <td><?php echo $row['BillNo']; ?></td>
          <td><?php echo $row['BillDate']; ?></td>
          <td><?php
           echo getcustomernameById($con,$row['CustId']);
            ?></td>
          <td><?php echo $row['PaymentType']; ?></td>
          <td><?php echo $row['TaxableTotal']; ?></td>
          <td><?php echo $row['TotalTax']; ?></td>
          <td><?php echo $row['NetTotal']; ?></td>
          <td><button class="btn btn-primary mr-1">View Bill</button><button class="btn btn-danger">X</button></td>
                    
          
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

        
        </tbody>
      </table>
    </div>
  </section>
  </div>
  <!-- model started -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Component</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <label for="">Grade Name</label>
                  <input type="text" class="form-control" id="gradename">
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="savecate()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->

<!-- model to add invoice No is started -->
<div class="modal fade" id="modelforinvoicenoadd" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Invoice No</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <input type="hidden" class="form-control" id="hiddendinvid">

                  <label for="">Enter Invoice date</label>
                  <input type="date" class="form-control" id="invdate">

                  <label for="">Enter Invoice No</label>
                  <input type="text" class="form-control" id="invo">
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="addinvno(<?php ?>)">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->

<!-- model to add lot No is started -->
<div class="modal fade" id="modelforlotnoadd" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add LOT No</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <label for="">Enter LOT No</label>
                  <input type="hidden" class="form-control" id="hiddenlotid">
                  <input type="text" class="form-control" id="lotno">
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="addlotno(<?php ?>)">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->



  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
    });

    // function savecate() {

    //   var gradename = $('#gradename').val();
     
    //   $.ajax({
    //     url: "grade_backend.php",
    //     type: "POST",
    //     data: {
    //         gradename: gradename,
         
    //     },
    //     success: function(data) {
    //       console.log(data);
    //       $('#basicModal').modal('hide');
    //      location.reload();
    //     //  $('#tblcontent').html(data);
    //    },
    //  }
    //  );
    // }

    function openinvmodel(jocno)
    {
            // alert(jocno);
            $('#hiddendinvid').val(jocno);
            $('#modelforinvoicenoadd').modal('show');
    }

    function openlotmodel(jocno)
    {
            // alert(jocno);
            $('#hiddenlotid').val(jocno);
            $('#modelforlotnoadd').modal('show');
    }

    function addinvno() {
    var jobcardnumber=$('#hiddendinvid').val();
    var invo = $('#invo').val();
    //   alert(jobcardnumber+" "+invo);
      if(invo=="")
      {
        alert("Please Enter Invoice No");
      }
      else{
            
                $.ajax({
                    url: "jbc_backend.php",
                    type: "POST",
                    data: {
                        jobcardnumber: jobcardnumber,
                        invo: invo,
                    
                    },
                    success: function(data) {
                    console.log(data);
                    $('#modelforinvoicenoadd').modal('hide');
                    location.reload();
                    //  $('#tblcontent').html(data);
                },
                }
                );
          }
    }


    function addlotno() {
    var jobcardnumberforlot=$('#hiddenlotid').val();
    var lotno = $('#lotno').val();
    //   alert(jobcardnumber+" "+invo);
      if(invo=="")
      {
        alert("Please Enter Invoice No");
      }
      else{
            
                $.ajax({
                    url: "jbc_backend.php",
                    type: "POST",
                    data: {
                        jobcardnumberforlot: jobcardnumberforlot,
                        lotno: lotno,
                    
                    },
                    success: function(data) {
                    console.log(data);
                    $('#modelforlotnoadd').modal('hide');
                    location.reload();
                },
                }
                );
          }
    }




    function deletedata(deleteid)
    {
        // alert(id); 
        
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Grade!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "grade_backend.php",
                    type: "POST",
                    data: {deleteid:deleteid},
                    success:function(data) {
                      swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                      });
                        location.reload(true);
                       //alert("sucess");
                //   readrecord();
                    },
                });


    } else {

    }
  });

    }
  </script>