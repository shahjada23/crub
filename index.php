<?php
$insert=false;
$update=false;
$delete=false;

include_once("database_connect.php");

// SQL for Delete Note

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `note` WHERE `id` = '$sno'";
  $result = mysqli_query($conn, $sql);
}

if($_SERVER["REQUEST_METHOD"] =='POST')
{

  // SQL for Upadate Note

     if(isset($_POST['idedit']))
       {
         $idedit=$_POST['idedit'];
         $titleedit=$_POST['titleEdit'];
         $desedit=$_POST['desEdit'];
         $sql1="UPDATE `note` SET `title` = '$titleedit' , `des` = '$desedit' 
         WHERE id = '$idedit'";
         $result1 = mysqli_query($conn, $sql1);
        
        if($result1){
          $update=true;
          }
       }
else{

  // SQL For Insert Note

$title=$_POST['title'];
$des=$_POST['des'];
$sql1="INSERT INTO `note` (`title`, `des`) VALUES  ('$title', '$des')";
$result1 = mysqli_query($conn, $sql1);

if($result1){
   $insert=true;
            }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

    <!-- table -->
    <title>PHP CRUD</title>
  </head>
  <body>

<!-- Edit Modal -->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<!-- Edit Form -->

      <div class="modal-body">
      <form method='POST' action="/crud/">
      <div class="mb-3">
      <h2>Edit Note</h2>
      <input type='hidden' name='idedit' id='idedit'>
      <label for="exampleInputEmail1" class="form-label">Note Title Edit</label>
      <input type="title" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
      <label for="desc">Note Description</label>
      <textarea class="form-control" id="desEdit" name="desEdit" rows="3"></textarea>
      </div>

      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Note</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Nav Bar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHP CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/crud/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact us</a>
        </li>
      </ul>
      </form>
    </div>
  </div>
</nav>

<!--  Alert Message -->
<?php
if($insert==true)
{
echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your Note Added Successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
if($update==true)
{
echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your Note Updateded Successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}

if($delete==true)
{
echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your Note Delete Successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>

<!-- Insert Note Form -->

<div class="container my-4">
<form method='POST' action="/crud/index.php">
  <div class="mb-3">
  <h2>Add a Note</h2>
    <label for="exampleInputEmail1" class="form-label">Note Title</label>
    <input type="title" class="form-control" id="title" name="title" aria-describedby="emailHelp">
  </div>
    <div class="form-group">
    <label for="desc">Note Description</label>
    <textarea class="form-control" id="des" name="des" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Add Note</button>
</form>

<br><table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sl No.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

<?php

// Sql For Insert note

$sql="SELECT * FROM `note` ORDER BY `id` DESC";
$result=mysqli_query($conn,$sql);
$no=1;
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
    <th scope='row'>$no</th>
    <td>". $row['title']. "</td>
    <td>". $row['des']. "</td>
    <td><button class='delete btn btn-sm btn-primary' id=d".$row['id'].">Delete</button> 
    <button class='edit btn btn-sm btn-primary' id=".$row['id'].">Edit</button></td>
  </tr>";
  $no++;
}
?>
</div>
  </tbody>
</table>
</div>
<script  type="text/javascript"  src="edit_del.js"></script>

  <!-- JS for Add Tablr=e Design -->
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
</body>
</html>