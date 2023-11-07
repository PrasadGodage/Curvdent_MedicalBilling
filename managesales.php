<?php
include('header/header.php');
error_reporting(0);
$_SESSION['BillNO']='';
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Bill Details</h3>
      <div class="row justify-content-end">
        <a  class="btn btn-primary" href="sales.php">Create New Sales</a>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="" style="width:100%;">
        <thead>
          <tr>
            <th>id</th>
            <th>Bill NO</th>
            <th>Bill Date</th>
            <th>Bill TO</th>
            <th>Payment Type</th>
            <th>Taxable</th>
            <th>Total Tax</th>
            <th>Net Total</th>
            <th>Remove Bill</th>
          </tr>
        </thead>
        <tbody>
            <?php

            $selectmenulist="SELECT * FROM `sales` ORDER BY `sales`.`BillId` DESC";

            $res=mysqli_query($con,$selectmenulist);

            if(mysqli_num_rows($res)>0)
            {
              $num=1;
                while($row=mysqli_fetch_array($res))
                {?>
                    <tr>
                      <!-- <td><?php //echo $num; ?></td> -->
                      
                      <td><?php echo $row['BillId']; ?></td>
                      <td><?php echo $row['BillNo']; ?></td>
                      <td><?php echo $row['BillDate']; ?></td>
                      <td><?php
                      echo getcustomernameById($con,$row['CustId']);
                        ?></td>
                      <td><?php echo $row['PaymentType']; ?></td>
                      <td><?php echo $row['TaxableTotal']; ?></td>
                      <td><?php echo $row['TotalTax']; ?></td>
                      <td><?php echo $row['NetTotal']; ?></td>
                      <!-- <td><button class="btn btn-primary mr-1" onclick="select()">View Bill</button><button class="btn btn-danger">X</button></td> -->
                      <td><button class="btn btn-primary mr-1" onclick="viewbill('<?php  echo $row['BillNo'] ?>')">View Bill</button>
                      <button class="btn btn-danger" onclick="Deletebill('<?php  echo $row['BillId'] ?>')">X</button></td>
                                
                      
                    </tr>
                <?php 
                $num++;
              }
            }else{
              echo "<tr>
                    <td colspan='9' align='center'>No Component Found</td>
              </tr>";
            }



            ?>

        
        </tbody>
      </table>
    </div>
  </section>
  </div>


  <?php
  include('footers/footer.php');

  function select(){
    echo "The select function is called.";
}
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
    });

    function viewbill(Billno) {
      // alert(Billno);
      // $.session.set("BillNO", Billno);
      // 
        $.ajax({
        url: "Billsales_backend.php",
        type: "POST",
        data: {
          Billno:Billno,                
        },
        success: function(data) {
          console.log(data);
          if(data.trim()==="SET")
          {
            location.href = "BillA4.php";
          }else
          {
            alert('Facing Error in Bill Design')
          }
          
       },
     }
     );
    }

 

    function Deletebill(salesdeleteid)
    {
        // alert(salesdeleteid); 
        
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Bill!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "sales_backend.php",
                    type: "POST",
                    data: {
                      salesdeleteid:salesdeleteid
                    },
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