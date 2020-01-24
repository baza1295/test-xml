<?php



        $login = isset($_POST['login']) ? $_POST['login'] : ''; // получаем login
        $password = isset($_POST['password']) ? sha1('соль'.$_POST['password']) : '';  // получаем password

        if (file_exists($path)) {
            $dom = simplexml_load_file($path);
            $isset = 0;
            foreach($dom->user as $user) {

                if($user->login == $login && $user->password == $password) { // проверяем на совпадение логина и пароля

                    $isset = 1;
                    $_SESSION['login_user'] = (string)$user->name;   // создаем сессию


                    $code = generateCode(15);

                    setcookie("login_user", $login, time()+3600*24*14,"/"); //создаем куки
                    setcookie("code_user", $code, time()+3600*24*14,"/");

                    $user->session = $code;

                    $dom->asXML($path);
                    break;

                }


            }
            if($isset == 0) {
                $error['error'] = 'Неправильный логин или пароль';
                echo json_encode($error);
            }

        }

        exit;



