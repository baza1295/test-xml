<?
    session_destroy();
    setcookie('login_user', null, -1, '/');
    setcookie('code_user', null, -1, '/');

    exit;
?>