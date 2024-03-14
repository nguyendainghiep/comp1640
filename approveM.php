
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
<h1 class="h1manaCat">Approved Document Management </h1>


<?php
    session_start();
    include_once("connection.php"); 
?>
<hbody>
    <h3> Select Academic Year</h3>
    <form action="/cgi-bin/dropdown.cgi" method="post">
    <select name="dropdown">
    <option value="choose" selected>choose</option>
    <option value="2017" selected>2017</option>
    <option value="2018" selected>2018</option>
    <option value="2019" selected>2019</option>
    <option value="2020" selected>2020</option>
    <option value="2021" selected>2021</option>
    <option value="2022" selected>2022</option>
    <option value="2023" selected>2023</option>
    <option value="2024" selected>2024</option>
    </select>
    </form>
</hbody>
    <h3>Select Faculty</h3>
    <form action="/cgi-bin/dropdown.cgi" method="post">
        <select name="dropdown">
        <option value="All_Faculty" selected>All Faculty</option>
        <option value="Faculty1" selected>Faculty 1</option>
        <option value="Faculty2" selected>Faculty 2</option>
        <option value="Faculty3" selected>Faculty 3</option>
        <option value="Faculty4" selected>Faculty 4</option>
        </select>
        </form>
<p>
    <button>View</button>
    <button >Download</button>
    <br>
<a> Add Categogy</a>
</p>
<table id="tablecategory" class="table table-striped table-bordered"  cellspacing="0" width="100%" style="text-align: center; color:#000;">
    <thead>
        <tr>
            <th><strong>Faculty</strong></th>
            <th><strong>Article Name</strong></th>
             <th><strong>Description</strong></th>
            <th><strong>Student name</strong></th>
            <th><strong>Approved Date</strong></th>
            <th><strong>Coordinator</strong></th>
            <th><strong>Edit</strong></th>
            <th><strong>Dowload</strong></th>


        </tr>
     </thead>
    <tbody>
     <!-- <?php
        $No=1;
        $result = mysqli_query($conn, "SELECT * FROM category");
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
    ?>  -->
    <tr>
     <td class="cotCheckBox"><?php echo $No; ?></td> 
       <!-- <td><?php echo $row["Cat_Name"]; ?></td>
      <td><?php echo $row["Cat_Des"]; ?></td>  -->
      <td style='text-align:center'>
    <img src='images/edit.png' border='0' /></a></td> 

      <td style="text-align:center">
     <img src="./images/delete.png" border='0' ></a></td> 
    </tr>
  <?php
        $No++;
        }
        ?> 

    </tbody>
</table>  


// <!--Nút Thêm mới , xóa tất cả-->
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

