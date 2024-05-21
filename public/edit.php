<?php
session_start();
require __DIR__ . '/../src/bootstrap.php';
include('../config/config.php');

view('header', ['tittle' => 'Edit']);

if (!isset($_SESSION['valid'])) {
    # code...
    header("location: index.php");
}
?>

<div class="container">
    <?php
    if (isset($_POST['submit'])) {
        # code...
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $id = $_SESSION['id'];

        $editQuery = mysqli_query($con, "UPDATE casisdata SET nama='$nama',
            email='$email', password='$password' WHERE id='$id'") or die('Error');

        if ($editQuery) {
            # code...
            echo "<p>Profil Updated</p>";
            echo "<a href='home.php'><button>Go Home</button></a>";
        }
    } else {
        $id = $_SESSION['id'];
        $query = mysqli_query($con, "SELECT * FROM casisdata WHERE id='$id'");

        while ($result = mysqli_fetch_assoc($query)) {
            $resNama = $result['nama'];
            $resEmail = $result['email'];
            $resPassword = $result['password'];
        }

    ?>

        <form action="" method="post">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $resNama ?>">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $resEmail ?>">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= $resPassword ?>">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
</div>

<?php
    }
?>