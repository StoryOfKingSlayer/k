<?php
include('assets/php/script-auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/null.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Document</title>
</head>

<body>
    <div id="auth-form" class="login-form">
        <div class="wrpapp-modale-user">
            <form id="popap_form-one" method="post" action="assets/php/script-auth.php">
                <div class="field">
                    <div class="field-name">
                        E-mail
                    </div>
                    <input name="email" class="modale_user-input" type="text" id="email">
                </div>
                
                <div class="field">
                    <div class="field-name">
                        Пароль
                    </div>
                    <input name="pass" class="modale_user-input" type="password" id="pass">
                </div>
                <div class="buttons">
                    <button type="submit" id="auth" class="class_user_btn">Войти</button>
                </div>
                <div class="result"></div>
            </form>
        </div>
    </div>
</body>

</html>
<script src="assets/js/jquery-3.6.0.js"></script>
<!-- <script src="assets/js/ajax.js"></script>
<script src="assets/js/main.js"></script> -->