<?php
include('header/header.php');
$today=date("Y-m-d");

$query = "SELECT * FROM unitmaster";
$result = mysqli_query($con, $query);
$unitlist='<option value="">--- Select Unit ---</option>';
while ($row = mysqli_fetch_assoc($result)) {
    $unitlist.='<option value="' . $row['id'] . '">' .$row['unit'].'</option>';
}

// $jobcardno=getuniquejobcardnumber($con);
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <!-- <h6>Please Fill the below Details for New Jobcard</h6> -->
      <h3>Manage Your Orders </h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updatemenumodel">Create New Recipt</button>
      </div>
      <hr>



      <table class="table table-striped" id="table-2" style="width:100%;">
        <thead>
          <tr>

            <th>No</th>
            <th>Buyer Name</th>
            <th>PO NO</th>
            <th>PO Line</th>
            <th>PO Date</th>
            <th>Del. Date</th>
            <th>Item Code</th>
            <th>QTY</th>
            <th>Unit Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
    <?php

            $selectmenulist="SELECT * FROM `openporawdata` where `status`='0'";
            // $selectmenulist="SELECT * FROM `openporawdata` where `recorddate`='$today'";

            $res=mysqli_query($con,$selectmenulist);

            if(mysqli_num_rows($res)>0)
            {
              $num=1; 
                while($row=mysqli_fetch_array($res))
                {?>
                    <tr>
                      <td><?php echo $num; ?></td>
                      <td><?php echo $row['buyername']; ?></td>
                      <td><?php echo $row['pono']; ?></td>
                      <td><?php echo $row['poline']; ?></td>
                      <td><?php echo $row['podate']; ?></td>
                      <td><?php echo $row['deliverydate']; ?></td>
                      <td><?php echo $row['itemcode']; ?></td>
                      <td><?php echo $row['poqty']; ?></td>
                      <td><?php echo $row['unitprice']; ?></td>
                      <td><button class="btn btn-primary" onclick="createjobcard(<?php echo $row['id'];?>)">Create job card</button></td>
                    </tr>
                <?php 
                $num++;
              }
            }else{
              echo "<tr>
                    <td colspan='9' class='text-center'>No Uploaded Data for Today</td>
              </tr>";
            }
      ?>

        
        </tbody>
      </table>
      </div> 
    </div>
  </section>


 

<!-- model to add lot No is started -->
<div class="modal fade" id="modelforlotnoadd" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create New Jobcard </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <label for="">Enter Jobcard Date</label>
                  <input type="hidden" class="form-control" id="hiddenlotid">
                  <input type="date" class="form-control" id="jobcdate">
                  <small>Jobcard Number will automatically Created after submittion </small>
                  <!-- <label for="">Enter LOT No</label>
                  <input type="text" class="form-control" id="lotno"> -->
                 
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="createnewjobcard(<?php ?>)">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->




  <!-- -----------------------------------------------------------------------------------------------------df -->
  




  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
  $(document).ready( function () {
    // $('#myTable').DataTable({
    //     'columnDefs':[{
    //         'targets':0,
    //          'checkboxes':{
    //             'selectRow':true
    //          }
    //     }]
    // });
} );

function createjobcard(jocno)
    {
            //  alert(jocno);
            $('#hiddenlotid').val(jocno);
            $('#modelforlotnoadd').modal('show');
    }




    // function getstatus(orderid)
    // {
        
    //     var status=$('#orderstatus').val();
    //     // alert(orderid+"-"+status);
    //     $.ajax({
    //     url: "order_backend.php",
    //     type: "POST",
    //     data: {
    //         orderid: orderid,
    //         status: status,
    //     },
    //     success: function(data) {
    //       console.log(data);
    //     //   $('#basicModal').modal('hide');
    //     //  location.reload();
    //     //  $('#tblcontent').html(data);
    //    },
    //  }
    //  );

    // }


    function createnewjobcard() {
    var openpoid=$('#hiddenlotid').val();
    var jobcdate = $('#jobcdate').val();
      // alert(openpoid+" "+jobcdate);
      if(jobcdate=="")
      {
        alert("Please Enter Jobcard Date");
      }
      else{
            
                $.ajax({
                    url: "jbc_backend.php",
                    type: "POST",
                    data: {
                      openpoid: openpoid,
                        jobcdate: jobcdate,
                    
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
    text: "Once deleted, you will not be able to recover this Menu!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "menu_backend.php",
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