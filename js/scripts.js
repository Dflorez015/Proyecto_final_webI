
// Para validar si el administrador desea inactivar a un usuario
function preguntar(id, estado) {
    if (estado == '1') {
        if (confirm('¿Está seguro que desea inactivar a este usuario?')) {
            window.location.href = 'database/delete.php?id=' + id + '&estado=' + estado;
        }
    } else {
        window.location.href = 'database/delete.php?id=' + id + '&estado=' + estado;
    }
}

function actualizar_id(id) {
    window.location.href = 'edit.php?id=' + id;
}

function regresar_admin_users() {
    window.location.href = 'admin_users.php';
}

function recargar_lista() {
    $.ajax({
        type: "POST",
        url: "database/mostrar_serv.php",
        data: "categoria=" + $('#select_cat').val(),
        success: function (r) {
            $('#select_servicio').html(r);
        }
    });
}

function crear_serv() {
    var categoria = $('#select_cat').val();
    var valor = document.getElementById('serv_name').value;
    if (categoria != '0') {
        window.location.href = 'database/crear_serv.php?id_cat=' + categoria + '&valor=' + valor;
    }else{
        alert('Por favor escoja una categoría');
    }
    return false;
}

$(document).ready(function () {

    $('#select_cat').change(function () {
        recargar_lista();
    });
});