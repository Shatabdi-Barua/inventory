<!DOCTYPE html>
<?php 
     include('include/our_connect.php');
		$sql = 'SELECT *from ((inventory natural join items) natural join lot_details) order by lot_details.Lot_no asc';
	
		$query = mysqli_query($conn, $sql);
		
		if (!$query){
			die('SQL error : '.mysqli_error($conn));
		}
	 ?>
<html>
<head>
	<title>INVENTORY</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/table.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

	<style type="text/css"></style>

</head>
<body>
	<div class="container container-fluid">
		
		<table class="table table-responsive data-table">
			<h1 class="txtgreen in-middle">Inventory Data</h1><br>
			<thead>
				<tr>
					 <th>Lot_no</th> 
					<th>item_id</th>
					<th>name</th>
					<th>Quantity</th>
					 <th>Per unit price(buying)</th>
					<th>Last Update Date</th>
					 <th>Total buying price</th> 
					 <th>Per unit price(selling)</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$total = 0;
					while ($row = mysqli_fetch_array($query)) {
						
				echo '<tr>
				<td>'.$row['Lot_no'].'</td>
				<td>'.$row['Item_id'].'</td>
				<td>'.$row['Name'].'</td>
				<td>'.$row['Quantity'].'</td>
				 <td>'.$row['Per_unit_buying_price'].'</td>
				<td>'.date("d-m-Y", strtotime($row['Last_Update_Date'])).'</td>
				 <td>'.$row['Total_price'].'</td>
			      <td>'.$row['per_unit_selling_price'].'</td>
					</tr>';
					
					$no++;
					}
				?>
			</tbody> 

			
		</table>
		
</body>
</html>