window.onload = function () {

    $(document).ready(function () {

        let id_anuncio = document.getElementById("anuncio_comentario_id_anuncio").value;

        let urlBasica = "../PHP/actions.php";

        let contAnuncio = document.getElementById("anuncio-container");
        let deleteButton = document.createElement("button");
        let textnode = document.createTextNode("Borrar esta publicacion");
        deleteButton.appendChild(textnode);
        contAnuncio.appendChild(deleteButton);

        let user_nickname = document.getElementById("anuncio_comentario_user_nickname").value;
        let publisher_nickname = document.getElementById("anuncio_comentario_publisher_nickname").value;

        if (user_nickname == publisher_nickname) {
            deleteButton.style.display = "block";
        } else {
            deleteButton.style.display = "none";
        }

        deleteButton.addEventListener("click", function () {
            // borrar este anuncio
            let confirmacion = confirm("¿Estas seguro de que quieres eliminar este anuncio?")

            if (confirmacion == true) {
                var prueba = "";
                $.ajax({
                    url: urlBasica + "?id_anuncio=" + id_anuncio + "&action=Borrar",
                    type: "GET",
                    async: false,
                    success: function (result) {
                        console.log("borrar " + result);
                        prueba = result;
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(thrownError);
                        prueba = thrownError;
                    }
                });
                console.log(prueba);
                location.href = "http://localhost:8765/index/PHP/index.php";
            }
        });
    });
};