
<!doctype html>
<html lang="en">
<head>
    <title>AJAX example</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
</head>
<body>
    <h1>AJAX пример</h1>

    <p>Ваше имя:</p>
    <input type="text" id="input1" />

    <br/><br/>

    <p id="hello"></p>

    <br/><br/>

    <p id="hello"></p>

    <br/>

    <button id="send">Асинхронная отправка на обработку (ajax)</button>

    <script>
        $("#send").click(function () {
            var params = {
                text: $("#input1"). val(),
            }
            $.post('ajax/send', params, function (data) {
                $("#hello").html(data);

            });
        });
    </script>

</body>
</html>
