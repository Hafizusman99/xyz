<?php 
session_start();
include 'Connection.php';
if(isset($_POST['submit']))
{
$name=$_POST['username'];
$pass=$_POST['password'];


$sql="select * from student where firstname='".$name."'AND password='".$pass."'
limit 1 ";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
 {
  $arr = mysqli_fetch_array($result);
  $_SESSION["id"] = $arr[0];
  $_SESSION["name"] = $arr[1]." ".$arr[2];
  $_SESSION["desg"] = $arr[5]; 
   header('location:main.php');

  }
  else if (mysqli_num_rows($result)==0) {
      echo "incorrect username or password";
  }
  {
    echo mysqli_error($conn);
  }
  header('location:invoiceform.php');
}

  ?>



<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />
      <div class="section"></div>

      <h5 class="indigo-text">Please, login into your account</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text'  id='username' name='username' >
                <label for='text'>User name</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password'  id='password' name="password">
                <label for='password'>Enter your password</label>
              </div>
              <label style='float: right;'>
                                <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
                            </label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='submit' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>

    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>





















