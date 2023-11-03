<?php
include('header/header.php');
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Customer / Client Master</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add New Customer</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>#</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Mob</th>
            <th>PAN</th>
            <th>Adhar No</th>
            <th>Disc</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php

                $selectmenulist="SELECT * FROM `customermaster` WHERE `Status`='0'";

                $res=mysqli_query($con,$selectmenulist);

                if(mysqli_num_rows($res)>0)
                {
                $num=1;
                        while($row=mysqli_fetch_array($res))
                    {?>
                        <tr>
                        <td><?php echo $num; ?></td>
                        <td><?php echo $row['CustName']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Mobile']; ?></td>
                        <td><?php echo $row['PAN']; ?></td>
                        <td><?php echo $row['Aadhar']; ?></td>
                        <td><?php echo $row['Description']; ?></td>
                        <td>
                            <button class="btn btn-warning" onclick="getdata(<?php echo $row['CustId'] ?>)"><i data-feather="edit"></i></button>
                            &nbsp<button class="mt-1 btn btn-danger" onclick="deletedata(<?php echo $row['CustId']?>)">X</button></td>
                        </tr>
                    <?php 
                    $num++;
                }
                }else{
                echo "<tr>
                        <td colspan='8' align='center'>No Category Found</td>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">                             
                <label for="">Customer Name</label>
                  <input type="text" class="form-control" id="txtcustname">
                  <label for="">Address</label>
                  <textarea name="" class="form-control" id="txtaddress" cols="30" rows="10"></textarea>                
                  <label for="">Mob</label>
                  <input type="number" class="form-control" id="txtmob">
                  <label for="">PAN NO</label>
                  <input type="text" class="form-control" id="txtpan">
                  <label for="">Adhar NO</label>
                  <input type="text" class="form-control" id="txtadhar">
                  <label for="">Discription</label>
                  <textarea name="" class="form-control" id="txtdisc" cols="30" rows="10"></textarea>                     
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
   <div class="modal fade" id="updatebankmodel" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Customer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                <input type="hidden" id="hidden_id">
                <input type="text" class="form-control" id="uptxtcustname">
                  <label for="">Address</label>
                  <textarea name="" class="form-control" id="uptxtaddress" cols="30" rows="10"></textarea>                
                  <label for="">Mob</label>
                  <input type="number" class="form-control" id="uptxtmob">
                  <label for="">PAN NO</label>
                  <input type="text" class="form-control" id="uptxtpan">
                  <label for="">Adhar NO</label>
                  <input type="text" class="form-control" id="uptxtadhar">
                  <label for="">Discription</label>
                  <textarea name="" class="form-control" id="uptxtdisc" cols="30" rows="10"></textarea>   
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
      var custname = $('#txtcustname').val();
      var address = $('#txtaddress').val();
      var mob = $('#txtmob').val();
      var pan = $('#txtpan').val();
      var adhar = $('#txtadhar').val();
      var disc = $('#txtdisc').val();
     
      $.ajax({
        url: "cust_backend.php",
        type: "POST",
        data: {
            custname: custname,
            address: address,
            mob: mob,
            pan: pan,
            adhar: adhar,
            disc: disc,         
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

      $.post("cust_backend.php", {
        updateid: updateid
      }, function(data, status) {
        // alert("Successfully");
        console.log(data); 
        var Customer = JSON.parse(data);
          // $('#up_categoryname').val(user.name);
           
          
        $('#hidden_id').val(Customer.CustId);
        $('#uptxtcustname').val(Customer.CustName);
        $('#uptxtaddress').val(Customer.Address);
        $('#uptxtmob').val(Customer.Mobile);
        $('#uptxtpan').val(Customer.PAN);
        $('#uptxtadhar').val(Customer.Aadhar);
        $('#uptxtdisc').val(Customer.Description);
     

      });
      $('#updatebankmodel').modal('show');


    }




    function updatecate() {
      var hidden_id = $('#hidden_id').val();
      var upcustname = $('#uptxtcustname').val();
      var upaddress = $('#uptxtaddress').val();
      var upmob = $('#uptxtmob').val();
      var uppan = $('#uptxtpan').val();
      var upadhar = $('#uptxtadhar').val();
      var updisc = $('#uptxtdisc').val();

     $.ajax({
        url: "cust_backend.php",
        type: "POST",
        data: {
            hidden_id: hidden_id,
            upcustname: upcustname,
            upaddress: upaddress,
            upmob: upmob,
            uppan: uppan,
            upadhar: upadhar,
            updisc: updisc,  
       
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
    text: "Once deleted, you will not be able to recover this Customer!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "cust_backend.php",
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