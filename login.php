<?php

    session_start();

    $sqluser = "";
    $sqlpassword = "";

   
    $sqldatabase = "";


    $post = $_SERVER['REQUEST_METHOD']=='POST';

    if (!isset($_POST['uname'])) { $_POST['uname']=""; }
    if (!isset($_POST['pass'])) { $_POST['pass']=""; }
 
    
    if ($post) {
        if(
            empty($_POST['uname'])||
            empty($_POST['pass'])
        ) $empty_fields = true;


        else {
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=".$sqldatabase,$sqluser,$sqlpassword);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    exit($e->getMessage());
                }
                $st = $pdo->prepare('SELECT * FROM list WHERE');
                $st->execute(array($_POST['uname']));
                $r=$st->fetch();
                if($r != null && $r["password"]==$_POST['pass']) {
                    echo $_POST["uname"];
                    echo $_POST["pass"];
                    $_SESSION["uname"] = $_POST["uname"];
                    $_SESSION["pass"] = $_POST["pass"];
                    $_SESSION["fname"] = $r["first_name"];
                    echo $_SESSION["uname"];
                    echo $_SESSION["pass"];
                    header("");
                    exit;
                } else $login_err = true;
        }
    }
?>
<body>
<div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <p>Login</p>
    <?php 
    echo 'Username<br><input type="text" name="uname" value="'.$_POST['uname'].'" placeholder="Username"><br>';
    echo '<br>Password<br><input type="password" name="pass" value="'.$_POST['pass'].'" placeholder="Password"><br>';
    if(!empty($login_err)&&$login_err) echo "<span>Incorrect Username or password.</span>";
    if(!empty($empty_fields)&&$empty_fields) echo "<span>Enter username and password.</span>";
    ?>
    <br>
    <input type="submit" id="submit" value="Login"><br><br>
    Don't have an account? <a href="">Sign Up</a>.<br><br>
</form>
</div>
</body>
</html>
