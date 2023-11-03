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

      <h3>Mange Codes</h3>

      <div class="row">
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4> Create Unique Code</h4>
                    <div class="card-header-action">
                      <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                          class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="mycard-collapse">
                    <div class="card-body">
                      
                      <Select class="form-control" id="slsgrade">
                        <?php echo  $grade; ?>
                      </Select>
                      <hr>
                      <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Diameter" id="txtdia">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Unique Code" id="txtcode">
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
              <di class="col">
              <h6>Chemical Compositions</h6>
              <!-- id="table-1" -->
      <table class="table table-striped table-hover"   style="width:100%;">  
      <thead > 
            <tr>
                <th>Grade</th>
                <th>Diameter</th>
                <th>unique Code</th>
                <th>Action</th>
            </tr>
      </thead>
      <tbody id="tablecontent">

      </tbody>
      </table>
              </di>
             
            </div>



    </div>
  </section>




  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
      getdata();
    });

    function getdata()
    {
        var getdata ="getdata";
        
      $.ajax({
        url: "code_backend.php",
        type: "POST",
        data: {
            getdata: getdata,
         
        },
        success: function(data) {
          console.log(data);
        // location.reload();
          $('#tablecontent').html(data);
       },
     }
     );
    }



    function addcompo() {

      var grade = $('#slsgrade').val();
      var dia = $('#txtdia').val();
      var code = $('#txtcode').val();

     // alert(slsgrade+"--"+slscompo+"--"+minval+"--"+maxval);
     
     $.ajax({
        url: "code_backend.php",
        type: "POST",
        data: {
            grade: grade,
            dia: dia,
            code: code,
         
        },
        success: function(data) {
          console.log(data);
          $('#txtdia').val("");
          $('#txtcode').val("");
          getdata();
        // location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );
    }





    function deletedata(deleteid)
    {
        //  alert(deleteid); 
        
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Code !",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "code_backend.php",
                    type: "POST",
                    data: {deleteid:deleteid},
                    success:function(data) {
                      swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                      });
                        // location.reload(true);
                       //alert("sucess");
                       getdata();
                    },
                });


    } else {

    }
  });

    }
  </script>