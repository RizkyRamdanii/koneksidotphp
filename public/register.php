<?php
require __DIR__ . '/../src/bootstrap.php';
include('../config/config.php');

view('header', ['tittle' => 'Register']);

if (isset($_POST['submit'])) {
    # code...
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = $_POST['password'];

    $verifQuery = mysqli_query($con, "SELECT email FROM casisdata WHERE email='$email'");

    if (mysqli_num_rows($verifQuery) != 0) {
        # code...
        echo "<p>this email is used, try another one please!</p> <br>";
        echo "<a href='javascript:self.history.back()'><button>Go Back</button></a>";
    } else {
        mysqli_query($con, "INSERT INTO casisdata (nama, email, telepon, password) VALUES
        ('$nama', '$email', '$telepon', '$password')") or die('error');

        echo "<p>Registration Work!</p> <br>";
        echo "<a href='index.php'><button>Login Now</button></a>";
    }
} else {
?>

    <form action="" method="post">
        <div class="container">
            <h1 class="text-center">Sign Up</h1>
            <div>
                <label for="username">Nama Lengkap:</label>
                <input type="text" name="nama" id="nama" autocomplete="off" class="form-control" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" autocomplete="off" class="form-control" required>
            </div>
            <div>
                <label for="telepon">No.Telepon:</label>
                <input type="tel" name="telepon" id="telepon" autocomplete="off" class="form-control" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" autocomplete="off" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
            <footer>Already have an account? <a href="index.php">Sign In here</a></footer>
        </div>
    </form>


<?php
}
view('footer')
?>