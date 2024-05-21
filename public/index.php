<?php
session_start();
require __DIR__ . '/../src/bootstrap.php';
include('../config/config.php');
view('header', ['tittle' => 'Login']);
?>

<div class="container">
    <?php
    if (isset($_POST['submit'])) {
        # code...
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $result = mysqli_query($con, "SELECT * FROM casisdata WHERE email='$email'
         AND password='$password'") or die("Select Error");

        $row = mysqli_fetch_assoc($result);

        if (is_array($row) && !empty($row)) {
            # code...
            $_SESSION['valid'] = $row['email'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['telepon'] = $row['telepon'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "<p>Wrong Username or Password</p>";
            echo "<a href='index.php'><button>Go Back</button></a>";
        }
    }
    if (isset($_SESSION['valid'])) {
        # code...
        header("location: home.php");
    } else {
    ?>

        <h1 class="text-center">Login</h1>
        <form action="" method="post">
            <div class="container">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" autocomplete="off" class="form-control" required> <br>
                <label for="email">Password:</label>
                <input type="password" name="password" id="password" autocomplete="off" class="form-control" required>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                <p>Don't have an account?
                    <a href="register.php">Sign Up Here!</a>
                </p>
            </div>
        </form>
</div>

<?php
    }
    view('footer');
?>