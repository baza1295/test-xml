<? session_start();
$path = 'test1.xml';
 if(check($path)) {
     $aut = true;
 }

    function check($path) {

        if (isset($_SESSION['login_user'])) return true;

        else {
            if (isset($_COOKIE['login_user']) and isset($_COOKIE['code_user'])) {

                $login = $_COOKIE['login_user'];
                $id_session = $_COOKIE['code_user'];

                if (file_exists($path)) {
                    $dom = simplexml_load_file($path);
                    foreach($dom->user as $user) {
                        if($user->login == $login && $user->session == $id_session) {

                            $_SESSION['login_user']=(string)$user->name;  // создаем сессию

                            setcookie("login_user", $login, time()+3600*24*7,"/");  //создаем куки
                            setcookie("code_user", $id_session, time()+3600*24*14,"/");
                            return true;
                        }
                    }
                }
                else return false;
            }
            else return false;
        }

    }

    function generateCode($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }

    if(isset($_POST['exit'])) {
        include 'exit.php';
    }

    if(isset($_POST['login'])) {
        include 'aut.php';
    }

    if(isset($_POST['login-reg'])) {
        include 'register.php';
    }

    include 'main.php';



?>
