<?php
require_once ("conek.php");
$username = "";
$password = "";
$usererr = "";
$passerr = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['Username'];
    $query = "SELECT * FROM oyi WHERE Username = '$username'";
    $result = $koneksi->query($query);
    $row = $result->fetch_assoc();
    if(count($row)==0){
        $usererr = "AKUN TIDAK DITEMUKAN!!";
    }else{
        if($row['password']==$_POST['password']){
            header("Location: bps.php");
        }else{
            $passerr = "password salah!!!";
        }
    }
}
$user="";
$pass="";
$usereror="";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST['Username'];
    $query = "SELECT * FROM oyi WHERE Username = '$user'";
    $result = $koneksi->query($query);
    $row = $result->fetch_assoc();
    if ($row['Username'] != ""){
        $usereror = "Username Kejupuk";
    }else{
        $user = $_POST ['Username'];
        $pass = $_POST ['Password'];
        $query = "insert into oyi (Username,Password) values ('$user','$pass')";
        $koneksi->query($query);
        header("Location: Login.php");
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css.css">
    <title>Login-Register</title>
</head>
<body>
<div class="sidenav">
         <div class="login-main-text">
            <h2>BPS</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">

               <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" value = "<?php echo $username;?>" /></td>
                     <td><p><?php echo $usererr; ?></p></td>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="Password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  <td><p><?php echo $passerr; ?></p></td>
                  <button type="submit" class="btn btn-secondary">Register</button>
                  <td><p><?php echo $passerr; ?></p></td>
               </form>
            </div>
         </div>
      </div>
</body>
</html>