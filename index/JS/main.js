window.onload = function () {

    $('#navbar-cross').on('click', function () {
        $('.error-container').remove();
    });

    let status = document.getElementById("logged").value;

    if (status == "true") {
        $('#signIn-button').css('display', 'none');
        $('#logIn-button').css('display', 'none');

        $('#profile').css('display', 'inline-block');
        $('#logOut').css('display', 'inline-block');
    }

    $('.efectoFade').on('click', function (event) {
        $(this).modal({
            fadeDuration: 400,
            fadeDelay: 0
        });
        return false;
    });

};



