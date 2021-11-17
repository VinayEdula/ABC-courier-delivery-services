<?php
session_start();
require_once("db.php");
$pdo_statement = $pdo_conn->prepare("SELECT * FROM complaint WHERE Compid=?");
$pdo_statement->bindParam(1,$_SESSION['compid'], PDO::PARAM_INT);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<html>
<style>
    body {
        background-image: url(back.jpg);
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
    label {
    color: black;
    
}
</style>
<div>
<body text="white">
 <h2 ALIGN="CENTER">The complaint details updated successfully</h2>
<div align="center">
            <fieldset>
                <table align="center" cellpadding="5" id="xxx">
                    <tr>
                         <td>
                            <label> <b>Complaint ID:</b> </label>
                            <?php echo $result[0]["Compid"]; ?>
                        </td>
                    </tr>
                    <p></p>
                    <tr>
                        <td>
                            <label><b>Complaint Type: </b></label>
                            <?php echo $result[0]["CompType"]; ?>
                        </td>
                    </tr>

                    <tr>
                         <td>
                            <label><b>Complaint Description: </b></label>
                            <?php echo $result[0]['CompDesc']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Solution: </b></label>
                           <?php echo $result[0]["Solution"]; ?>
                        </td>
                       
                    </tr>
                     <tr>
                        <td>
                            <label><b>Complaint Status: </b></label>
                           <?php echo $result[0]['CompStatus']; ?>
                        </td>
                       
                    </tr>
                    <tr>
                         <td>
                            <label><b>Customer ID: </b></label>
                            <?php echo $result[0]["Custid"]; ?>
                        </td>
                    </tr>
      <tr>
        <td>
        <h1></h1>
    </td>
                </table>
            </div>
            </fieldset>
    </div>
    <div class="footer">Designed By Edula Vinay Kumar Reddy</div>
    <br>
</body> </html>
