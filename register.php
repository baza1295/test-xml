<?



    $name = isset($_POST['name']) ? $_POST['name'] : '';  // получаем name
    $login = isset($_POST['login-reg']) ? $_POST['login-reg'] : ''; // получаем login
    $email = isset($_POST['email']) ? $_POST['email'] : '';  // получаем email
    $password = isset($_POST['password']) ? $_POST['password'] : '';  // получаем password

    if (file_exists($path)) {
        $dom = simplexml_load_file($path);
        foreach ($dom->user as $user) {

            if ($user->login == $login || $user->email == $email) { // проверяем на уникальность логин и email
                if ($user->login == $login) {
                    $error['error']['login'] = 1;
                }
                if ($user->email == $email) {
                    $error['error']['email'] = 1;
                }
                echo json_encode($error);
                exit();
            }
        }
    } else {
        include 'example.php';

        $dom = new SimpleXMLElement($xmlstr);

    }

    $user = $dom->addChild('user');
    $user->addChild('login', $login);
    $user->addChild('password', sha1('соль' . $password));
    $user->addChild('email', $email);
    $user->addChild('name', $name);
    $user->addChild('session', '');

    $dom->asXML($path);

    exit;
?>