<!DOCTYPE html>
<html>
<head>
<title>TO DO LIST</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #343a40;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 3px;
            color: white;
            margin: 5px;
            cursor: pointer;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-primary {
            background-color: #007bff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">NURMALIA OKTARINA</span>
      </div>
    </nav>

<div class="container">
    <br>
    <h4><center> TO DO LIST </center></h4>

<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['no_id'])) {
        $no_id=htmlspecialchars($_GET["no_id"]);

        $sql="delete from tugas where no_id='$no_id' ";
        $hasil=mysqli_query($kon, $sql);

        //kondisi apakah berhasil atau tidak
        if($hasil) {
            header("Location:index.php");

        }
        else {
            echo "<div class='alert alert danger'>Data Gagal dihapus.</div>";
        }
    }
?>

    <tr class="table-danger">
           <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
           <tr class="table-primary">
           <th>No</th>
           <th>Nama Tugas</th>
           <th>Status</th>
           <th>Prioritas</th>
           <th>Tanggal</th>
           <th colspan='2'>Aksi</th>

    </tr>
    </thead>

    <?php
    include "koneksi.php";
    $sql="select * from tugas order by no_id desc";

    $hasil=mysqli_query($kon, $sql);
    $no=0;
    while ($data = mysqli_fetch_array($hasil)) {
        $no++;

        ?>
        <tbody>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data["namaTugas"];?></td>
            <td><?php echo $data["status"];?></td>
            <td><?php echo $data["prioritas"];?></td>
            <td><?php echo $data["tanggal"];?></td>
            <td>
                <a href="update.php?no_id=<php echo htmlspecialchars ($data['no_id']);?>" class="btn btn-warning" role="button">Update</a>
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ?no_id=<?php echo $data['no_id']; ?>" class="btn btn-danger" role="button">Delete</a>
            </td>
        </tr>
    </tbody>
    <?php
    }
    ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>
</body>
</html>