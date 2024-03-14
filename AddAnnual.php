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
		if (isset($_POST["btnAdd"])) {
			$id = $_POST["txtID"];
            $academic =$_POST["txtAcademic"];
			// $name = $_POST["txtName"];
            $closure =$_POST["txtClosure"];
            $Fclosure = $_POST["txtFClosure"];
			$des = $_POST["txtDes"];
			$err = "";
			if ($id == "") {
				$err .= "<li>Enter Magazine ID,please</li>";
			}
			if ($academic == "") {
				$err .= "<li>Enter academic Name,please</li>";
			}
			if ($err != "") {
				echo "<ul>$err</ul>";
			} else {
				$id = htmlspecialchars(mysqli_real_escape_string($conn,$id));
                $academic = htmlspecialchars(mysqli_real_escape_string($conn,$academic));
                // $name = htmlspecialchars(mysqli_real_escape_string($conn,$name));
                $closure = htmlspecialchars(mysqli_real_escape_string($conn,$closure));
                $Fclosure = htmlspecialchars(mysqli_real_escape_string($conn,$Fclosure));
				$des = htmlspecialchars(mysqli_real_escape_string($conn,$des));

				$sq = "Select * from magazine where magazineID ='$id' or acaYear='$name'";
				$result = mysqli_query($conn, $sq);
				if (mysqli_num_rows($result) == 0) {
					mysqli_query($conn, "INSERT INTO magazine (magazineID, acaYear, closureDate, finalClosureDate, contentM ) VALUES ('$id','$academic', '$closure', '$Fclosure','$des')");
					echo '<meta http-equiv="refresh" content="0;URL=?page=AnnualUManagement"/>';
				} else {
					echo "<li>Duplicate magazineID or acaYear</li>";
				}
			}
		}
		?>


	<div class="container">
     	<div class="coverblock">
		 <a class="backhome" href="index.php">←Back to home</a>
     		<h2 class="h2category">Adding Anual</h2>
			
     		<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
     			<div class="form-group">
     				<label for="txtTen" class="col-sm-4 control-label">Magazine ID(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="text" name="txtID" id="txtID" class="form-control" placeholder="Magazine ID" value='<?php echo isset($_POST["txtID"]) ? ($_POST["txtID"]) : ""; ?>'>
     				</div>
     			</div>

                 <div class="form-group">
     				<label for="txtTen" class="col-sm-4 control-label">Academic Year(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="text" name="txtAcademic" id="txtAcademic" class="form-control " placeholder="Academic Year" value='<?php echo isset($_POST["txtAcademic"]) ? ($_POST["txtAcademic"]) : ""; ?>'>
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
     					<input class="inputext" type="date" name="txtClosure" id="txtClosure" class="form-control " placeholder="Closure Date" value='<?php echo isset($_POST["txtClosure"]) ? ($_POST["txtClosure"]) : ""; ?>'>
     				</div>
     			</div>
         

                 <div class="form-group">
     				<label for="txtTen" class="col-sm-4 control-label">Final Closure Date(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="date" name="txtFClosure" id="txtFClosure" class="form-control " placeholder="Final Closure Date" value='<?php echo isset($_POST["txtFClosure"]) ? ($_POST["txtFClosure"]) : ""; ?>'>
     				</div>
     			</div>


     			<div class="form-group">
     				<label for="txtMoTa" class="col-sm-4 control-label">Description(*): </label>
     				<div class="col-sm-8">
     					<input class="inputext" type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDes"]) ? ($_POST["txtDes"]) : ""; ?>'>
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
     </div>