<html>
<head>
    <meta charset="UTF-8">
    <link href="/style.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script src="script.js"></script>

    <title>Document</title>

</head>
<body>
<div class="container">


    <? if(!isset($aut)) {
        include 'content_forms.php';
    }
    else {
        include 'hello.php';
    }?>

</div>

</body>
</html>