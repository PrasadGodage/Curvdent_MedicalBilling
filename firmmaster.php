<?php
include('header/header.php');

 //Set session variables.
  // $_SESSION["favcolor"] = "green";
  // $_SESSION["FirmId"] =$num;
  //  echo $num;

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

                <!-- <td> -->
                    
                    <button class="btn btn-success" onclick="openLogoModal(<?php echo $row['FirmId']; ?>)" id="uploadLogoButton">Upload Logo</button>
                      </td>

                  <!-- </td> -->
      <?php }else{ 
                echo '<img src="'.$row['LogoAddress'].'" width="50" height="50" onclick="openLogoModal('.$row['FirmId'].')">';
                // echo $row['LogoAddress'];
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Register New Firm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- <form action=""> -->
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
                <!-- </form> -->
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="saveitem()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->

  <!-- model started -->
  <div class="modal fade" id="Updateitemmodel" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Firm Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <!-- <label for="">Item Code</label> -->
                  <input type="hidden" class="form-control" id="hiddden_id"> 
                  <label for="">Firm Name</label>
                  <input type="text" class="form-control" id="uptxtfirmname">
                  <label for="">Address</label>
                  <textarea name="" id="uptxtaddress" cols="30" rows="10" class="form-control"></textarea>
                  <label for="">Discription</label>
                  <textarea name="" id="uptxtdisc" cols="30" rows="10" class="form-control"></textarea>                
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="">Contact No</label>
                            <input type="text" class="form-control" id="uptxtcontactno">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="uptxtemail">
                        </div>
                    </div>
                  <div class="form-row mt-2">
                        <div class="form-group col-md-6">
                            <label for="">GSTIN</label>
                            <input type="text" class="form-control" id="uptxtgstin">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">PAN</label>
                            <input type="text" class="form-control" id="uptxtpan">
                        </div>
                    </div>
                    <label for="">Bill Prefix</label>
                  <input type="text" class="form-control" id="uptxtprifix">
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="updatecate()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->


  <div class="modal fade" id="logoModal" tabindex="-1" role="dialog" aria-labelledby="logoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoModalLabel">Upload Logo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (isset($_GET['error'])): ?>
                    <p><?php echo $_GET['error']; ?></p>
                <?php endif; ?>

                <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
                <form id="logoUploadForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="logohidden_id" name='FirmId'> 
                <label for="">Choose New Logo</label>
                    <input type="file" class='form-control' name="uploadFile" id="uploadFile">
                    <input type="submit"  class='mt-2 btn btn-primary form-control' name="submit" value="Upload Image">
                </form>
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
      $('#logoUploadForm').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);

        $.ajax({
            url: 'upload.php', // Replace with the URL that handles the file upload
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
              console.log(data);
              location.reload();
                // $('#message').html(data);
            }
        });
    });
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

      $.post("firm_backend.php", {
        updateid: updateid
      }, function(data, status) {
        // alert("Successfully");
        var Firmdata = JSON.parse(data);
        console.log(Firmdata);
        $('#hiddden_id').val(updateid);
        $('#uptxtfirmname').val(Firmdata.FirmName);
        $('#uptxtaddress').val(Firmdata.FirmAddress);
        $('#uptxtdisc').val(Firmdata.FirmDisc);
        $('#uptxtcontactno').val(Firmdata.FirmNo);
        $('#uptxtemail').val(Firmdata.FirmEmail);
        $('#uptxtgstin').val(Firmdata.FirmGst);
        $('#uptxtpan').val(Firmdata.FirmPAN);
        $('#uptxtprifix').val(Firmdata.prefix);       

      });
      $('#Updateitemmodel').modal('show');


    }

    function updatecate() {
      // alert('updauingthi the file');
      var hidden_id = $('#hiddden_id').val();
      var upfirmname = $('#uptxtfirmname').val();
      var upfirmaddress = $('#uptxtaddress').val();
      var upfirmdisc = $('#uptxtdisc').val();
      var upfirmno = $('#uptxtcontactno').val();
      var upfirmemail = $('#uptxtemail').val();
      var upfirmgst = $('#uptxtgstin').val();
      var upfirmpan = $('#uptxtpan').val();
      var upprifix = $('#uptxtprifix').val();
     
// alert(hidden_id+"-"+upfirmname+"-"+upfirmaddress+"-"+upfirmdisc+"-"+upfirmno+"-"+upfirmemail+"-"+upfirmgst+"-"+upfirmpan+"-"+upprifix);
     $.ajax({
        url: "firm_backend.php",
        type: "POST",
        data: {
          hidden_id: hidden_id,
          upfirmname: upfirmname,
          upfirmaddress: upfirmaddress,
          upfirmdisc: upfirmdisc,
          upfirmno: upfirmno,
          upfirmemail: upfirmemail,
          upfirmgst: upfirmgst,                  
          upfirmpan: upfirmpan,   
          upprifix: upprifix   
        },
        success: function(data) {
          console.log(data);
          location.reload();
        },
      });
    }


    function deletedata(deleteid)
    {
            
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this Firm!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {

                $.ajax({
                              url: "firm_backend.php",
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

  function openLogoModal(firmId) 
  {

    $('#logohidden_id').val(firmId);
    $('#logoModal').modal('show');

  }



</script>