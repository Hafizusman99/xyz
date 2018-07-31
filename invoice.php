<html>
<head>
	<title>just for practice</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>

  
</head>
<body>


<form action="invoice.php" method="POST" style="width: 1400px; height: 500px;">

<div class="row">
<div class="col-sm-2 col-md-6 col-lg-4 " >
      
                     <button style="margin-left: 130px;" class="btn btn-success" type="button" onclick="addRow()">Add_Row</button>
                          
                       </div>
                       </div>
                    
           
<div class="row">
	<div class="col-lg-8 col-lg-offset-1 ">
     <div class="table-responsive"> 
  	  <table  class="table table-striped">
	    <div  class="form-group">
		  <thead>
		   <tr class="info">
			  <th>Item</th>
		      <th>price</th>
			  <th>Quantity</th>
	          <td>Total_Amount</td>
	  	   </tr>
	      </thead>
	 
	   <tbody>
		   <tr class="info" >
            <td><input class="form-control input-md" type="text" name="name[]" id="name" ></td>
            <td><input class="form-control input-md" type="number" name="qyt[]" id="num" > </td>
            <td><input class="form-control input-md" type="number" name="price[]" id="num1" ></td>
            <td><input class="form-control input-md" type="text"  id="result" name="total[]"></td>
           </tr>
       </tbody>
       </div>
	  </div>
  	</div>
	   </table>
	</div>

	   
<div class="row">

	
       	<div class="col-sm-6 col-md-4 col-lg-2  ">
         <label style="margin-left: 800px;">Total_Bil:</label>
         <input style="margin-left: 800px;" class="form-control input-md" id="g" name="grand">
         
                 <label style="margin-left: 800px;">  Discount:</label>
                  <input style="margin-left: 800px;"class="form-control input-md" type="text" name="num3" id="num3">
          
                 <label style="margin-left: 800px;" >Text%:</label>
                    <input style="margin-left: 800px;" class="form-control input-md" type="" name="num4" id="num4">
                  
                   <button   style="margin-left: 800px;" class="btn btn-success" type="button" onclick="Total_bill()">Net_bill:
                  </button>	  
                  <input style="margin-left: 800px;" class="form-control input-md" type="" name="num5" id="r">
                   </div>
                 
       
   
</div>
<div class="row">
 <div class="mb-2">
	<input style="margin-left: 850px;" class="btn btn-success" type="Submit" name="submit" value="Save"></td>
      </div>
      </div>   
</form>	
</body>

<script>
 function addnumber() 
 {
   var u = document.getElementById("num").value;
   var s = document.getElementById("num1").value;
   var result= document.getElementById('result');
   var Total_a = u*s;
   document.getElementById("result").innerHTML = Total_a;
 
 }
</script>
<script>
 var gtotal=0;
 function Total_bill() 
 {
 var a= document.getElementById("g").value;
 var b = document.getElementById("num3").value;
 var e = document.getElementById("num4").value;
 var r= document.getElementById('r');
 var c = a-b;
 var d =e/100*(c);
 var h=c+d;
 document.getElementById("r").value = h;
 
 }
 //jquery
  $(document).on('keyup', 'input[name="price[]"]', function(){
 	var price=$(this).val();
 	var Quantity=$(this).parent().parent().find("input[name='qyt[]']").val();
 	var m=price*Quantity;
 	$(this).parent().parent().find("input[name='total[]']").val(m);
 	console.log(Quantity);
 	 gtotal += m;

  $("#g").val(gtotal);
 
 });
</script>



<script type="text/javascript">
	function addRow()
	{
		$("tbody").append('<tr class="info"><td><input  class="form-control input-md" type="text" name="name[]"><td><input  class="form-control input-md" type="number" name="qyt[]"></td></td><td><input class="form-control input-md"  type="number" name="price[]"></td><td><input  class="form-control input-md" type="text" name="total[]"></td></tr>');
	}
</script>
</html>