<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="images/SbitLogo.jpg" type="images/x-icon">
    <link rel="stylesheet" type="text/css" href="../CssFiles/navstyle.css">
  <link rel="stylesheet" href="../CssFiles/bootstrap.css">
  <link rel="stylesheet" href="../CssFiles/styles.css">
  <script src="../tocsv.js"></script>
  <link rel="stylesheet" href="../CssFiles/footer.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <style>
      
      th,td{
        font-size: 15px;
      }
  </style>
</head>
<body class="container">
<div class="navbar">
		<ul>
			<li><img src="../images/logo.jpg"  style="margin-left:auto;margin-right: auto;display:block; height:100px;"></li> 
    </ul>
    <a href="#" onclick="download_table_as_csv('registered_candidates');">Download as CSV</a> 
	</div>
  
<?php
    include("config.php");
    global $con;
    $branch=strtoupper($_POST["branch"]);
    $query = $con->prepare("SELECT htno, name, email, branch, mobile, 
    selected_company FROM `users`
    WHERE branch='$branch' AND selected_company != ' ';");
    $query->execute();

    echo "<table id='registered_candidates' class='table table-striped'>
    <tr>
    <th>Hall Ticket Number</th>
    <th>Name</th>
    <th>Email</th>
    <th>Branch</th>
    <th>Mobile</th>
    <th>Selected Company</th>
    </tr>";

    while($row = $query->fetch(PDO::FETCH_ASSOC))
    {
    echo "<tr>";
    echo "<td class='clickable-row'>" . $row['htno'] . "</td>";
    echo "<td class='clickable-row'>" . $row['name'] . "</td>";
    echo "<td class='clickable-row'>" . $row['email'] . "</td>";
    echo "<td class='clickable-row'>" . $row['branch'] . "</td>";
    echo "<td class='clickable-row'>" . $row['mobile'] . "</td>";
    echo "<td class='clickable-row'>" . $row['selected_company'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>