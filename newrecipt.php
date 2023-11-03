<?php
include('header/header.php');
$today=date("Y-m-d");

$query = "SELECT * FROM unitmaster";
$result = mysqli_query($con, $query);
$unitlist='<option value="">--- Select Unit ---</option>';
while ($row = mysqli_fetch_assoc($result)) {
    $unitlist.='<option value="' . $row['id'] . '">' .$row['unit'].'</option>';
}

?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <!-- <h6>Please Fill the below Details for New Jobcard</h6> -->
      <h3>Manage Your Orders</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updatemenumodel">Create New Recipt</button>
      </div>
      <hr>



      <table class="table table-striped" id="table-2" style="width:100%;">
        <thead>
          <tr>

            <th>id</th>
            <th>Recipt Date</th>
            <th>RM/Item Code</th>
            <th>Category</th>
            <th>Disc</th>
            <th>Qty</th>
            <th>Rate/th>
            <th>supplier</th>
            <th>Lot No </th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `reciptmaster`";
// $selectmenulist="SELECT * FROM `openporawdata` where `recorddate`='$today'";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <td><?php echo $num; ?></td>
          <td><?php echo $row['reciptdate']; ?></td>
          <td><?php echo $row['itemcode']; ?></td>
          <td><?php echo $row['category']; ?></td>
          <td><?php echo $row['reciptdisc']; ?></td>
          <td><?php echo $row['qty']." ".getunitnamebyID($con,$row['rmunitcode']); ?></td>
          <td><?php echo $row['rate']; ?></td>
          <td><?php echo $row['supplier']; ?></td>
          <td><?php 
          if($row['lotno']=="")
          {
            echo "<button class='mt-1 btn btn-primary' onclick=openlotmodel('".$row['id']."')>Add LOT.No</button>";
          }else
          {
            echo $row['lotno'];
          }
          
          ?></td>
          <!-- <td><button class='mt-1 btn btn-primary' onclick=openlotmodel(<?php //echo $row['id']; ?>)>Add LOT.No</button> -->
    </td>
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


  <!-- -----------------------------------------------------------------------------------------------------df -->
  <!-- Menu update code here -->
   <!-- model started -->
   <div class="modal fade" id="updatemenumodel" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">New Recipt Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label for="">RM Code</label>
                  <input type="text" class="form-control" id="rmcode" onkeyup="checkrmcode()">

                <label for="">Disc</label>
                  <input type="text" class="form-control" id="rmdisc" readonly>  

                <label for="">Recipt Date</label>
                  <input type="date" class="form-control" id="rmdate">

                <label for="">Category</label>

                <select name="" class="form-control" id="rmcategory">
                  <option value="">Select Categoey</option>
                  <option value="IH">IH</option>
                  <option value="BO">BO</option>
                  <option value="BOTH">BOTH</option>
                </select>

                <label for="">Qty</label>
                    <input type="number" class="form-control" id="rmqty">

                <label for="">Rate</label>
                    <input type="number" class="form-control" id="rmrate">

                <label for="">Supplier</label>
                    <input type="text" class="form-control" id="rmsupplier">

                <label for="">Unit</label>
                 <select name="" id="rmunit" class="form-control">
                 <?php echo $unitlist;  ?>
                 </select>


              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="addstock()">Add Entery</button>
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

function openlotmodel(jocno)
    {
            // alert(jocno);
            $('#hiddenlotid').val(jocno);
            $('#modelforlotnoadd').modal('show');
    }

function checkrmcode()
{
  var rmcodeforcheck=$('#rmcode').val();
 if(rmcodeforcheck.length>3)
 {
  getrmcodedetails(rmcodeforcheck)
 }
}



function getrmcodedetails(rmcodeforrecipt)
    {
        
        var status=$('#orderstatus').val();
        // alert(orderid+"-"+status);
        $.ajax({
        url: "recipt_backend.php",
        type: "POST",
        data: {
          rmcodeforrecipt: rmcodeforrecipt,
        },
        success: function(data) {
          console.log(data);
          $('#rmdisc').val(data);
        //   $('#basicModal').modal('hide');
        //  location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );

    }

    function getstatus(orderid)
    {
        
        var status=$('#orderstatus').val();
        // alert(orderid+"-"+status);
        $.ajax({
        url: "order_backend.php",
        type: "POST",
        data: {
            orderid: orderid,
            status: status,
        },
        success: function(data) {
          console.log(data);
        //   $('#basicModal').modal('hide');
        //  location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );

    }


    function addstock() {
      // alert('fun');
      // menuname,menuunit,menurate,menucategory,behavior,makingtime,disc
      var rmcode = $('#rmcode').val();
      var rmdate = $('#rmdate').val();
      var rmcategory = $('#rmcategory').val();
      var rmdisc = $('#rmdisc').val();
      var rmqty = $('#rmqty').val();
      var rmrate = $('#rmrate').val();
      var rmsupplier = $('#rmsupplier').val();
      var rmunit = $('#rmunit').val();
      // var menuimage = $('#menuimage').val();

    //    console.log(menuname+"--"+menuunit+"--"+menurate+"--"+behavior+"--"+menucategory+"--"+makingtime+"--"+disc);
      $.ajax({
        url: "recipt_backend.php",
        type: "POST",
        data: {
          rmcode: rmcode,
          rmdate: rmdate,
          rmcategory: rmcategory,
          rmdisc: rmdisc,
          rmqty: rmqty,
          rmrate: rmrate,
          rmsupplier: rmsupplier,
          rmunit: rmunit,
          // menuimage:menuimage,
        },
        success: function(data) {
          console.log(data);
          $('#basicModal').modal('hide');
         location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );
    }

    function addlotno() {
    var jobcardnumberforlot=$('#hiddenlotid').val();
    var lotno = $('#lotno').val();
    //   alert(jobcardnumber+" "+invo);
      if(lotno=="")
      {
        alert("Please Enter Invoice No");
      }
      else{
            
                $.ajax({
                    url: "recipt_backend.php",
                    type: "POST",
                    data: {
                        jobcardnumberforlot: jobcardnumberforlot,
                        lotno: lotno,
                    
                    },
                    success: function(data) {
                    console.log(data);
                    $('#modelforlotnoadd').modal('hide');
                    // location.reload();
                },
                }
                );
          }
    }




    function getdata(updateid) {

        // alert("get details hii"+updateid);
      // $('#hidden_id').val(updateid);

      $.post("menu_backend.php", {
        updateid: updateid
      }, function(data, status) {
        // alert("Successfully");
        var menu = JSON.parse(data);
        //   $('#up_categoryname').val(user.name);
            console.log(menu);
           
        $('#hidden_id').val(menu.itemid);
        // $('#upvcname').val(menu.companyname);
        $('#upmenuname').val(menu.itemname);
        $('#upmenuunit').val(menu.unit);
        $('#upmenurate').val(menu.rate);
        $('#upbehavior').val(menu.itembehavior);
        $('#upmenucategory').val(menu.itemcategoryname);
        $('#upmakingtime').val(menu.makingtime);
        $('#updisc').val(menu.itemdisc);

      });
      $('#updatemenumodel').modal('show');


    }




    function updatemenu() {
      var hidden_id = $('#hidden_id').val();
      var upmenuname = $('#upmenuname').val();
      var upmenuunit = $('#upmenuunit').val();
      var upmenurate = $('#upmenurate').val();
      var upbehavior = $('#upbehavior').val();
      var upmenucategory = $('#upmenucategory').val();
      var upmakingtime = $('#upmakingtime').val();
      var updisc = $('#updisc').val();

     console.log(hidden_id+"--"+upmenuname+"--"+upmenuunit+"--"+upmenurate+"--"+upbehavior+"--"+upmenucategory+"--"+upmakingtime+"--"+updisc);
      
     $.ajax({
        url: "menu_backend.php",
        type: "POST",
        data: {
          hidden_id: hidden_id,
          upmenuname: upmenuname,
          upmenuunit: upmenuunit,
          upmenurate: upmenurate,
          upbehavior: upbehavior,
          upmenucategory: upmenucategory,
          upmakingtime: upmakingtime,
          updisc: updisc,
        },
        success: function(data) {
          console.log(data);
          // $('#basicModal').modal('hide');
          location.reload();
          // $('#tblcontent').html(data);
        },
      });
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