<?php
   include_once "db_connect.php";
   
   $result = mysqli_query($db, "SELECT * FROM pensionInformation");
?>

<!DOCTYPE html>
<html>
    <head>    
        <title>pensioner data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css">


<title>
	<?php if(isset($website)){echo$website;}?>
	
</title>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>

<script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
	
<link href="css/style1.css" rel="stylesheet" type="text/css" media="screen">
    <!-- <link rel="stylesheet" href="style.css"> --> 

        <style>
            .table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin-left: auto;
  margin-right: auto;
}



td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  

}

tr:nth-child(even) {
    background-color: white;
}
        </style>
    </head>

<body>
<div class="container-fluid">
<br>
            <h2 style=" text-align: center;">PENSIONER INFORMATIONS</h2>
            <br>
      
<table class="table"> 
       
        <thead class="thead-dark">
        <tr>
             <th> Emp_No </th>
             <th> Emp_Name </th>
             <th> Pension_type </th>
             <th> Pensioner_Number </th>
             <th> Registered_date </th>
             <th> monthly_contribution </th>
             <th> current_balance </th>    
        </tr>
        </thead>
       

<?php
      $i=0;
      while ($rows = mysqli_fetch_assoc($result))

      {
?>
  <tr>
    <th><?php echo $rows["emp_no"]; ?></th>
    <th><?php echo $rows["emp_name"]; ?></th>
    <th><?php echo $rows["pension_type"]; ?></th>
    <th><?php echo $rows["pension_no"]; ?></th>
    <th><?php echo $rows["registered_date"]; ?></th>
    <th><?php echo $rows["monthly_contribution"]; ?></th>
    <th><?php echo $rows["current_balance"]; ?></th>
  </tr>
<?php
    $i++;  
    }
?>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
 </body>
</html>