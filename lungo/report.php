<html>
<head>
  <title>Display all Staff records from Database</title>
</head>
<body>

<h2>Staff Details</h2>

<table border="2">
  <tr>
    <td>EmpNo.</td>
    <td>EmpName</td>
    <td>Idtyp</td>
	<td>IdNo</td>
    <td>IssueDate</td>
    <td>Expdate</td>
	<td>POI</td>
  </tr>

<?php

include "Conn.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from idinfo"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['EmpNo']; ?></td>
    <td><?php echo $data['EmpName']; ?></td>
    <td><?php echo $data['Idtyp']; ?></td>
	 <td><?php echo $data['IdNo']; ?></td>
    <td><?php echo $data['IssueDate']; ?></td>
    <td><?php echo $data['Expdate']; ?></td>
	 <td><?php echo $data['POI']; ?></td>
  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($conn); // Close connection ?>

</body>
</html>