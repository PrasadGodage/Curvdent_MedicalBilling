<?php
error_reporting(0);
include('header/header.php');
$today=date("Y-m-d");
if(isset($_POST['importexcel']))
{
    
	$file=$_FILES['doc']['tmp_name'];
	
	$ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
	if($ext=='xlsx'){
		require('PHPExcel/PHPExcel.php');
		require('PHPExcel/PHPExcel/IOFactory.php');
		$today=date("Y-m-d");
		
		$obj=PHPExcel_IOFactory::load($file);
		foreach($obj->getWorksheetIterator() as $sheet){
			$getHighestRow=$sheet->getHighestRow();
			for($i=1;$i<=$getHighestRow;$i++){
				$plant=$sheet->getCellByColumnAndRow(0,$i)->getValue();
				$buyername	=$sheet->getCellByColumnAndRow(1,$i)->getValue();
				$pono=$sheet->getCellByColumnAndRow(2,$i)->getValue();
				$poline=$sheet->getCellByColumnAndRow(3,$i)->getValue();
				$podate=$sheet->getCellByColumnAndRow(4,$i)->getFormattedValue();
				// $podate=new DateTime($pdate);
				$deliverydate=$sheet->getCellByColumnAndRow(5,$i)->getFormattedValue();
				$itemcode=$sheet->getCellByColumnAndRow(6,$i)->getValue();
				$disc=$sheet->getCellByColumnAndRow(7,$i)->getValue();
				$drawingno=$sheet->getCellByColumnAndRow(8,$i)->getValue();
				$basicmaterial=$sheet->getCellByColumnAndRow(9,$i)->getValue();
				$poqty=$sheet->getCellByColumnAndRow(10,$i)->getValue();
				$unitprice=$sheet->getCellByColumnAndRow(11,$i)->getValue();
				if($plant!=''){
          $checksql="SELECT * FROM `openporawdata` WHERE `pono`='$pono' AND `poline`='$poline' AND `poqty`='$poqty' AND `podate`='$podate' AND `deliverydate`='$deliverydate' AND `itemcode`='$itemcode'";
          $checkres=mysqli_query($con,$checksql);
          if(mysqli_num_rows($checkres)>0)
            {

            }else{
              $query="INSERT INTO `openporawdata`(`plant`, `buyername`, `pono`, `poline`, `podate`, `deliverydate`, `itemcode`, `disc`, `drawingno`, `basicmaterial`, `poqty`, `unitprice`, `recorddate`) VALUES 
              ('$plant','$buyername','$pono','$poline','$podate','$deliverydate','$itemcode','$disc','$drawingno','$basicmaterial','$poqty','$unitprice','$today')";
                mysqli_query($con,$query);
            }
                  

				}
			}
		}
	}else{
		echo "Invalid file format";
	}
}
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Import Excel Open PO Excel File</h3>
      <!-- <div class="row justify-content-end">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Import File</button>
      </div> -->
      <h6>Choose file to import </h6>
      <div class="col-12 col-md-6">
        <div class="input-group mb-3">
           <form action="" method="POST" enctype="multipart/form-data">
           <input type="file" name="doc" class="form-control" placeholder="UPload" aria-label="">
            <div class="input-group-append">
                <button class="btn btn-success" name="importexcel" type="submit">Import file</button>
            </div>
           </form>
        </div>
      </div>
      <hr>



      <table class="table table-striped" id="table-2" style="width:100%;">
        <thead>
          <tr>

            <th>No</th>
            <th>Buyer Name</th>
            <th>PO NO</th>
            <th>PO Line</th>
            <th>PO Date</th>
            <th>Del. Date</th>
            <th>Item Code</th>
            <th>QTY</th>
            <th>Unit Price</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `openporawdata`";
// $selectmenulist="SELECT * FROM `openporawdata` where `recorddate`='$today'";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <td><?php echo $num; ?></td>
          <td><?php echo $row['buyername']; ?></td>
          <td><?php echo $row['pono']; ?></td>
          <td><?php echo $row['poline']; ?></td>
          <td><?php echo $row['podate']; ?></td>
          <td><?php echo $row['deliverydate']; ?></td>
          <td><?php echo $row['itemcode']; ?></td>
          <td><?php echo $row['poqty']; ?></td>
          <td><?php echo $row['unitprice']; ?></td>
          <td><button class="btn btn-danger">X</button></td>
          
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
        <td colspan='9' class='text-center'>No Uploaded Data for Today</td>
  </tr>";
}



?>

        
        </tbody>
      </table>
      </div> 
    </div>
  </section>


  <!-- -----------------------------------------------------------------------------------------------------df -->
  <!-- Menu update code here -->
   <!-- model started -->
   <div class="modal fade" id="updatemenumodel" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Menu Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" onclick="updatemenu()">update Menu</button>
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
  $(document).ready( function () {
    // $('#myTable').DataTable({
    //     'columnDefs':[{
    //         'targets':0,
    //          'checkboxes':{
    //             'selectRow':true
    //          }
    //     }]
    // });
} );


    function getstatus(orderid)
    {
        
        var status=$('#orderstatus').val();
        // alert(orderid+"-"+status);
        $.ajax({
        url: "order_backend.php",
        type: "POST",
        data: {
            orderid: orderid,
            status: status,
        },
        success: function(data) {
          console.log(data);
        //   $('#basicModal').modal('hide');
        //  location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );

    }


    function savemenu() {
      // alert('fun');
      // menuname,menuunit,menurate,menucategory,behavior,makingtime,disc
      var menuname = $('#menuname').val();
      var menuunit = $('#menuunit').val();
      var menurate = $('#menurate').val();
      var behavior = $('#behavior').val();
      var menucategory = $('#menucategory').val();
      var makingtime = $('#makingtime').val();
      var disc = $('#disc').val();
      // var menuimage = $('#menuimage').val();

    //    console.log(menuname+"--"+menuunit+"--"+menurate+"--"+behavior+"--"+menucategory+"--"+makingtime+"--"+disc);
      $.ajax({
        url: "menu_backend.php",
        type: "POST",
        data: {
          menuname: menuname,
          menuunit: menuunit,
          menurate: menurate,
          behavior: behavior,
          menucategory: menucategory,
          makingtime: makingtime,
          disc: disc,
          // menuimage:menuimage,
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

      $.post("menu_backend.php", {
        updateid: updateid
      }, function(data, status) {
        // alert("Successfully");
        var menu = JSON.parse(data);
        //   $('#up_categoryname').val(user.name);
            console.log(menu);
           
        $('#hidden_id').val(menu.itemid);
        // $('#upvcname').val(menu.companyname);
        $('#upmenuname').val(menu.itemname);
        $('#upmenuunit').val(menu.unit);
        $('#upmenurate').val(menu.rate);
        $('#upbehavior').val(menu.itembehavior);
        $('#upmenucategory').val(menu.itemcategoryname);
        $('#upmakingtime').val(menu.makingtime);
        $('#updisc').val(menu.itemdisc);

      });
      $('#updatemenumodel').modal('show');


    }




    function updatemenu() {
      var hidden_id = $('#hidden_id').val();
      var upmenuname = $('#upmenuname').val();
      var upmenuunit = $('#upmenuunit').val();
      var upmenurate = $('#upmenurate').val();
      var upbehavior = $('#upbehavior').val();
      var upmenucategory = $('#upmenucategory').val();
      var upmakingtime = $('#upmakingtime').val();
      var updisc = $('#updisc').val();

     console.log(hidden_id+"--"+upmenuname+"--"+upmenuunit+"--"+upmenurate+"--"+upbehavior+"--"+upmenucategory+"--"+upmakingtime+"--"+updisc);
      
     $.ajax({
        url: "menu_backend.php",
        type: "POST",
        data: {
          hidden_id: hidden_id,
          upmenuname: upmenuname,
          upmenuunit: upmenuunit,
          upmenurate: upmenurate,
          upbehavior: upbehavior,
          upmenucategory: upmenucategory,
          upmakingtime: upmakingtime,
          updisc: updisc,
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
    text: "Once deleted, you will not be able to recover this Menu!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "menu_backend.php",
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