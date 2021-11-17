<?php
session_start();
require_once("db.php");
$k=0;
if(isset($_POST['submit'])) 
{ 
$_SESSION['compid']=$_POST['id'];
$stmt = $pdo_conn->prepare('SELECT * FROM complaint WHERE Compid=?');
$stmt->bindParam(1, $_POST['id'], PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$x=$_POST['id'];
if( ! $row)
{
    $k=1;
}
else
{

$stmt = $pdo_conn->prepare('SELECT CompStatus FROM complaint WHERE Compid=?');
$stmt->bindParam(1, $_POST['id'], PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if(strcmp($row['CompStatus'],"Closed")==0){
 $k=2;
}
else{
header("Location: display.php");
}
}

if($k==1)
{
echo ' <script type="text/javascript">';
echo "var jsvar ='$x';";
echo ' alert("Complaint by Compid: "+jsvar+"  not exist ")';  //not showing an alert box.
echo '</script>';
}

if($k==2)
{
echo ' <script type="text/javascript">';
echo "var jsvar ='$x';";
echo ' alert("Complaint by Compid: "+jsvar+"  is already closed, closed complaints can’t be open ")';  //not showing an alert box.
echo '</script>';
}
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Courier Delivery Services</title>
</head>
<body>
    <h2 ALIGN="CENTER">ABC Courier Delivery Services</h2>
    <div align="center">
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
                <table align="center" cellpadding="5">
                    <tr>
                        <td>
                            <label for="id"> <b>Enter Complaint ID:</b> </label>
<input id="id" type="text" name="id" placeholder="Complaint ID" required size="30"> 
                        </td>
                    </tr>
                    <p></p>
                    <tr>
                        <div align="center">
    <td colspan="2"><input name="submit" style="background-color:#ADD8E6 " type="submit" />
                            </td>
                        </div>
                    </tr>

                </table>
            </fieldset>
        </form>
    </div>
    <div class="footer">Designed By Edula Vinay Kumar Reddy</div>
    <br>
</body>
<style>
    body {
        background-image: url(1.jpg);
background-color: #cccccc;
  height: 480px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
    }

    .footer {
        position: fixed;
        text-align: center;
        bottom: 0px;
        width: 100%;
    }

    table input[type="submit"] {
        display: block;
        margin: 0 auto;
    }
</style>
</html>
