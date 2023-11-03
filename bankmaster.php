<?php
include('header/header.php');
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Bank Master</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add New Bank</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>#</th>
            <th>Account Name</th>
            <th>Bank Name</th>
            <th>Account No</th>
            <th>IFSC</th>
            <th>Branch</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php

                $selectmenulist="SELECT * FROM `bankmaster` WHERE `Status`='0'";

                $res=mysqli_query($con,$selectmenulist);

                if(mysqli_num_rows($res)>0)
                {
                $num=1;
                        while($row=mysqli_fetch_array($res))
                    {?>
                        <tr>
                        <td><?php echo $num; ?></td>
                        <td><?php echo $row['BankName']; ?></td>
                        <td><?php echo $row['AcName']; ?></td>
                        <td><?php echo $row['AcNo']; ?></td>
                        <td><?php echo $row['IFSC']; ?></td>
                        <td><?php echo $row['BranchName']; ?></td>
                        <td>
                            <button class="btn btn-warning" onclick="getdata(<?php echo $row['id'] ?>)"><i data-feather="edit"></i></button>
                            &nbsp<button class="mt-1 btn btn-danger" onclick="deletedata(<?php echo $row['id']?>)">X</button></td>
                        </tr>
                    <?php 
                    $num++;
                }
                }else{
                echo "<tr>
                        <td colspan='7' align='center'>No Category Found</td>
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
                <label for="">Select Bank Name</label>
                  <select class="form-control" id="slsbank">
                        <option value="State Bank of India">------ Select Bank -----</option>
                        <option value="State Bank of India">State Bank of India</option>
                        <option value="HDFC Bank">HDFC Bank</option>
                        <option value="ICICI Bank">ICICI Bank</option>
                        <option value="Axis Bank">Axis Bank</option>
                        <option value="Kotak Mahindra Bank">Kotak Mahindra Bank</option>
                        <option value="Punjab National Bank">Punjab National Bank</option>
                        <option value="Bank of Baroda">Bank of Baroda</option>
                        <option value="Canara Bank">Canara Bank</option>
                        <option value="Union Bank of India">Union Bank of India</option>
                        <option value="IndusInd Bank">IndusInd Bank</option>
                        <option value="IDBI Bank">IDBI Bank</option>
                        <option value="Yes Bank">Yes Bank</option>
                        <option value="Federal Bank">Federal Bank</option>
                        <option value="Bank of India">Bank of India</option>
                        <option value="Central Bank of India">Central Bank of India</option>
                        <option value="IDFC FIRST Bank">IDFC FIRST Bank</option>
                        <option value="RBL Bank">RBL Bank</option>
                        <option value="South Indian Bank">South Indian Bank</option>
                        <option value="Karur Vysya Bank">Karur Vysya Bank</option>
                        <option value="Bandhan Bank">Bandhan Bank</option>
                        <option value="City Union Bank">City Union Bank</option>
                        <option value="Dhanlaxmi Bank">Dhanlaxmi Bank</option>
                        <option value="Jammu & Kashmir Bank">Jammu & Kashmir Bank</option>
                        <option value="UCO Bank">UCO Bank</option>
                        <option value="Syndicate Bank">Syndicate Bank</option>
                        <option value="Oriental Bank of Commerce">Oriental Bank of Commerce</option>
                        <option value="Andhra Bank">Andhra Bank</option>
                        <option value="Vijaya Bank">Vijaya Bank</option>
                        <option value="Indian Overseas Bank">Indian Overseas Bank</option>
                        <option value="UCO Bank">UCO Bank</option>
                        <option value="Corporation Bank">Corporation Bank</option>
                        <option value="Dena Bank">Dena Bank</option>
                        <option value="Allahabad Bank">Allahabad Bank</option>
                        <option value="United Bank of India">United Bank of India</option>
                        <option value="Indian Bank">Indian Bank</option>
                        <option value="Punjab & Sind Bank">Punjab & Sind Bank</option>
                    </select>
                <label for="">Account Name</label>
                  <input type="text" class="form-control" id="txtacname">
                  <label for="">Account NO</label>
                  <input type="text" class="form-control" id="txtacno">                  
                  <label for="">IFSC</label>
                  <input type="text" class="form-control" onkeyup="getifsccodedata()" id="txtacifsc">
                  <label for="">Branch Name</label>
                  <input type="text" class="form-control" id="txtbranchname" readonly>
                  <label for="">Branch Address</label>
                  <input type="text" class="form-control" id="txtbranchaddress" readonly>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Bank Details </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                <input type="hidden" id="hidden_id">
                <label for="">Select Bank Name</label>
                  <select class="form-control" id="upslsbank">
                        <option value="State Bank of India">------ Select Bank -----</option>
                        <option value="State Bank of India">State Bank of India</option>
                        <option value="HDFC Bank">HDFC Bank</option>
                        <option value="ICICI Bank">ICICI Bank</option>
                        <option value="Axis Bank">Axis Bank</option>
                        <option value="Kotak Mahindra Bank">Kotak Mahindra Bank</option>
                        <option value="Punjab National Bank">Punjab National Bank</option>
                        <option value="Bank of Baroda">Bank of Baroda</option>
                        <option value="Canara Bank">Canara Bank</option>
                        <option value="Union Bank of India">Union Bank of India</option>
                        <option value="IndusInd Bank">IndusInd Bank</option>
                        <option value="IDBI Bank">IDBI Bank</option>
                        <option value="Yes Bank">Yes Bank</option>
                        <option value="Federal Bank">Federal Bank</option>
                        <option value="Bank of India">Bank of India</option>
                        <option value="Central Bank of India">Central Bank of India</option>
                        <option value="IDFC FIRST Bank">IDFC FIRST Bank</option>
                        <option value="RBL Bank">RBL Bank</option>
                        <option value="South Indian Bank">South Indian Bank</option>
                        <option value="Karur Vysya Bank">Karur Vysya Bank</option>
                        <option value="Bandhan Bank">Bandhan Bank</option>
                        <option value="City Union Bank">City Union Bank</option>
                        <option value="Dhanlaxmi Bank">Dhanlaxmi Bank</option>
                        <option value="Jammu & Kashmir Bank">Jammu & Kashmir Bank</option>
                        <option value="UCO Bank">UCO Bank</option>
                        <option value="Syndicate Bank">Syndicate Bank</option>
                        <option value="Oriental Bank of Commerce">Oriental Bank of Commerce</option>
                        <option value="Andhra Bank">Andhra Bank</option>
                        <option value="Vijaya Bank">Vijaya Bank</option>
                        <option value="Indian Overseas Bank">Indian Overseas Bank</option>
                        <option value="UCO Bank">UCO Bank</option>
                        <option value="Corporation Bank">Corporation Bank</option>
                        <option value="Dena Bank">Dena Bank</option>
                        <option value="Allahabad Bank">Allahabad Bank</option>
                        <option value="United Bank of India">United Bank of India</option>
                        <option value="Indian Bank">Indian Bank</option>
                        <option value="Punjab & Sind Bank">Punjab & Sind Bank</option>
                    </select>
                <label for="">Account Name</label>
                  <input type="text" class="form-control" id="uptxtacname">
                  <label for="">Account NO</label>
                  <input type="text" class="form-control" id="uptxtacno">                  
                  <label for="">IFSC</label>
                  <input type="text" class="form-control" onkeyup="getifsccodedataupdate()" id="uptxtacifsc">
                  <label for="">Branch Name</label>
                  <input type="text" class="form-control" id="uptxtbranchname" readonly>
                  <label for="">Branch Address</label>
                  <input type="text" class="form-control" id="uptxtbranchaddress" readonly>
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

    function getifsccodedata(status)
    {
        const ifsccode=$('#txtacifsc').val();
        // console.log(ifsccode);
        if(ifsccode.length==11)
        {
            alert(ifsccode);
            getBranchDetails(ifsccode,"new");
        }
       
    }

    function getifsccodedataupdate(status)
    {
        const ifsccode=$('#uptxtacifsc').val();
        // console.log(ifsccode);
        if(ifsccode.length==11)
        {
            // alert(ifsccode);
            getBranchDetails(ifsccode,"update");
        }
       
    }

    function getBranchDetails(ifsc,status) {
        // alert('hi');
            fetch(`https://ifsc.razorpay.com/${ifsc}`)
                .then(response => response.json())
                .then(data => {
                    if(data) {
                        // const branchDetails = {
                        //     'Branch Name': data.BRANCH,
                        //     'Address': `${data.ADDRESS}, ${data.STATE}, ${data.DISTRICT}, ${data.CITY}, ${data.STATE}`
                        // };
                        // console.log(Here we are with status : +status); 
                       
                           if(status=="new")
                           {
                            $('#txtbranchname').val(data.BRANCH);
                            $('#txtbranchaddress').val(data.ADDRESS);
                           }
                           if(status=="update")
                           {
                           
                            $('#uptxtbranchname').val(data.BRANCH);
                            $('#uptxtbranchaddress').val(data.ADDRESS);
                           }
                       
                    
                    
                    } else {
                        console.log('Invalid IFSC code or service unavailable');
                    }
                })
                .catch(error => console.error('Error:', error));
        }


    function savecate() 
    {
      var bankname = $('#slsbank').val();
      var AccountName = $('#txtacname').val();
      var AccountNo = $('#txtacno').val();
      var AccountIFSC = $('#txtacifsc').val();
      var AccountBranchName = $('#txtbranchname').val();
      var AccountBranchAddress = $('#txtbranchaddress').val();
     
      $.ajax({
        url: "bank_backend.php",
        type: "POST",
        data: {
            bankname: bankname,
            AccountName: AccountName,
            AccountNo: AccountNo,
            AccountIFSC: AccountIFSC,
            AccountBranchName: AccountBranchName,
            AccountBranchAddress: AccountBranchAddress,         
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

      $.post("bank_backend.php", {
        updateid: updateid
      }, function(data, status) {
        // alert("Successfully");
        console.log(data); 
        var Bank = JSON.parse(data);
          // $('#up_categoryname').val(user.name);
           
          
        $('#hidden_id').val(Bank.id);
        $('#upslsbank').val(Bank.BankName);
        $('#uptxtacname').val(Bank.AcName);
        $('#uptxtacno').val(Bank.AcNo);
        $('#uptxtacifsc').val(Bank.IFSC);
        $('#uptxtbranchname').val(Bank.BranchName);
        $('#uptxtbranchaddress').val(Bank.BranchAddress);
       

      });
      $('#updatebankmodel').modal('show');


    }




    function updatecate() {
      var hidden_id = $('#hidden_id').val();
      var upbankname = $('#upslsbank').val();
      var upAccountName = $('#uptxtacname').val();
      var upAccountNo = $('#uptxtacno').val();
      var upAccountIFSC = $('#uptxtacifsc').val();
      var upAccountBranchName = $('#uptxtbranchname').val();
      var upAccountBranchAddress = $('#uptxtbranchaddress').val();
     

     $.ajax({
        url: "bank_backend.php",
        type: "POST",
        data: {
          hidden_id: hidden_id,
            upbankname: upbankname,
            upAccountName: upAccountName,
            upAccountNo: upAccountNo,
            upAccountIFSC: upAccountIFSC,
            upAccountBranchName: upAccountBranchName,
            upAccountBranchAddress: upAccountBranchAddress,  
       
        },
        success: function(data) {
          console.log(data);
          $('#basicModal').modal('hide');
        //   location.reload();
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
                    url: "bank_backend.php",
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