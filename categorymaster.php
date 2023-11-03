<?php
include('header/header.php');
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Category Master</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New Category</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

          <th>ID</th>
            <th>Category name</th>
            <th>Category Disc</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `categorymaster`  WHERE  `Status`='0'";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
         <tr>
           <td><?php echo $row['CategoryId']; ?></td>
          
           <td><?php echo $row['CategoryName']; ?></td>
           <td><?php echo $row['Disc']; ?></td>
          <td>
            <button class="btn btn-warning" onclick="getdata(<?php echo $row['CategoryId']; ?>)"><i data-feather="edit"></i></button>
            &nbsp<button class="mt-1 btn btn-danger" onclick="deletedata(<?php echo $row['CategoryId']; ?>)">X</button></td>
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
        <td colspan='4' align='center'>No Category Found</td>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                <label for="">Category Name</label>
                  <input type="text" class="form-control" id="catename">
                  <label for="">Category Disc</label>
                  <input type="text" class="form-control" id="catedisc">
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Category </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <input type="hidden" id="hidden_id">
                  <label for="">Category Name</label>
                  <input type="text" class="form-control" id="upcatename">
                  <label for="">Category Disc</label>
                  <input type="text" class="form-control" id="upcatedisc">
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
      var catename = $('#catename').val();
      var catedisc = $('#catedisc').val();
     
      $.ajax({
        url: "grade_backend.php",
        type: "POST",
        data: {
            catename: catename,
            catedisc: catedisc,
         
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

      $.post("grade_backend.php", {
        updateid: updateid
      }, function(data, status) {
        // alert("Successfully");
        console.log(data); 
        var category = JSON.parse(data);
          // $('#up_categoryname').val(user.name);
           
         
        $('#hidden_id').val(category.CategoryId);
        // $('#upvcname').val(menu.companyname);
        $('#upcatename').val(category.CategoryName);
        $('#upcatedisc').val(category.Disc);
       

      });
      $('#updatemenumodel').modal('show');


    }




    function updatecate() {
      var hidden_id = $('#hidden_id').val();
      var upcatname = $('#upcatename').val();
      var upcatedisc = $('#upcatedisc').val();
     

     $.ajax({
        url: "grade_backend.php",
        type: "POST",
        data: {
          hidden_id: hidden_id,
          upcatname: upcatname,
          upcatedisc: upcatedisc,
       
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
    text: "Once deleted, you will not be able to recover this category!",
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
                      console.log(data);
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