<?php

session_start();
$sessionID = session_id();

$conn = mysqli_connect('localhost', 'mani1', 'mani2002', 'owasptop10');

if (!$conn) {
    echo "Unable to establish connection to Database";
}

$username = "";
$password = "";
$option = array();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $option = $_POST['option'];
}

if (in_array("encode", $option)) {
    $sql = "SELECT * FROM cryptographicfailureencoded WHERE username = '$username'";
} else {
    $sql = "SELECT * FROM cryptographicfailurenotencoded WHERE username = '$username'";
}

$results = mysqli_query($conn, $sql);

foreach ($results as $r) {

    $pwd_check = password_verify($password, $r['password']);

    if ($pwd_check) {
        $_SESSION['username'] = $r['username'];
    }
}


if (in_array("hijack", $option)) {
    //Code for Hijacking
    //Code for Hijacking
    //Code for Hijacking
    //Code for Hijacking
    //Code for Hijacking
    //Code for Hijacking
    //Code for Hijacking
}

if (isset($_POST['ok'])) {
    session_destroy();
    header("Location: /");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>CYSCOM - Cryptographic Failures</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Cryptographic Failure</div>
        <div class="content">
            <form method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" placeholder="Enter your username" name="username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" placeholder="Enter your password" name="password" required>
                        </div>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="checkbox" value="plaintext" name="option[]" id="dot-1">
                    <input type="checkbox" value="encode" name="option[]" id="dot-2">
                    <input type="checkbox" value="hijack" name="option[]" id="dot-3">
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="plaintext">Plain Text</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="encode">Encoded Format</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="hijack">Hijack the Session</span>
                        </label>

                    </div>
                </div>
                <div class="butn">
                    <button class="button-36" role="button" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
