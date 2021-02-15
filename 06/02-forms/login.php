<DOCTYPE html>
<html>
    <body>
        <?php
        $userList = array (
            array("u" => "jack", "p" => "jack123"),
            array("u" => "jane", "p" => "jane123")
        );

        $user = $_POST['user'];
        $password = $_POST['password'];

        foreach($userList as $rec) {
            echo $rec['u'] . "-----" .$rec['p'] . "<br/>";
            if ($user == $rec['u'] && $password == $rec['p']) {
                $isLoggedIn = true;
                break;
            }
        }

        if($isLoggedIn) {
            echo "Login SUCCESS";
        } else {
            echo "Login FAILED!!";
        }
        //echo "$user / $password";
        ?>
    </body>
</html>