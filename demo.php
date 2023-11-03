<!DOCTYPE html>
<html lang="en">
<head>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
include('functions.php');
include('config.php');
echo generateBillNumber($con);
echo generateTempBillNumber($con);

?>
</body>

<script>
    function getifsccodedata()
    {
        const ifsccode=$('#ifsccode').val();
        if(ifsccode.length==11)
        {
            // alert(ifsccode);
            getBranchDetails(ifsccode);
        }
       
    }

    function getBranchDetails(ifsc) {
    fetch(`https://ifsc.razorpay.com/${ifsc}`)
        .then(response => response.json())
        .then(data => {
            if(data) {
                const branchDetails = {
                    'Branch Name': data.BRANCH,
                    'Address': `${data.ADDRESS}, ${data.STATE}, ${data.DISTRICT}, ${data.CITY}, ${data.STATE}`
                };
                console.log(branchDetails);
            } else {
                console.log('Invalid IFSC code or service unavailable');
            }
        })
        .catch(error => console.error('Error:', error));
}
</script>
</html>