<?php
session_start();
require __DIR__ . '/../src/bootstrap.php';
include('../config/config.php');

if (!isset($_SESSION['valid'])) {
    # code...
    header("location: index.php");
}

view('header', ['tittle' => 'Register']);
?>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">koneksi.php</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?php
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM casisdata WHERE id='$id'");

                while ($result = mysqli_fetch_assoc($query)) {
                    $resNama = $result['nama'];
                    $resEmail = $result['email'];
                    $resTelepon = $result['telepon'];
                    $resId = $result['id'];
                }

                include "../src/navbar.php";
                echo "<a class='nav-link active' href='edit.php?id=$resId'>Change Profile</a>";
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../config/keluar.php">
                    <button class="btn btn-primary">Log Out</button>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <p>Hello <b><?= $resNama ?></b>, Welcome</p><br>
    <p>Your Email is <b><?= $resEmail ?></b></p><br>
    <p>And your Phone Number is <b><?= $resTelepon ?></b></p>
</div>
<?php
view('footer');
?>