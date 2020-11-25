
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

// Da un get[id] a la función edit
function actualizar_id(id) {
    window.location.href = 'edit.php?id=' + id;
}

// función que regresa a lka página del admin
function regresar_admin_users() {
    window.location.href = 'admin_users.php';
}


// Carga la lista de servicios en el index
function recargar_serv_index() {
    $.ajax({
        url: "database/mostrar_serv_index.php",
        success: function (r) {
            $('#lista_serv_index').html(r);
        }
    });
}


// SOPORTE

// Recarga la lista de servicios dada una categoría
function recargar_categorias_soporte() {
    $.ajax({
        url: "database/categoria_opcion.php",
        success: function (r) {
            $('#select_cat_soporte').html(r);
        }
    });
}

//Listar requerimientos dada una categoría del lado del soporte
function recargar_requerimientos() {
    $.ajax({
        type: "POST",
        url: "database/mostrar_req_soporte.php",
        data: "categoria=" + $('#select_cat_soporte').val(),
        success: function (r) {
            $('#select_servicio_soporte').html(r);
        }
    });
}

// USUARIO

//Categorias como opciones elegibles  del lado del usuario
function recargar_categorias_user() {
    $.ajax({
        url: "database/categoria_opcion.php",
        success: function (r) {
            $('#select_cat_user').html(r);
        }
    });
}

// Listar requerimeinros del usuario
function recargar_req_user() {
    $.ajax({
        url: "database/mostrar_req_user.php",
        success: function (r) {
            $('#select_req_user').html(r);
        }
    });
}

//Servicios del lado del usuario
function recargar_servicios(){
    $.ajax({
        type: "POST",
        url:"database/mostrar_serv_user.php",
        data:"categoria=" + $('#select_cat_user').val(),
        success:function(r){
            $('#select_servicio_user').html(r);
        }
    });
}

//ADMIN

// Crear servicios
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

// Cargar tabla de servicios
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

// Listar opciones de tipos de usuario
function recargar_tipo_usuario() {
    $.ajax({
        url: "database/mostrar_tipo_user.php",
        success: function (r) {
            $('#select_tipo_usuario').html(r);
        }
    });
}

// Listar usuarios y poder modificar
function recargar_lista_admin() {
    $.ajax({
        url: "database/mostrar_usuarios_admin.php",
        success: function (r) {
            $('#lista_user_admin').html(r);
        }
    });
}

//Categorias como opciones elegibles  del lado del administrador
function recargar_categorias_admin() {
    $.ajax({
        url: "database/categoria_opcion.php",
        success: function (r) {
            $('#select_cat').html(r);
        }
    });
}


$(document).ready(function () { //Carga de las etiquetas html de sus respectivas páginas
    recargar_categorias_admin();
    recargar_categorias_user();
    recargar_categorias_soporte();
    recargar_lista_admin();
    recargar_serv_index();
    recargar_req_user();
    recargar_tipo_usuario();
    $('#select_cat').change(function () {
        recargar_lista();
    });
    $('#select_cat_soporte').change(function (){
        recargar_requerimientos();
    });
    $('#select_cat_user').change(function () {
        recargar_servicios();
    });
});