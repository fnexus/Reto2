let divExist = false;

window.onload = function() {

    let status = document.getElementById("logged").value;

    if(status=="true"){
        document.getElementById("signIn").style.display="none";
        document.getElementById("logIn").style.display="none";

        document.getElementById("profile").style.display="inline-block";
        document.getElementById("logOut").style.display="inline-block";
    }
    else{
        document.getElementById("signIn").style.display="inline-block";
        document.getElementById("logIn").style.display="inline-block";

        document.getElementById("profile").style.display="none";
        document.getElementById("logOut").style.display="none";
    }

    $('.exitForm').on('click', function () {
        $(this).closest('form').css('display', 'none');
        $("#bodyOnForms").remove();
        divExist = false;
    });

    $('#button-edit-perfil').on('click', function () {
        $('#edit-user-form').css('display', 'block');
        createOpacityBackground();
    });


    $('#showAd').on('click', function () {
        $('#publicateAd').css('display', 'block');
        createOpacityBackground();
    });

    $('#signIn').on('click', function () {
        $('#registerForm').css('display', 'block');
        createOpacityBackground();
    });

    $('#logIn').on('click', function () {
        $('#loginForm').css('display', 'block');
        createOpacityBackground();

    });

    function createOpacityBackground() {
        if(divExist===false){
            let div = document.createElement("div");
            div.setAttribute("id","bodyOnForms")
            document.body.appendChild(div);
            divExist=true;
        }
    }

};

