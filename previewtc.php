<?php
session_start();
include('config.php');
include('functions.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TC Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        table{
            font-size: 10px;
        }
    </style>
  </head>
  <body>
   
  <!-- <div class="row">
    <div class="col-3"><h1>LOGO</h1></div>
    <div class="col"><h4>YUGA ENGINEERING</h4> <br> 
    <p style="font-size:10px">
    S.No 77/5, Behind Vishnumalti, Ind. Estate, Shivane Pune: 411 023.<br>Mob. no. 09850997344 Email id: yugaengineering@gmail.com
    </p></div>
    <div class="col-3"> IMage Will Be Here</div>
  </div> -->


<table class="table table-bordered"> 
    <tr>
        <td rowspan="2" width="100px" style="padding-top:25px">
            <img src="images/logo.jpg" height="100px" width="100px" alt="">
        </td>
        <td  style="text-align:center"><h4>YUGA ENGINEERING</h4> <br> 
    <p style="font-size:12px; margin-top: -13px;">
        S.No 77/5, Behind Vishnumalti, Ind. Estate, Shivane Pune: 411 023.<br>Mob. no. 09850997344 Email id: yugaengineering@gmail.com
    </p></td>
        <td rowspan="2" width="100px"  style="padding-top:35px">
            <img src="images/Lsdata.jpg"  height="80px" width="150px" alt="">
        </td>
    </tr>

        <tr>
            <td style="text-align:center"> <span style="font-size: 13px; font-weight:bold">TEST CERTIFICATE</span>(AS PER EN 10204 : 3.1)</td>
        </tr>

    <tr>
        <td colspan="3">
            <table class="table table-bordered"> 
           
                <tr>
                    <td><b>CUSTOMER</b></td>
                    <td>YUGA ENGINEERING</td>
                    <td>INVOICE NO : G-0495/22-23</td>
                    <td>DATE :- 20/10/2022</td>
                </tr>
                <tr>
                    <td><b>ITEM DESCRIPTION</b></td>
                    <td>STUD BOLT</td>
                    <td colspan="2"> TC NO. :- YE-2022/D205</td>
                </tr>
                <tr>
                    <td><b>P.O. NO. / DATE</b></td>
                    <td colspan="3">4506111071 / DTD. 04/07/2022</td>
                </tr>
               
            </table>
        </td>
    </tr>


    <tr>      
       <td colspan="4">
       <H6><B>( A ) ORDER STATUS</B></H6>
       <table class="table table-bordered"> 
            <tr>
                <th>PO.SR <br> SR.NO</th>
                <th>STUD BOLT</th>
                <th>ITEM CODE</th>
                <th>ITEM NO</th>
                <th>DRG NO.</th>
                <th>TC NO.<br> FOR STUD</th>
                <th>QTY</th>
            </tr>
            <tr>
                <td>1</td>
                <td>M10 X 55 LG</td>
                <td>IN004813</td>
                <td>270</td>
                <td>ZN 1053</td>
                <td>1218</td>
                <td>500</td>
            </tr>
        </table>
       </td>
    </tr>
    <tr>
        <td colspan="4">
            <h6 style="font-size : 13px"><b>( B ) CHEMICAL COMPOSITION & MECHANICAL PROPERTIES FOR  STUD BOLTS AS PER IS 1367 CL 6.8</b></h6>
        </td>
    </tr>
    <tr>
        <td colspan="4">
         <table class="table table-bordered"> 
         <?php 
            echo getobservactiontable($con,"YR9723");
            ?>
         </table>
        </td>
    </tr>

    <tr>
        <td colspan="4"> C) Stud Bolt is mfg. as per Specification  : Satisfactory </td> </tr>
        <tr>
        <td colspan="4"> D) Surface Finish:  Satisfactory</td></tr>
        <tr>
        <td colspan="4"> E) Dimensional & Visual inspection - Satisfactory. </td></tr>
        <tr>
        <td colspan="4"> F) Manufacturer's Brand : " YUGA " & Marking " Y' 6.8 </td></tr>
        <tr>
        <td colspan="4">We certify that the above results confirm to the required specification.Stud Bolt are as per IS 1367 CL 6.8</td>
    </tr>



    <tr>
        <td>
            <table>
                <tr>
                    <td colspan="4">
                        For Yuga Engineering
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</table>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>