<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        function funcBefore () {
            $("#info").text ("Ожидание данных...");
        }

        function funcSuccess (data) {
            $("#info").text (data);

        }

        $(document).ready (function () {
            $("#load").bind("click", function () {
                var admin = "Admin";
                $.ajax ({
                    url: "content.php",
                    type: "POST",
                    data: ({name: admin, age: 30}),
                    dataType: "html",
                    beforeSend: funcBefore,
                    success: funcSuccess
                });
            });

            $("#btn").bind("click", function () {
                $.ajax ({
                    url: "check.php",
                    type: "POST",
                    data: ({name: $("#name").val()}),
                    dataType: "html",
                    beforeSend: function () {
                        $("#info").text ("Ожидание данных...");
                    },
                    success: function (data) {
                        if(data == "Fail")
                            $("#info").text ("Ошибка такое имя есть!");
                        else
                            $("#info").text ("Удача такое имя как " + data + " - Уникально!");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="content">
        <input type="text" id="name" placeholder="Введите Имя">
        <input type="button" id="btn" value="Готово">
        <div id="load">Загрузить данные</div>
        <div id="info"></div>
    </div>
</body>
</html>
