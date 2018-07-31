
<?php 
include 'Connection.php';


$q1= mysqli_query($conn, "SELECT * FROM `invo`");


     
?>
<?php include 'dash.php';
?>



<html lang="en">

<head>
   
    <title>Form</title>

  <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  
</head>

<body>
  
<div class="container-fluid">

    
 

      <table class="table" id="myTable">

        <thead>
          <tr>
          <th name="id">#invoice </th>
          <th>name</th>
          <th>Mobile_Number</th>
          <th>Addres</th>
          <th>status</th>
            <th>View</th>
            <th>Action</th>
        </tr>
          <?php while($result = mysqli_fetch_array($q1)){ ?>
    <tr bgcolor="pink">
          <td><?php echo $result['invoice'] ?>
             </td>
            <td><?php echo $result['Name'] ?>
  </td>
            <td><?php echo $result['Mobilenumber'] ?>
          </td>
            <td><?php echo $result['Address'] ?>
            </td> 
            <td><?php echo $result['Subject'] ?>
        </td>
          
<td>
            <a style="border-radius: 50%;" class="btn btn-info" href=" <?php echo 'recipt.php?cid='.$result['customer_id'] ?>">view</a>
          </td>
          <td> 
              <a style="border-radius: 50%;" class="btn btn-info" href=" <?php echo 'update.php?cid='.$result['customer_id'] ?>"">Edit</a>
          </td>
          <td> 
              <a style="border-radius: 50%;"  class="btn btn-info"href=" <?php echo 'invoiceform.php?cid='.$result['customer_id'] ?>"">Delete</a>
          </tr>
          <?php } ?>
        
        </thead>
        
      </table>
      
  
  </div>
</div>
</div>
</body>


</html>
<script type="text/javascript">

$(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>