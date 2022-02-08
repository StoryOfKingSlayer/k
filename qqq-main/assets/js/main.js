$(document).ready(function () {
    $("#add__new-user").click(function (e) {
        e.preventDefault();

        addNewUser()
    })
    // $("#auth").click(function (e) {
    //     e.preventDefault();

    //     auth()
    // })
    togglePopap()


})



function auth() {
    const email = $("#email").val()
    const pass = $("#pass").val()

    if (email == "" || pass == "") {
        $(".result").text("Пустые поля");
        $("#email").toggleClass("empety_field");
        $("#pass").toggleClass("empety_field");
    }
    else {
        $("form").trigger("reset");
        $.ajax({
            url: 'assets/php/script-auth.php', //url страницы (action_ajax_form.php)
            type: "POST", //метод отправки
            dataType: "html", //формат данных
            data: { email: email, pass: pass },  // Сеарилизуем объект
            success: function (data) {
                alert(data)
            }
        });
    }
}


function addNewUser() {
    const email = $("#email").val()
    const phone = $("#input-phone").val()
    const fio = $("#fio").val()
    const state = $("#state").val()
    const pass = $("#pass").val()

    if (email == "" || fio == "" || pass == "") {
        $(".result").text("Обязательные поля!");
        $("#email").toggleClass("empety_field");
        $("#fio").toggleClass("empety_field");
        $("#pass").toggleClass("empety_field");
    }
    else {
        $("form").trigger("reset");
        $.ajax({
            url: 'assets/php/search.php', //url страницы (action_ajax_form.php)
            type: "POST", //метод отправки
            dataType: "html", //формат данных
            data: { email: email, phone: phone, fio: fio, state: state, pass: pass },  // Сеарилизуем объект
            success: function (data) {
                alert(data)
            }
        });
    }
}

function togglePopap() {
    $(document).ready(function () {
        $("#user-add").click(function () {
            $("#popap").addClass('open')
        })
        $("#close_add-user").click(function () {
            $("#popap").removeClass('open')
        })
    })
}