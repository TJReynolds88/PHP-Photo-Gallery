<?php
// This file contains the connection to the datebase
require_once "../../../../db_credentials.php";
// Starting a session
session_start();



//Checking if
$User = "";
$Pass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = test_input($_POST["User"]);
    $Password = test_input($_POST["Pass"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Connecting to datebase and pulling user columns
$sql3 = "SELECT * FROM users";
$user = $pdo->query($sql3);
foreach ($user as $row) {
    $dbUsername = $row['username'];
    $dbPassword = $row['password'];
    $dbId = $row['id'];


    if (($dbUsername == $Username)
        && ($dbPassword == $Password)) {

        $_SESSION["loggedIn"] = true; 

        $logfile = fopen('access.txt', 'a');
        fputs($logfile, "{$_SERVER['REMOTE_ADDR']}");
        fputs($logfile, "attempted access on ");
        fputs($logfile, date("F j, Y, g:i a"));
        fputs($logfile, "\n");
        fclose($logfile);
        echo ("<script>location.href='admin.php'</script>");
        exit;

    } else {
        $_SESSION["loggedIn"] = false;
        $logfile = fopen('unauthorized.txt', 'a');
        fputs($logfile, "{$_SERVER['REMOTE_ADDR']}");
        fputs($logfile, "attempted access on");
        fputs($logfile, date("F j, Y, g:i a"));
        fputs($logfile, "\n");
        fclose($logfile);
        $error = " ERROR: Username or Password Is incorrect";
    }
}

$pdo = null;
$result = null;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ADMIN LOGIN</title>

        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            body{
                background-color: #D3D3D3;
            }
            .loginBox{
                background-color: #333;
                margin: 100px  auto;
                height: 200px;
                width: 500px;
                border: 3px solid 	#82919a;
            }
            ul{
                list-style: none;
                margin: 0 ;
                padding 0;
                margin-right: 75px;
            }
            li{
                margin: .75em 0;

            }
            label{

                text-align: left;
                margin-right: 2em;
                color: white;
                width: 300px;
                font-size: 20px;
                font-weight: 800;

            }
            input{
                width: 300px;
                font-size:20px;
                border-radius: 5px;
                border: solid #ffffff;
                background-color: white;
                cursor: text;
            }
            .reset{
                background-color: gold;
                color: white;
                font-size: 15px;
                border: none;
                width: 50px;
                cursor:pointer;
            }
            .button {
                float: right;
                color: white;
                background-color: red;
                width: 200px;
                margin:0, 25px, 50px, 0;
                cursor: pointer;
            }
            .button:hover{
                border: 2px solid #333;

            }
            .UI{
                background-color: #333;
                margin:auto;
                height: auto;
                width: 400px;
                border: 3px solid 	#82919a;
                text-align: center;
                color: white;
                padding: 0px;
            }

        </style>
    </head>
<body>
    <div class="loginBox">
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                 <ul>
                     <li><label for="username">Username:</label><input type="text" name='User' required/></li>
                     <li><label for="password">Password:</label><input type="text" name='Pass' required/></li>
                     <li><input type="reset" class="reset" value="Reset Password"></li>
                     <li><input type="submit" name ="login-submit" class="button" value ="Submit"></li>
                       </ul>
            </form>
        </div>
                    <div class= "UI">
                    <ul>
                        <li><?php echo $error; ?> </li>
                     </ul>
                     </div>
                     <a href="../index.html" class ="home">Home</a>

    </body>

</html>