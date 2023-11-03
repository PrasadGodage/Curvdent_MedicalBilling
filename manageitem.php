<?php
include('header/header.php');


$query = "SELECT * FROM unitmaster";
$result = mysqli_query($con, $query);
$unitlist='<option value="0">--- Select Unit ---</option>';
while ($row = mysqli_fetch_assoc($result)) {
    $unitlist.='<option value="' . $row['UnitID'] . '">' .$row['UnitName'].'</option>';
}
$query1 = "SELECT * FROM categorymaster";
$result1 = mysqli_query($con, $query1);
$categoryList='<option value="0">--- Select Category ---</option>';
while ($row1 = mysqli_fetch_assoc($result1)) {
    $categoryList.='<option value="' . $row1['CategoryId'] . '">' .$row1['CategoryName']."</option>'";
}

// function getcategorynamebyid($con,$id)
// {
//     $selectquery = "SELECT * FROM `categorymaster` where `CategoryId `='$id'";
//       echo $selectquery;
//       $GradeName="No Record Found";
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $GradeName=$row['CategoryName'];

//    return $GradeName;
// }
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Item Master</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New Item</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>#</th>
            <th>Item Name</th>
            <th>Disc</th>
            <th>Unit</th>
            <th>Rate</th>
            <!-- <th>Category</th> -->
            <th>Tax Rate (%)</th>
            <th>Process</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `itemmaster`";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
   {?>
        <tr>
          <td><?php echo $num; ?></td>
          
          <td><?php echo $row['ItemName']; ?></td>
          <td><?php echo $row['Description']; ?></td>
          <td><?php echo getunitnamebyID($con,$row['UnitId']); ?></td>
          <td><?php echo $row['Rate']; ?></td>
          <!-- <td><?php //echo getcategorynamebyid($con,$row['ItemGroupId']); ?></td> -->
          <td><?php echo $row['Taxrate']."%"; ?></td>
          <td>
          <button class="btn btn-warning" onclick="getdata(<?php echo $row['ItemId']; ?>)"><i data-feather="edit"></i></button>
          <button class="mt-1 btn btn-danger" onclick="deletedata(<?php echo $row['ItemId']; ?>)">X</button></td>
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

  <!-- model started -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <!-- <label for="">Item Code</label>
                  <input type="text" class="form-control" id="txtitemcode"> -->
                  <label for="">Item Name</label>
                  <input type="text" class="form-control" id="itemname">
                  <label for="">Disc</label>
                  <textarea name="" id="itemdisc" cols="30" rows="10" class="form-control"></textarea>
                  <!-- <label for="">Item Category</label>
                  <input type="text" class="form-control" id="itemcategory"> -->
                
<!--                   
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                        <label for="">Length</label>
                  <input type="text" class="form-control" id="itemlength">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Dia</label>
                  <input type="text" class="form-control" id="itemdia">
                        </div>
                    </div> -->
                 
                 
<!-- 
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="">Gross Wt</label>
                            <input type="text" class="form-control" placeholder="0.00" id="gweight">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Net Wt</label>
                            <input type="text" class="form-control" placeholder="0.00" id="nweight">
                        </div>
                    </div> -->
                    <label for="">Unit</label>
                 <select name="" id="slsunit" class="form-control">
                 <?php echo $unitlist;  ?>
                 </select>

                  <label for="">Category</label>
                 <select name="" id="slscategory" class="form-control">
                 <?php echo $categoryList;  ?>
                 </select>
                  <label for="">Tax Rate</label>
                 <select name="" id="slstaxrate" class="form-control">
                      <option value="0">0%</option>
                      <option value="5">5%</option>
                      <option value="12">12%</option>
                      <option value="18">18%</option>
                      <option value="28">28%</option>
                 </select>
                 <label for="">Rate</label>
                  <input type="text" class="form-control" id="itemrate" placeholder="0.00">
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="saveitem()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->


  <!-- update item model code started -->
  
  <!-- model started -->
  <div class="modal fade" id="Updateitemmodel" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <!-- <label for="">Item Code</label>
                  <input type="text" class="form-control" id="txtitemcode"> -->
                  <label for="">Item Name</label>
                  <input type="text" class="form-control" id="upitemname">
                  <label for="">Disc</label>
                  <textarea name="" id="upitemdisc" cols="30" rows="10" class="form-control"></textarea>
                  <!-- <label for="">Item Category</label>
                  <input type="text" class="form-control" id="itemcategory"> -->
                
<!--                   
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                        <label for="">Length</label>
                  <input type="text" class="form-control" id="itemlength">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Dia</label>
                  <input type="text" class="form-control" id="itemdia">
                        </div>
                    </div> -->
                 
                 
<!-- 
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="">Gross Wt</label>
                            <input type="text" class="form-control" placeholder="0.00" id="gweight">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Net Wt</label>
                            <input type="text" class="form-control" placeholder="0.00" id="nweight">
                        </div>
                    </div> -->
                    <label for="">Unit</label>
                 <select name="" id="upslsunit" class="form-control">
                 <?php echo $unitlist;  ?>
                 </select>

                  <label for="">Category</label>
                 <select name="" id="upslscategory" class="form-control">
                 <?php echo $categoryList;  ?>
                 </select>
                  <label for="">Tax Rate</label>
                 <select name="" id="upslstaxrate" class="form-control">
                      <option value="0">0%</option>
                      <option value="5">5%</option>
                      <option value="12">12%</option>
                      <option value="18">18%</option>
                      <option value="28">28%</option>
                 </select>
                 <label for="">Rate</label>
                  <input type="text" class="form-control" id="upitemrate" placeholder="0.00">
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="saveitem()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->
  <!-- Code Ends -->


  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
    });

    function saveitem() {

      var itemname = $('#itemname').val();
      var disc = $('#itemdisc').val();
      var itemrate = $('#itemrate').val();
      var slscategory = $('#slscategory').val();
      var slstaxrate = $('#slstaxrate').val();
      var slsunit = $('#slsunit').val();
    //  alert(itemname+","+disc+","+itemrate+","+slscategory+","+slsunit);
      $.ajax({
        url: "item_backend.php",
        type: "POST",
        data: {
          itemname: itemname,
          disc: disc,
          itemrate: itemrate,
          slscategory: slscategory,
          slstaxrate: slstaxrate,
          slsunit: slsunit,                  
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

      $.post("item_backend.php", {
        updateid: updateid
      }, function(data, status) {
        // alert("Successfully");
        var item = JSON.parse(data);
        console.log(item);
        // //   $('#up_categoryname').val(user.name);
        // $('#hidden_id').val(item.ItemId);
        // $('#itemname').val(item.ItemName);
        // $('#itemdisc').val(item.Description);
        // $('#itemrate').val(item.UnitId);
        // $('#slscategory').val(item.Rate);
        // $('#slstaxrate').val(item.ItemGroupId);
        // $('#slsunit').val(item.Taxrate);
       

      });
      $('#Updateitemmodel').modal('show');


    }




    function updatecate() {
      var hidden_id = $('#hidden_id').val();
      var upcomponame = $('#upcomponame').val();
      var upcompotype = $('#upcompotype').val();
     

     $.ajax({
        url: "component_backend.php",
        type: "POST",
        data: {
          hidden_id: hidden_id,
          upcomponame: upcomponame,
          upcompotype: upcompotype,
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
    text: "Once deleted, you will not be able to recover this Item!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "component_backend.php",
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