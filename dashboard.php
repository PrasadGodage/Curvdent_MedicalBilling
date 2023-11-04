<?php
include('header/header.php');
// include('functions.php');
include('config.php');


date_default_timezone_set("Asia/Calcutta");
$today=date('Y-m-d');

?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <!-- <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                    
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Users</h5>
                          <h2 class="mb-3 font-18">
                          <?php
                          //  $usersql="SELECT * FROM `userlogin`";
                            // echo mysqli_num_rows(mysqli_query($con,$usersql));
                            ?>
                          </h2>
                         </div>
                      </div>
                   
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                       
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Running Orders</h5>
                          <h2 class="mb-3 font-18">
                          <?php
                           // $usersql="SELECT * FROM `partydata`";
                            // echo mysqli_num_rows(mysqli_query($con,$usersql));
                            ?>
                          </h2>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                         <img src="assets/img/banner/1.png" alt="">
                       </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Ongoing Orders</h5>
                          <h2 class="mb-3 font-18">
                            
                          <?php
                          //  $usersql="SELECT * FROM `challanrecord` WHERE `date`='$today'";
                            // echo mysqli_num_rows(mysqli_query($con,$usersql));
                            ?>
                          </h2>
                          
                         </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Completed Orders</h5>
                          <h2 class="mb-3 font-18">
                          
                          <?php
                            //$usersql="SELECT * FROM `challanrecord`";
                            // echo mysqli_num_rows(mysqli_query($con,$usersql));
                            ?>

                          </h2>
                         </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        




          <h3>Todays Bills</h3>
     
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

                              $selectmenulist="SELECT * FROM `sales`where `BillDate`='$today'  ORDER BY `sales`.`BillId` DESC";

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
                                        <td><button class="btn btn-primary mr-1" onclick="viewbill('<?php  echo $row['BillNo'] ?>')">View Bill</button><button class="btn btn-danger">X</button></td>
                                                  
                                        
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
                </div>
              </div>
            </div> 
          </div> 
        </section>


        <?php
 include('footers/footer.php');
?>
<script>

  $('#txtdate').change(function() {
    var date = $(this).val();

    getdataforrecipt(date);

    // console.log(date, 'change')
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

 

function getdataforrecipt(reciptdate)
{

}
  </script>