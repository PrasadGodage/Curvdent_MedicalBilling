<?php
include('header/header.php');

//select Component
$query = "SELECT * FROM reciptmaster where `istestreportexist`='0'";
$result = mysqli_query($con, $query);
$grade='<option value=""    >--- Select Lot No   ---</option>';
while ($row = mysqli_fetch_assoc($result)) {
   if($row['lotno']!="")
   {
    $grade.='<option value="' . $row['lotno'] . '">' . $row['lotno'] . '</option>';
    // $grade.='<option value="' . $row['itemcode'] . '">' . $row['lotno'] . '</option>';
   }
}

//select Component
$query1 = "SELECT * FROM chem_mechmaster";
$result1 = mysqli_query($con, $query1);
$component='<option value="">--- Select Component ---</option>';
while ($row1 = mysqli_fetch_assoc($result1)) {
    $component.='<option value="' . $row1['ChemMechId'] . '">' . $row1['Name'] . '</option>';
}

?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Create New Test Report Entry</h3>

      <div class="row">
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4> Create Test Report Record</h4>
                    <div class="card-header-action">
                      <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                          class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="mycard-collapse">
                    <div class="card-body">
                      
                      <Select class="form-control" id="slslotno" onchange="getgradedata()">
                        <?php echo  $grade; ?>
                      </Select>
                      <div class="form-row mt-2">
                        <div class="form-group col-md-4">
                            <!-- <label for="">Grade No</label> -->
                        <input type="text" class="form-control" id="showgradeid" readonly>
                        </div>
                        <!-- <div class="form-group col-md-4">
                        <label for="">Child Code</label>
                            <input type="text" class="form-control" placeholder="Max Value" id="txtmxvalue" readonly>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="">RM Date</label>
                            <input type="text" class="form-control" placeholder="Max Value" id="txtmxvalue" readonly>
                        </div> -->
                    </div>
                        
                      <hr>
                      <Select class="form-control" id="slscompo" onchange=getminmax()>
                      </Select>
                      <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="">Min</label>
                            <input type="text" class="form-control" placeholder="Min Value" id="txtmnvalue" readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Max</label>
                            <input type="text" class="form-control" placeholder="Max Value" id="txtmxvalue" readonly>
                        </div>
                    </div>
                    <input type="text" class="form-control mb-4" id="obsvalue" placeholder="Observation value">
                    <button class="btn btn-info form-control" onclick="addcompo()">Add Component</button>
                    </div>
                    <!-- <div class="card-footer">
                      Card Footer
                    </div> -->
                  </div>
                </div>
           
               
              </div>
             
            </div>



<hr>
<h6>Chemical Compositions</h6>
      <table class="table table-striped table-hover"  style="width:100%;">
      <thead id='tblhead'> 
        
      </thead>
      <tbody>

      </tbody>
      </table>
    </div>
  </section>
</div>



  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
      $('#showgradeid').hide(); 
    });

function getgradedata()
{
  loadobstable();
// alert('hii');
var slslotno = $('#slslotno').val();

// alert(slslotno);

$.ajax({
        url: "compositions_backend.php",
        type: "POST",
        data: {
            slslotno: slslotno,
         
        },
        success: function(data) {
          console.log(data);
        //   viewdata();
          $('#showgradeid').val(data);
          var dataofid=$('#showgradeid').val();

          loadchemicalandmechmicallist(dataofid)
         
       },
     }
     );


}


function loadchemicalandmechmicallist(chemmechgradeid)
{
    $.ajax({
        url: "compositions_backend.php",
        type: "POST",
        data: {
            chemmechgradeid: chemmechgradeid,
        },
        success: function(data) {
          console.log(data);
        // location.reload();
          $('#slscompo').append(data);
       },
     }
     );
}


function getminmax()
{
    var selectedcomponent= $('#slscompo').val();
    // alert(selectedcomponent);
    $.ajax({
        url: "compositions_backend.php",
        type: "POST",
        data: {
            selectedcomponent: selectedcomponent,
         
        },
        success: function(data) {

         var arr=data.split("-");
        //   console.log("arr[0]"=arr[0]);
        //   console.log("arr[2]"=arr[1]);
        $('#txtmnvalue').val(arr[0]);
        $('#txtmxvalue').val(arr[1]);
        // location.reload();
        //   $('#tblhead').html(data);
       },
     }
     );
}



    function loadobstable()
    {
      // alert('loding');
        var lotnoformasters = $('#slslotno').val();
        // alert(lotnoformasters);
      $.ajax({
        url: "observation_backend.php",
        type: "POST",
        data: {
          lotnoformasters: lotnoformasters,
         
        },
        success: function(data) {
          console.log(data);
        // location.reload();
          $('#tblhead').html(data);
       },
     }
     );
    }



    function addcompo() {

      var lotno = $('#slslotno').val();
      var slscompo = $('#slscompo').val();
      var showgradeid = $('#showgradeid').val();      
      var minval = $('#txtmnvalue').val();
      var maxval = $('#txtmxvalue').val();
      var obsvalue = $('#obsvalue').val();

    //  alert(slsgrade+"-"+showgradeid+"-"+slscompo+"--"+minval+"--"+maxval+"--"+obsvalue);
     
      $.ajax({
        url: "observation_backend.php",
        type: "POST",
        data: {
            lotno:lotno,
            showgradeid: showgradeid,
            slscompo: slscompo,
            minval: minval,
            maxval: maxval,
            obsvalue: obsvalue,
         
        },
        success: function(data) {
          console.log(data);
          // viewdata();
          loadobstable()
          $('#slscompo').val("");
          $('#txtmnvalue').val("");
          $('#txtmxvalue').val("");
          $('#obsvalue').val("");

        // location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );
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