<?php 
include 'Connection.php';

session_start();
if(!isset($_GET['cid']))
{
    $sql = "select customer_id from invo order by customer_id desc limit 1";
    $q1= mysqli_query($conn,$sql);

    $r = mysqli_fetch_array($q1);
    $cid = $r[0];

}
else
{
    $cid= $_GET['cid'];
}

$q1= mysqli_query($conn, "SELECT `invo`.invoice,`invo`.Name,`invo`.total_bil,`invo`.discription,`invo`.net_bill,`invo`.Mobilenumber,`items`.item,`items`.price,`items`.quantity,`items`.total_amount FROM `invo`  LEFT JOIN `items` ON `invo`.customer_id = `items`.customer_id where invo.customer_id='$cid'");


if(!$q1)
    die(mysqli_error($conn));
$data = array();
while($res1 = mysqli_fetch_array($q1))
{
    $data[] = $res1;
}
?>



<html lang="en">

<head>
   
    <title>Form</title>

    <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>PRICE INVOICE</h2><h3 class="pull-right" style="margin-right: 100px;" >#invoice
                    <?php echo $data[0]['invoice'] ?></h3>
    		</div>
    <br>
    		<div class="row">
    			<div class="col-xs-6">
    				<img src="assort_duplicate_finla_logo_export.png" class="img-rounded" style="width: 150px;height: 70px;">
                    <br>

                        042-35303600
    			
    			</div>
    			<div class="col-xs-6">
    				<address>
        			<strong style="margin-left: 200px;"> To:
                    <strong style="margin-left: 20px;"> <?php echo $data[0]['Name'] ?>
                     <br>
                    <strong style="margin-left: 250px;"> <?php echo $data[0]['Mobilenumber'] ?>
                    </strong><br>
    					<br>
    		
    				</address>
    			</div>
    		</div>
    	
    	</div>
    </div>
    <hr style="height:1px; border:none; color:#000; background-color:#000;">
                        <h3 class="panel-title"><strong>Objective: 
 <?php echo $data[0]['discription'] ?>
                        </strong></h3>

    <div class="row">
    	<div class="col-md-12">
        </div>
    		
    			<div class="panel-heading">
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td ><strong>Price</strong></td>
        							<td ><strong>Quantity</strong></td>

                            <td><strong>Total</strong></td>
        							
                                </tr>
    						</thead>
                            <?php foreach($data AS $result){ ?>
                            <tr bgcolor="pink">
                        <td><?php echo $result['item'] ?>
                         </td>
                        <td><?php echo $result['price'] ?>
    </td>
                        <td><?php echo $result['quantity'] ?></td>
                        <td> <?php echo $result['total_amount'] ?>
                    </td>
                   
                        
            </tr>

        <?php } ?>
        <tr>
            <td colspan="2"></td>
         <th>Total_Bill=</th>
        <td> <?php echo $result['total_bil'] ?></td>
                
                                    
                            
                            
    					
    					</table>

                           
                
                        

    				</div>
    			</div>
    
    	</div>
    </div>
</div>
  <br>  
<div class="container-fluid">
                        <br>
<br>
<br>
<br>
<br>
<img src="assort_duplicate_finla_logo_export.png" class="img-rounded" style="margin-left: 200px;width: 100px;height: 70px;">
<div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong style="margin-left: 200px;">Built your stream<br>
                        <br>
                          <p style="margin-left: 200px;">  2, Second Floor, Pakway Plaza
                     <p style="margin-left: 200px;">    Johar Town ,Lahore Pakistan
                        <br>
                      <p style="margin-left: 100px;">   042-35303600
                        </strong>
                    </address>
                </div>
                <div class="col-xs-6">
                    <address>
                    <hr style="margin-right: 500px;">
                        <p style="margin-left: 100px;"> Login :    <?php echo $_SESSION["name"]; ?></p>
                        <p style="margin-left: 100px;">Designation:   <?php echo $_SESSION["desg"];?></p>
      
                    </address>
                </div>
            </div>
        </div>
</body>
</html> 