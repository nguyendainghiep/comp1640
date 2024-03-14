     <!-- Bootstrap -->
     <link rel="stylesheet" type="text/css" href="style.css" />
	 <link rel="stylesheet" type="text/css" href="css/addCategory.css">
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/managementCat.css">


<?php
		include_once("connection.php");
		if (isset($_GET["id"])) {
			$id = $_GET["id"];
			$result = mysqli_query($conn, "SELECT * FROM magazine WHERE MagazineID ='$id'");
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$maga_id = $row['MagazineID'];
			$academicY = $row['acaYear'];
            $closure = $row['ClosureDate'];
            $fclosure = $row['finalClosureDate'];
			$content = $row['contentM'];

		?>


	<div class="container">
     	<div class="coverblock">
		 <a class="backhome" href="index.php">←Back to home</a>
     		<h2 class="h2category">Adding Anual</h2>
			
     		<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
     			<div class="form-group">
     				<label for="txtTen" class="col-sm-4 control-label">Magazine ID(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="text" name="txtID" id="txtID" class="form-control" placeholder="Magazine ID" value='<?php echo $maga_id; ?>'>
     				</div>
     			</div>

                 <div class="form-group">
     				<label for="txtTen" class="col-sm-4 control-label">Academic Year(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="text" name="txtAcademic" id="txtAcademic" class="form-control " placeholder="Academic Year" value='<?php echo $academicY; ?>'>
     				</div>
     			</div>


     			<!-- <div class="form-group">
     				<label for="txtTen" class="col-sm-4 control-label">Magazine Title(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="text" name="txtName" id="txtName" class="form-control " placeholder="Maganize Title" value='<?php echo isset($_POST["txtName"]) ? ($_POST["txtName"]) : ""; ?>'>
     				</div>
     			</div> -->
                
                 <div class="form-group">
     				<label for="txtTen" class="col-sm-4 control-label">Closure Date(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="date" name="txtClosure" id="txtClosure" class="form-control " placeholder="Closure Date" value='<?php echo $closure; ?>'>
     				</div>
     			</div>
         

                 <div class="form-group">
     				<label for="txtTen" class="col-sm-4 control-label">Final Closure Date(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="date" name="txtFClosure" id="txtFClosure" class="form-control " placeholder="Final Closure Date" value='<?php echo $fclosure; ?>'>
     				</div>
     			</div>


     			<div class="form-group">
     				<label for="txtMoTa" class="col-sm-4 control-label">Description(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo $content; ?>'>
     				</div>
     			</div>

     			<div class="form-group">
     				<div class="col-sm-offset-4 col-sm-8">
     					<input class="btnaddCat"  type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new"  style=" background: #F7E4E0;color: #C51162;" />
     					<input class="btnaddCat"  type="button"  class=" btn btn-primary " name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='?page=category_management'" style="background: #F7E4E0;color: #C51162	;"/>

     				</div>
     			</div>
     		</form>
     	</div>
         <?php
			if (isset($_POST["btnUpdate"])) {
				$id = $_POST["txtID"];
				$name = $_POST["txtName"];
				$des = $_POST["txtDes"];
				$err = "";
				if ($name == "") {
					$err .= "<li>Enter Category Name,PLease</li>";
				}
				if ($err != "") {
					echo "<ul>$err</ul>";
				} else {
					$sq = "Select * from category where Cat_ID != '$id' and Cat_Name='$name'";
					$result = mysqli_query($conn, $sq);
					if (mysqli_num_rows($result) == 0) {
						mysqli_query($conn, "UPDATE category SET Cat_Name = '$name', Cat_Des='$des' WHERE Cat_ID ='$id'");
						echo '<meta http-equiv="refresh" content="0;URL=?page=category_management"/>';
					} else {
						echo "<li>Duplicate categogy Name</li>";
					}
				}
			}
			?>


     <?php
		} else {
			echo '<meta http-equiv="refresh" content="0;URL=Category_Management.php"/>';
		}
		?>