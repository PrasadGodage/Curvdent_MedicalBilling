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

      <h3>Firm Master</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Register New Firm</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>#</th>
            <th>Firm Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>GSTIN</th>
            <th>PAN</th>
            <!-- <th>Category</th> -->
            <th>Logo</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `firmmaster`";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
   {?>
        <tr>
          <td><?php echo $num; ?></td>
          
          <td><?php echo $row['FirmName']; ?></td>
          <td><?php echo $row['FirmNo']; ?></td>
          <td><?php echo $row['FirmEmail']; ?></td>
          <td><?php echo $row['FirmGst']; ?></td>
          <td><?php echo $row['FirmPAN']; ?></td>
          <!-- <td><?php //echo getcategorynamebyid($con,$row['ItemGroupId']); ?></td> -->
          <td><?php if($row['LogoAddress']=="")
          {?>
              <button class="btn btn-success" onclick="">Upload Logo</button>
          <?php }else{ 
            echo $row['LogoAddress'];
            }
            ?></td>
          <td>
          <button class="btn btn-warning" onclick="getdata(<?php echo $row['FirmId']; ?>)"><i data-feather="edit"></i></button>
          <button class="mt-1 btn btn-danger" onclick="deletedata(<?php echo $row['FirmId']; ?>)">X</button></td>
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
        <td colspan='8' align='center'>No Component Found</td>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Register New Firm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <!-- <label for="">Item Code</label>
                  <input type="text" class="form-control" id="txtitemcode"> -->
                  <label for="">Firm Name</label>
                  <input type="text" class="form-control" id="txtfirmname">
                  <label for="">Address</label>
                  <textarea name="" id="txtaddress" cols="30" rows="10" class="form-control"></textarea>
                  <label for="">Discription</label>
                  <textarea name="" id="txtdisc" cols="30" rows="10" class="form-control"></textarea>                
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="">Contact No</label>
                            <input type="text" class="form-control" id="txtcontactno">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="txtemail">
                        </div>
                    </div>
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="">GSTIN</label>
                            <input type="text" class="form-control" id="txtgstin">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">PAN</label>
                            <input type="text" class="form-control" id="txtpan">
                        </div>
                    </div>
                    <label for="">Bill Prefix</label>
                  <input type="text" class="form-control" id="txtprifix">
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

      var firmname = $('#txtfirmname').val();
      var firmaddress = $('#txtaddress').val();
      var firmdisc = $('#txtdisc').val();
      var firmno = $('#txtcontactno').val();
      var firmemail = $('#txtemail').val();
      var firmgst = $('#txtgstin').val();
      var firmpan = $('#txtpan').val();
      var prifix = $('#txtprifix').val();
    //  alert(itemname+","+disc+","+itemrate+","+slscategory+","+slsunit);
      $.ajax({
        url: "firm_backend.php",
        type: "POST",
        data: {
          firmname: firmname,
          firmaddress: firmaddress,
          firmdisc: firmdisc,
          firmno: firmno,
          firmemail: firmemail,
          firmgst: firmgst,                  
          firmpan: firmpan,   
          prifix: prifix             
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