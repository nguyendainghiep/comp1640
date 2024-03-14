
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/managementCat.css">



<link rel="stylesheet" type="text/css" href="style.css"/>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<div class="container">
    <div class="coverblock">
<form name="frm" method="post" action="">
    <a class="backhome" href="index.php">←Back to home</a>
<h1 class="h1manaCat">Annual University Magazine Management </h1>

<script language="javascript">
        function deleteConfirm(){
                if(confirm("Are you sure to delete!"))
                    {
                        return true;
                    }
                else{
                    return false;
                }
            }
             </script>
             <?php
                include_once ("connection.php");
                if(isset($_GET["function"])=="del"){
                    if(isset($_GET["id"])){
                        $id =$_GET["id"];
                        mysqli_query($conn,"DELETE FROM magazine WHERE magazineID ='$id'");
                    }
                }
            ?>


<a href="AddAnnual.php" class="ManaAddCat"> Add Anu</a>
</p>
<table id="tablecategory" class="table table-striped table-bordered"  cellspacing="0" width="100%" style="text-align: center; color:#000;">
    <thead>
        <tr>
            <th><strong>Academic Year</strong></th>
             <th><strong>Closure Dates</strong></th>
            <th><strong>Final Closure Date</strong></th>
            <th><strong>Description</strong></th>
            <th><strong>Edit</strong></th>
            <th><strong>Dowload</strong></th>
        </tr>
     </thead>
     <tbody>
            <?php
                $No=1;
                $result = mysqli_query($conn, "SELECT * FROM magazine");
                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
            ?>
			<tr>
              <td class="cotCheckBox"><?php echo $No; ?></td>
              <td><?php echo $row["acaYear"]; ?></td>
              <td><?php echo $row["closureDate"]; ?></td>
              <td><?php echo $row["finalClosureDate"]; ?></td>
              <td><?php echo $row["contentM"]; ?></td>
              <td style='text-align:center'><a href="?page=update_category&&id=<?php echo $row["magazineID"]; ?>">
              <img src='images/edit.png' border='0' /></a></td>

              <td style="text-align:center"><a href="?page=category_management&&function=del&&id=<?php echo $row["magazineID"]; ?>"
               onclick="return deleteConfirm()">
               <img src="./images/delete.png" border='0' ></a></td>
            </tr>
            <?php
                $No++;
                }
                ?>
		
			</tbody>
</table>  


 <!--Nút Thêm mới , xóa tất cả-->
<div class="row" style="background-color:#FFF"><!--Nút chức nang-->
    <div class="col-md-12">
        
    </div>
</div><!--Nút chức nang-->


</form>
</div>
</div>
<?php
// }else{
//     echo "<script>alert('You are not Adminitrator!')</script>";
//     echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
// }
?> 

