<?php
include_once('db.php');

$word  = '';



function filter($link)
{
    if (isset($_POST['word'])) {
        $word = $_POST['word'];
        $listContacts = mysqli_query($link, "SELECT * FROM `contacts` WHERE `fio` LIKE '$word%'");

        if (mysqli_num_rows($listContacts) > 0) {
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
            echo "<p style='color:red'>User not found...</p>";
        }
    }
}

createNewUser($link);

function createNewUser($link)
{
    if (isset($_POST['email']) & isset($_POST['phone']) & isset($_POST['fio']) & isset($_POST['pass'])) {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $fio = $_POST['fio'];
        $state = $_POST['state'];
        $pass = $_POST['pass'];
        $hashPass = password_hash($pass, PASSWORD_DEFAULT);
        echo var_dump($_POST['email'], $_POST['phone'], $_POST['fio'], $_POST['state'], $_POST['pass']);
        mysqli_query($link, "INSERT INTO `contacts` (`fio`, `phone`, `email`, `status`,  `pass`) VALUES ('$fio', '$phone', '$email', '$state', '$hashPass')");
    }
}
