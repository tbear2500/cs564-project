<?php
    include_once(__DIR__."/conf.php");
    include_once(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");

    page_header("Log in");

    $login_msg = "";
    if (isset($_POST['username'])) {
        //a user is trying to log in
        $username = $_POST['username'];
        $password = $_POST['password'];
        //SELECT password FROM Pilot WHERE username = $username;
        $password_from_db = get_password_from_db($username);

        if (password_verify($password, $password_from_db)) {
            //todo: replace this with a login($username) function
            $_SESSION['username'] = $username;
            $login_msg = "Login success!";
        } else {
            $login_msg = "Login failure.";
        }
    }

    print_menu();

    printf($login_msg);

?>

<br /><br />
<div class="pass_warning">Do not use a password you would use anywhere else; it will be sent as plaintext.</div>

<form method="POST" action="./login.php">
<!--TODO: Use a table or some css to make the form look nicer-->
Username: <input type="text" name="username" /><br />
Password: <input type="password" name="password" />
<input type="submit" name="submit" value="Submit" />
</form>

<?php
    page_footer();
?>
