<?php 

include 'Connection.php';
if(isset($_POST['submit']))
{
$name=$_POST['fname'];
$name1=$_POST['surname'];
$name2=$_POST['email'];
$name3=$_POST['phone'];
$name4=$_POST['Email'];
$name5=$_POST['pass'];

$sql="INSERT INTO  `student`( `firstname`, `lastname`, `email`, `phone`, `designation`, `password`) VALUES ('$name', '$name1', '$name2', '$name3', '$name4', '$name5')";

$result = mysqli_query($conn,$sql);

if($result)
  {
   header('location:signin.php');
  }
  else
  {
    echo "failed".sqli_error($result);

  }
}

  ?>


<script type="text/javascript">
  $(document).ready(function() {
  $('select').material_select();
});
</script>

<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
<script src="https://code.jquery.com/jquery-git.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

</head>

<style>
body {
  background: #222;
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://unsplash.it/1200/800/?random');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
  background-fill-mode: rgba(0,0,0,0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
.container {
  background: white;
  padding: 20px 25px;
  border: 5px solid #26a69a;
  width: 550px;
  height: auto;
  box-sizing: border-box;
  position: relative;
}
.col.s6 > .btn {
   width: 100%;
}
.gender-male,.gender-female {
  display: inline-block;
}
.gender-female {
  margin-left: 35px;
}

.container {
  animation: showUp 0.5s cubic-bezier(0.18, 1.3, 1, 1) forwards;
}

@keyframes showUp {
  0% {
    transform: scale(0);
  }
  100% {
    transoform: scale(1);
  }
}
.row {margin-bottom: 10px;}

.ngl {
  position: absolute;
  top: -20px;
  right: -20px;
}

</style>
<body>

<div class="container">

    <div class="row">
      <form class="col s12" id="reg-form" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input  name="fname" type="text" class="validate" required>
            <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s6">
            <input  name="surname" type="text" class="validate" required>
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
             <input name="email"  type="email" class="validate" required>
             <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
           <input   name="phone" type="number" class="validate" minlength="6" required>
           <label for="password">Phone</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
           <input   name="Email" type="text" class="validate" minlength="6" required>
           <label for="text">Designation</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
           <input   name="pass" type="password" class="validate" minlength="6" required>
           <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <a href="signin.php">
          <button type="submit" class="btn btn-success" name="submit" >Submit</button>
        </a>
        </div>
      </form>
   </div>

  </div>
 

</body>
</html>