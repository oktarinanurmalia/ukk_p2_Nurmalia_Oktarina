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
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 3px;
            color: white;
            margin: 5px;
            cursor: pointer;
            border: none;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-info {
            background-color: #17a2b8;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";
    function input ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $no_id= input($_POST["no_id"]);
        $namaTugas= input($_POST["namaTugas"]);
        $status= input($_POST["status"]);
        $prioritas= input($_POST["prioritas"]);
        $tanggal= input($_POST["tanggal"]);
        $sql="insert into tugas (no_id, namaTugas, status, prioritas, tanggal) values ('$no_id', '$namaTugas', '$status', '$prioritas', '$tanggal')";
        $hasil=mysqli_query($kon, $sql);
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
        }
    }
    ?>
    <h2>Update Data</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <div class="form-group">
        <label>Nama Tugas:</label>
        <input type="text" name="namaTugas" class="form-control" placeholder="Masukkan Nama Tugas" required />
    </div>
    <div class="form-group">
        <label>Status:</label>
        <select name="status" class="form-control" required>
            <option value="Belum Selesai">Belum Selesai</option>
            <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
            <option value="Selesai">Selesai</option>
        </select>
    </div>
    <div class="form-group">
        <label>Prioritas:</label>
        <select name="prioritas" class="form-control" required>
            <option value="Rendah">Rendah</option>
            <option value="Sedang">Sedang</option>
            <option value="Tinggi">Tinggi</option>
        </select>
    </div>
    <div class="form-group">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" class="form-control" required />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="index.php" class="btn btn-info">Kembali</a>
    </form>
</div>
</body>
</html>