<?php
session_start();
require_once("db.php");
if(!empty($_POST["save_record"])) {
$sql="UPDATE complaint SET Solution=?, CompStatus=? WHERE Compid=?";
$pdo_statement=$pdo_conn->prepare($sql);
$pdo_statement->execute([$_POST["sol"],$_POST["rad"], $_SESSION['compid']]);
if($pdo_statement) {
	header("Location: success.php"); }
}
$pdo_statement = $pdo_conn->prepare("SELECT * FROM complaint WHERE Compid=?");
	$pdo_statement->bindParam(1,$_SESSION['compid'], PDO::PARAM_INT);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<html>
<head>
<title>Update Page</title>
<style>
	input.input-box,textarea{ background: LightGrey; width:300px;padding:10px;}
body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;
width:615px;font-family:arial;letter-spacing:1px;line-height:20px;
background-image: url(2.jpg);
background-color: #cccccc;
  height: 480px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
   text-align: center;


}
.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
.frm-add {border: #c3bebe 1px solid;
    padding: 30px;}
.demo-form-heading {margin-top:0px;font-weight: 500;}	
.demo-form-row{margin-top:20px;}
.demo-form-field{width:300px;padding:10px;}
.demo-form-submit{color:#FFF;background-color:#414444;padding:10px 50px;border:0px;cursor:pointer;

}
</style>
</head>
<body>
<div style="margin:20px 0px;text-align:right;"><a href="index.php" class="button_link">Back to Home</a></div>
<div class="frm-add">
<h1 class="demo-form-heading">Update Complaint</h1>
<form name="frmAdd" action="" method="POST" onsubmit="return validateForm()">
  <div class="demo-form-row">
	  <label><b>Complaint ID </b></label><br>
<input class="input-box" type="text" name="post_title" class="demo-form-field" value="<?php echo $result[0]["Compid"]; ?>" readonly  />
  </div>

<div class="demo-form-row">
	  <label><b>Complaint Type </b></label><br>
<input class="input-box" type="text" name="post_title" class="demo-form-field" value="<?php echo $result[0]["CompType"]; ?>" readonly  />
  </div>

  <div class="demo-form-row">
	  <label><b>Complaint Description </b></label><br>
<textarea class="input-box" name="description" class="demo-form-field" rows="5" readonly ><?php echo $result[0]['CompDesc']; ?></textarea>
  </div>

<div class="demo-form-row">
	  <label><b>Solution </b></label><br>
<input type="text" name="sol" class="demo-form-field" value="<?php echo $result[0]["Solution"]; ?>" required  />
  </div>
<div class="demo-form-row">
<p><b>Complaint Status</b></p>

New
	 <input type="radio" name="rad" value="New" <?php if($result[0]['CompStatus']=="New"){ echo "checked";}?>/>

Pending
	    <input type="radio" name="rad" value="Pending" <?php if($result[0]['CompStatus']=="Pending"){ echo "checked";}?>/>

	    

Closed
	    <input type="radio" name="rad" value="Closed" <?php if($result[0]['CompStatus']=="Closed"){ echo "checked";}?>/>
  <br>  
</div>
<div class="demo-form-row">
	  <label><b>Customer ID </b></label><br>
<input class="input-box" type="text" name="post_title" class="demo-form-field" value="<?php echo $result[0]["Custid"]; ?>" readonly  />
  </div>


  <div class="demo-form-row">
	  <input name="save_record" type="submit" value="Update" class="demo-form-submit">
  </div>
  </form>
</div>
</body>

<script>
function validateForm() {
  var x = document.forms["frmAdd"]["sol"].value;
  if (x.length<=50) {
    alert("Solution length should be minimum 50");
    return false;
  }
}
</script>
</html>