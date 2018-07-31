<?php 
include 'Connection.php';
if(isset($_POST['submit']))
{
  $cname = $_POST['in'];
  $cell = $_POST['date'];
  $total = $_POST['name8'];
  $discount = $_POST['address'];
  $tax = $_POST['mobileNumber'];
  $net1 = $_POST['subject'];
  $net3 = $_POST['description'];

      $net4 = $_POST['grand'];
      $net5 = $_POST['num3'];
      $net6 = $_POST['num4'];
      $net7 = $_POST['num5'];
      $net9 = $_POST['term'];


$q1= mysqli_query($conn, "INSERT INTO `invo`(invoice, date_a, Name, Address, Mobilenumber, Subject, discription, total_bil, discount, tex, net_bill, term_condition) VALUES ( '$cname','$cell','$total','$discount','$tax','$net1','$net3','$net4','$net5','$net6','$net7','$net9')");

  // $q1 = mysqli_query($conn, "INSERT INTO `customers`(customer_name, customer_cell, total_bill,  discount, tax, net_bill) VALUES('$cname', '$cell', '$total', '$discount', '$tax', '$net')");
 if($q1)
   {
   $customer_id = mysqli_insert_id($conn);
    $item = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['qyt'];
    $subTotal = $_POST['total'];
    foreach($item AS $i=>$product){
      $pr = $price[$i];
      $qty = $quantity[$i];
      $st = $subTotal[$i];

      $q2 = mysqli_query($conn, "INSERT INTO `items`(`customer_id`, `item`, `price`, `quantity`, `total_amount`) VALUES('$customer_id', '$product', '$pr', '$qty', '$st')");
      
      
    
    }
    header("location:recipt.php?cid=".$customer_id);
  }
    
  }
    
?>
















<html lang="en">
<head>
   
    <title>Form</title>

    <!-- /assets/ Bootstrap core CSS -->
     <link href="./css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

            <body class="bg-light">
            <div class="container">
            <div class="py-5 text-center" style="">
            <h2>Invoice Form</h2>
            </div>
 <form method="POST">
              <div class="row justify-content-around" >
                
              



               
                <div class="row" style="margin-left: 80px">
                  <div class="col-md-12"></div>
                 <div class="col-sm-3">
                  <label>Invoice#</label>
                   <input  type="text" class="form-control" name="in" id="invoiceNumber" placeholder="" value="<?= rand()?>"  required>
                    </div>
                    <div>
               <div class="col-sm-3">
                <label>Date</label>
                 <input type="date" class="form-control" name="date" placeholder="" value="" required>  
                  </div>
                   </div>
                  
                      
                      
                        <div class="col-md-3 left " style="margin-left: 250px;">
                         <div class="col-sm-2 col-md-2  col-lg-8">
                          <label for="name">Name</label>
                           <input type="text" class="form-control" name="name8" placeholder="" value="" required>
                            </div>

                  <div class="col-sm-2 col-md-2  col-lg-8">
                    <label for="address">Address</label>
                     <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                      </div>
                       <div class="col-sm-2 col-md-2  col-lg-8">
                        <label for="mobileNumber">Mobile Number</label>
                         <input type="number" class="form-control" name="mobileNumber" placeholder="" required>
                          </div>
                   
                    <div class="col-sm-2 col-md-2  col-lg-8">
                     <label for="subject" >Subject</label>
                      <input type="text" class="form-control" name="subject" placeholder="" required>
                       </div>
                        </div>
                        
                          </div>
                  
                  <div class="row">     
                        <div class="col-md-10 " style="margin-left: 100px;">
                        
                          <hr  class="mb-4">

               
                <div class="mb-2">
                 <label for="description">Description</label>
                  <textarea class="form-control" rows="5" cols="500" name="description"></textarea>
                   </div>

                <hr class="mb-4">
                 
                    <div class="mb-3">
                     <button class="btn btn-success" type="button" onclick="addRow()">Add_Row</button>
                      </div>
                    
                    
     
              <div class="col-mb-3 ">
               <div class="table-responsive"> 
                <table  class="table table-striped myTable">
                 <div  class="form-group">
           
               <thead>
                  <tr class="info">
                    <th>Item</th>
                    <th>price</th>
                    <th>Quantity</th>
                    <td>Total_Amount</td>
                    <td>Delete</td>
                 </tr>
               </thead>  
     
       <tbody>
           <tr class="info" >
            <td><input class="form-control input-md" type="text" name="name[]" id="name" ></td>
            <td><input class="form-control input-md" type="number" name="qyt[]" id="num"  min="0"></td>
            <td><input class="form-control input-md" type="number" name="price[]" id="num1" min="0" ></td>
            <td><input class="form-control input-md" type="text"  id="result" name="total[]"></td>
            <td> <button class="deleteRowButton" type="button">delete</button></td>
           </tr>
       </tbody>
       </div>
    

       </table>
    </div>
    </div>

       


      
            <div class="row">
                  <div class="col-md-8 ">
                   <div class="col-sm-4 col-md-4  col-lg-4 left">
                    <label >Total_Bil:</label>
                     <input class="form-control input-md"  readonly="readonly" type="number" id="g" name="grand">
         
                      <label >  Discount:</label>
                       <input class="form-control input-md" type="number" name="n" id="num3">
          
                      <label  >Text%:</label>
                       <input class="form-control input-md" type="number" name="num4" id="num5">
                  
                   <button    class="btn btn-success" type="button" onclick="Discount();">Net_bill:
                    </button>   
                  <input  class="form-control input-md" readonly="readonly" type="" name="num5" id="r">
                   </div>
                 
       
</div>
</div>







                <div class="mb-3">
                    <label for="termsAndConditions">Terms And Conditions</label>
                    <textarea class="form-control" rows="5" name ="term" id="termsAndConditions"></textarea>
                </div>

                <button  class="btn btn-primary btn-md" name="submit" type="submit">Submit</button>
            
        </div>
    </div>
</form> 
</div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
              <p class="mb-1">&copy; 2017-2018 Company Name</p>
              <ul class="list-inline">
               <li class="list-inline-item"><a href="#">Privacy</a></li>
               <li class="list-inline-item"><a href="#">Terms</a></li>
               <li class="list-inline-item"><a href="#">Support</a></li>
              </ul>
    </footer>
<script>
 $(document).ready(function(){

     $("tbody").on('click','.deleteRowButton',function(){

       $(this).closest('tr').remove();
        calculateGrandTotal();
     });});
   
  $(document).ready(function(){
  $("table.myTable").on("keyup", 'input[name^="price"], input[name^="qyt"]', function (event) {
       calculateRow($(this).closest("tr"));
       calculateGrandTotal();
     });});
   function calculateRow(row) {
   var price = row.find('input[name^="price"]').val();
   console.log(price);
   var qty = row.find('input[name^="qyt"]').val();
   console.log(qty);
   row.find('input[name^="total"]').val((price * qty).toFixed(2));
   console.log(price * qty);
   }
   
   function calculateGrandTotal() {
   var grandTotal = 0;
   $("table.myTable").find('input[name^="total"]').each(function () {
       grandTotal += +$(this).val();
   });

   $(document).find('input[name^="grand"]').val(grandTotal.toFixed(2));
 
   }

   function Discount()
   {
     var bill=document.getElementById('g').value;
     var totalDiscount=document.getElementById('num3').value;
     var totalBill=bill-totalDiscount;
     var tax=document.getElementById('r').value;
     if (tax!=0) {
       var result= (totalBill/100)*tax;
       var res=totalBill+result;
       document.getElementById('r').value=res;
     }
     else{document.getElementById('r').value=totalBill;}
     
    }
</script>

<script type="text/javascript">
    function addRow()
    {
        $("tbody").append('<tr class="info"><td><input  class="form-control input-md" type="text" name="name[]"><td><input  class="form-control input-md" type="number" name="qyt[]"></td></td><td><input class="form-control input-md"  type="number" name="price[]"></td><td><input  class="form-control input-md" type="text" name="total[]">  <td><button class="deleteRowButton" type="button">delete</button></td></td></tr>');
    }
</script>





<!-- Bootstrap core JavaScript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>






