<!DOCTYPE html>
<?php
require 'connection.php';
require 'core.php';
//session_destroy();
//$status=1;
if(loggedin()){
  header('Location: yearbook.php');
}
if(!isset($_SESSION['number'])){
  $status=NULL;
}
else{
  /*$temp=$_SESSION['number'];
  $query="SELECT registered FROM users WHERE contact='".$temp."'";
  if(mysqli_fetch_assoc(mysqli_query($link,$query))['registered']==1)
    $status=2;
  else {*/
    $status=1;
  //}
}

if(isset($_POST['login'])){
  if(!isset($_SESSION['number'])){
          $name=$_POST['name'];
          $pass=$_POST['pass'];
          $query="SELECT hash,registered FROM users WHERE contact='".mysqli_real_escape_string($link,$name)."'";
          $result=mysqli_query($link,$query);
          $data=mysqli_fetch_assoc($result);
          if(mysqli_num_rows($result)==0){
            echo "No Matching records";
          }
          else if($data['registered']==0){
            echo "Not registered";
          }
          else{
            if(password_verify($pass,$data['hash'])){
              $_SESSION['login_user']=$name;
              header('Location: yearbook.php');
            }
            else{
              echo "Wrong password";
            }
          }
        }
        else{
          echo 'Not allowed';
        }
}
if(isset($_POST['getotp'])){
  if(isset($_SESSION['number'])){
    //if($status==Null){
      $status=1;
    /*}
    else {
      $status=2;
    }*/
  }
  else{
  $temp=$_POST['number'];
  $query="SELECT registered FROM users WHERE contact='".mysqli_real_escape_string($link,$temp)."'";
  $result=mysqli_query($link,$query);
  if(mysqli_num_rows($result)>0){
    $_SESSION['number']=$_POST['number'];
    if(mysqli_fetch_assoc($result)['registered']==0){
      $choice="QWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm134526789";
      $tosend=substr(str_shuffle($choice),0,5);
      $query="UPDATE users SET otp='".md5($tosend)."', otp_valid=1 WHERE contact='".$temp."'";
      //$query="UPDATE users SET otp='".$tosend."', otp_valid=1 WHERE contact='".$temp."'";
      if(!mysqli_query($link,$query)){
        echo "error in updating";}
        $urlresource="http://api.msg91.com/api/sendhttp.php?country=91&sender=HBTUConnect&route=4&mobiles=91".$temp."&authkey=238040AEdP4UU9b5b9f7de0&message=Your OTP is:".$tosend;
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL =>$urlresource,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "Error sending OTP";
          $query="UPDATE users SET otp_valid=0 WHERE contact='".$temp."'";
          $_SESSION['number']=NULL;
          mysqli_query($link,$query);
        } else{
        $status=1;
      }
    //  $status=1;
    }
    else{
      echo "Already registered";
    }
  }
  else{
    echo "No records found";
  }}
}

if(isset($_POST['verify_otp'])){
  if(!isset($_SESSION['number'])){
      $status=NULL;
  }
  else{
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];
    $otp=md5($_POST['otp']);
    //$otp=$_POST['otp'];
    $temp=$_SESSION['number'];
    $query="SELECT otp,otp_valid from users WHERE contact='".$temp."'";
    $result=mysqli_query($link,$query);
    $res=mysqli_fetch_assoc($result);
        if($pass==$pass2){
            if($res['otp']==$otp&&$res['otp_valid']==1){
              $hash=password_hash($pass, PASSWORD_DEFAULT);
              $query="UPDATE users SET registered=1, otp_valid=0, hash='".$hash."' WHERE contact='".$temp."'";
              mysqli_query($link,$query);
              $status=NULL;
              $_SESSION['number']=NULL;
            }
            else{
              echo "Wrong OTP!";
              $query="UPDATE users SET otp_valid=0 WHERE contact='".$temp."'";
              mysqli_query($link,$query);
              $_SESSION['number']=NULL;
              header('Location: index.php');
            }
          }
          else{
            echo "Password Mismatch";
          }
  }
}

/*if(isset($_POST['save'])){
  if(!isset($_SESSION['number'])){
    $status=NULL;
  }
  else if($status==1){
    $status=1;
  }
  else{
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];
    if($pass==$pass2){
      $temp=$_SESSION['number'];
      $hash=password_hash($pass, PASSWORD_DEFAULT);
      $query="UPDATE users SET username='".mysqli_real_escape_string($link,$first_name)."',
      lastname='".mysqli_real_escape_string($link,$last_name)."',
      email='".mysqli_real_escape_string($link,$email)."',
      hash='".$hash."' WHERE contact='".$temp."'";
      if(mysqli_query($link,$query)){
        $_SESSION['number']=NULL;
        $status=NULL;
        echo "success";
      }
      else{
        echo "error";
      }
    }
    else{
      echo "Password mis-match";
    }
  }
}*/

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blank</title>
    <link rel="stylesheet" href="static/css/bootstrap.css">
    <link rel="stylesheet" href="static/css/index.css">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark navi_border">
    <a class="navbar-brand branding">Yearbook</a>
    <form class="form-inline" action="index.php"  method="POST">
      <div class="input-group mr-sm-2" >
        <div class="input-group-prepend">
          <div class="input-group-text confinement"><img src="static/img/user.png" class="img_confinement"></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="name" placeholder="Registered Mobile no." required>
      </div>
      <div class="input-group mr-sm-2" >
        <div class="input-group-prepend">
          <div class="input-group-text confinement"><img src="static/img/pass.png" class="img_confinement"></div>
        </div>
        <input type="password" class="form-control" id="inlineFormInputGroupUsername2" name="pass" placeholder="Password" required>
      </div>
      <button class="btn btn-outline-success my-2 my-sm-0" name="login" type="submit">Login</button>
    </form>
  </nav>
<br>
  <div class="container con_mar" >
  	<div class="row">
  		<div class="col"></div>
  		<div class="col"></div>
  		<div class="col sign_up" >
  		<div class="container con_sign" ><br>
  		<h1 class="a">Sign Up</h1>
  		<br>

      <?php
        if(!isset($status)){
      ?>
          		<form action="index.php" method="POST">
                <div class="input-group mb-2 mr-sm-2">
                  <div class="input-group-prepend" >
                    <div class="input-group-text" id="pretext">+91</div>
                  </div>
                <input type="text" class="form-control" id="inline" placeholder="Enter Registered Mobile No" name="number" required>
                </div>
                <br>
                <div class= "div-button" style="text-align: center;">
                    <input type="submit" class="btn btn-success btn_get_otp" id="get_otp" name="getotp" value="Get OTP">
                </div>
              </form><br><br>
      <?php
        }
        else{
      ?>
        <form class="" action="index.php" method="post">
          <input type="text" class="form-control" name="otp" placeholder="Enter OTP here">
          <br>
          <input type="password" class="form-control" name="pass" placeholder="Password" required>
          <br>
          <input type="password" class="form-control" name="pass2" placeholder="Confirm Password" required><br>
                    <div class= "div-button" style="text-align: center;">
          <input type="submit" class="btn btn-success" name="verify_otp" value="Verify">
        </div>
      </form><br><br>
      <?php }
        //else if(isset($status)&&$status==2){
       ?>
      <!-- <form action="index.php" method="POST">
          <br>

          <input type="text" class="form-control" name="first_name" placeholder="First Name">

          <br>
          <input type="text" class="form-control" name="last_name" placeholder="Last Name">
          <br>
          <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
          <br>
          <input type="password" class="form-control" name="pass" placeholder="Password" required>
          <br>
          <input type="password" class="form-control" name="pass2" placeholder="Confirm Password" required><br>
            <div class= "div-button" style="text-align: center;">
          <input type="submit" class="btn btn-success" name="save" value="Save"></div></form><br>-->
     <?php// } ?>
  		</div>
  	 </div>
    </div>

  <script type="text/javascript" src="static/js/bootstrap.js"></script>
  <script type="text/javascript" src="static/js/index.js"></script>
  </body>
</html>
