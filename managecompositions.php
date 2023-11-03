<?php
include('header/header.php');

//select Component
$query = "SELECT * FROM grademaster";
$result = mysqli_query($con, $query);
$grade='<option value=""    >--- Select Grade ---</option>';
while ($row = mysqli_fetch_assoc($result)) {
    $grade.='<option value="' . $row['Gradeid'] . '">' . $row['GradeName'] . '</option>';
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

      <h3>Manage All Compositions</h3>

      <div class="row">
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4> Create Composition</h4>
                    <div class="card-header-action">
                      <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                          class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="mycard-collapse">
                    <div class="card-body">
                      
                      <Select class="form-control" id="slsgrade" onchange="viewdata()">
                        <?php echo  $grade; ?>
                      </Select>
                      <hr>
                      <Select class="form-control" id="slscompo">
                      <?php echo  $component; ?>
                      </Select>
                      <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Min Value" id="txtmnvalue">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Max Value" id="txtmxvalue">
                        </div>
                    </div>
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




  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
    });

    function viewdata()
    {
        var chemgradeid = $('#slsgrade').val();
        
      $.ajax({
        url: "compositions_backend.php",
        type: "POST",
        data: {
            chemgradeid: chemgradeid,
         
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

      var slsgrade = $('#slsgrade').val();
      var slscompo = $('#slscompo').val();
      var minval = $('#txtmnvalue').val();
      var maxval = $('#txtmxvalue').val();

     // alert(slsgrade+"--"+slscompo+"--"+minval+"--"+maxval);
     
      $.ajax({
        url: "compositions_backend.php",
        type: "POST",
        data: {
            slsgrade: slsgrade,
            slscompo: slscompo,
            minval: minval,
            maxval: maxval,
         
        },
        success: function(data) {
          console.log(data);
          viewdata();
          $('#slscompo').val("");
          $('#txtmnvalue').val("");
          $('#txtmxvalue').val("");
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