<?php
session_start();
include_once('assets/php/db.php');
include_once('assets\php\search.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/null.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Главная</title>
</head>

<body>
    <header>
        <div class="header-link-wrap">
            <div class="link-wrap">
                <a href="" class="link">Контакты</a>
                <div class="active-link-mark"></div>
            </div>
            <div class="link-wrap">
                <a href="" class="link">Проекты</a>
            </div>
        </div>
    </header>
    <div class="tools-and-list">
        <div class="tools">
            <div class="tools-wrap">
                <div class="search-wrap">
                    <div class="search-lable">Поиск:</div>
                    <form action="" onsubmit="" method="post">
                        <input class="input-search" name="word" type="text">
                        <input type="submit" class="search-button">
                    </form>
                </div>
                <div class="group-wrap">
                    <div class="group-lable">Группировка:</div>
                    <form action="" onsubmit="" method="post">
                        <select class="input-group" name="groupContacts">
                            <option>...</option>
                            <?php
                            $sql = mysqli_query($link, 'SELECT * FROM `group_contacts`');
                            while ($result = mysqli_fetch_array($sql)) {
                            ?>
                                <option><?= $result['Name_group_contact']; ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </form>

                    <button id="user-add" class="btn-modale-window_add_user"><img class="icon-user-add" src="assets/images/-.png" alt=""></button>
                    <button class="btn-modale-window_add_project"><img class="icon-user-add" src="assets/images/add.png" alt=""></button>
                </div>
            </div>
        </div>
        <div class="list">
            <div class="list_wrap">
                <div class="column-name">
                    <div class="name">Id</div>
                    <div class="name">ФИО</div>
                    <div class="name">Номер</div>
                    <div class="name">E-mail</div>
                    <div class="name">Статус</div>
                </div>
                <div class="list-items">
                    <?php
                    if (empty($_POST['word'])) {
                        $listContacts = mysqli_query($link, 'SELECT * FROM `contacts`');
                        while ($result = mysqli_fetch_array($listContacts)) {
                    ?>
                            <div class="item-wrap">
                                <div class="item-atrs">
                                    <div class="item-atr"><?= $result['id']; ?></div>
                                    <div class="item-atr"><?= $result['fio']; ?></div>
                                    <div class="item-atr"><?= $result['phone']; ?></div>
                                    <div class="item-atr"><?= $result['email']; ?></div>
                                    <div class="item-atr"><?= $result['status']; ?></div>
                                </div>
                                <button class="item-btn"><img src="assets/images/items-btn.png" alt=""></button>
                            </div>
                    <?php
                        }
                    } else {
                        filter($link);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div id="popap" class="modale-window-user">
        <div class="wrpapp-modale-user">
            <form id="popap_form-one">
                <div class="field">
                    <div class="field-name">
                        E-mail
                    </div>
                    <input name="email" class="modale_user-input" type="text" id="email">
                </div>
                <div class="field">
                    <div class="field-name">
                        Номер
                    </div>
                    <input name="phone" id="input-phone" class="modale_user-input" type="text">
                </div>
                <div class="field">
                    <div class="field-name">
                        ФИО
                    </div>
                    <input name="fio" class="modale_user-input" type="text" id="fio">
                </div>
                <div class="field">
                    <div class="field-name">
                        Статус
                    </div>
                    <select class="modale_user-input" name="status" id="state"></select>
                </div>
                <div class="field">
                    <div class="field-name">
                        Пароль
                    </div>
                    <input name="pass" class="modale_user-input" type="password" id="pass">
                </div>
                <div class="buttons">
                    <input id="add__new-user" type="button" class="class_user_btn" value="Регистрация">
                    <button type="button" id="close_add-user" class="class_user_btn">Закрыть</button>
                </div>
                <div class="result"></div>
            </form>
        </div>
    </div>

</body>

</html>
<script src="assets/js/jquery-3.6.0.js"></script>
<script src="assets/js/ajax.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery.inputmask.min.js"></script>
<script src="assets/js/input-msak.js"></script>