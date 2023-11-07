<?php
include('header/header.php');
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Unit Master</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New Unit</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>Unit ID</th>
            <th>Unit Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `unitmaster`  WHERE `Satus`='0'";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
         <tr>
           <td><?php echo $row['UnitID']; ?></td>
          
           <td><?php echo $row['UnitName']; ?></td>
        
          <td>
            <button class="btn btn-warning" onclick="getdata(<?php echo $row['UnitID']; ?>)"><i data-feather="edit"></i></button>
            &nbsp<button class="mt-1 btn btn-danger" onclick="deletedata(<?php echo $row['UnitID']; ?>)">X</button></td>
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
        <td colspan='3' align='center'>No Category Found</td>
  </tr>";
}



?>

        
        </tbody>
      </table>
    </div>
  </section>

  <!-- model started -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                <label for="">Unit Name</label>
                  <input type="text" class="form-control" id="unitname">
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

  <!-- -----------------------------------------------------------------------------------------------------df -->
  <!-- Menu update code here -->
   <!-- model started -->
   <div class="modal fade" id="updatemenumodel" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Unit </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <input type="hidden" id="hidden_id">
                  <label for="">Unit Name</label>
                  <input type="text" class="form-control" id="upcatename">
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" onclick="updatecate()">Update</button>
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
    $(document).ready(function() {
      // alert('hii');
    });

    function savecate() 
    {
      var unitname = $('#unitname').val();
     
      $.ajax({
        url: "unit_backend.php",
        type: "POST",
        data: {
            unitname: unitname,         
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





    function getdata(updateid) {

        // alert("get details hii"+updateid);
      // $('#hidden_id').val(updateid);

      $.post("unit_backend.php", {
        updateid: updateid
      }, function(data, status) {
        // alert("Successfully");
        console.log(data); 
        var unitjson = JSON.parse(data);
          // $('#up_unitjsonname').val(user.name);
           
         
        $('#hidden_id').val(unitjson.UnitID);
        // $('#upvcname').val(menu.companyname);
        $('#upcatename').val(unitjson.UnitName);
       

      });
      $('#updatemenumodel').modal('show');


    }




    function updatecate() {
      var hidden_id = $('#hidden_id').val();
      var upcatename = $('#upcatename').val();
     

     $.ajax({
        url: "unit_backend.php",
        type: "POST",
        data: {
            hidden_id: hidden_id,
          upcatename: upcatename,
       
        },
        success: function(data) {
          console.log(data);
          $('#basicModal').modal('hide');
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
    text: "Once deleted, you will not be able to recover this Unit!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "unit_backend.php",
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