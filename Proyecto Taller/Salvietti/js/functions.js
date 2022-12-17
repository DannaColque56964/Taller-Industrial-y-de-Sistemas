function cargarPagina(abrir) {    
    var contenedor = document.getElementById('contenido');
    fetch(abrir)
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function registrarUsuario() {    
    var contenedor = document.getElementById('mensaje');
    var formulario = document.getElementById("formRegistrarUsuario");
    var parametros = new FormData(formulario);
    fetch('functions/registrarUsuario.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function agregarProducto() {    
    var contenedor = document.getElementById('mensaje');
    var formulario = document.getElementById("formAgregarProducto");
    var parametros = new FormData(formulario);
    fetch('functions/agregarProducto.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function agregarCategoria() {    
    var contenedor = document.getElementById('mensajeCategoria');
    var formulario = document.getElementById("formAgregarCategoria");
    var parametros = new FormData(formulario);
    fetch('functions/agregarCategoria.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function agregarRol() {    
    var contenedor = document.getElementById('mensajeRol');
    var formulario = document.getElementById("formAgregarRol");
    var parametros = new FormData(formulario);
    fetch('functions/agregarRol.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function editarCategoria() {    
    var contenedor = document.getElementById('mensaje');
    var formulario = document.getElementById("formEditarCategoria");
    var parametros = new FormData(formulario);
    fetch('functions/editarCategoria.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function editarProducto() {    
    var contenedor = document.getElementById('mensaje');
    var formulario = document.getElementById("formEditarProducto");
    var parametros = new FormData(formulario);
    fetch('functions/editarProducto.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function editarRol() {    
    var contenedor = document.getElementById('mensaje');
    var formulario = document.getElementById("formEditarRol");
    var parametros = new FormData(formulario);
    fetch('functions/editarRol.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function editarUsuario() {    
    var contenedor = document.getElementById('mensaje');
    var formulario = document.getElementById("formEditarUsuario");
    var parametros = new FormData(formulario);
    fetch('functions/editarUsuario.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function eliminarDatos(abrir) {    
    var contenedor = document.getElementById('mensaje');
    fetch(abrir)
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function registrarPedido() {
    var contenedor = document.getElementById('modal');
    var formulario = document.getElementById("formRegistrarPedido");
    var parametros = new FormData(formulario);
    fetch('functions/registroPedido.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}

function autenticar() {
    var contenedor = document.getElementById('mensaje');
    var formulario = document.getElementById("formAutenticar");
    var parametros = new FormData(formulario);
    fetch('functions/autenticar.php', {body:parametros, method:"POST"})	
        .then(response => response.text())
        .then(data => contenedor.innerHTML=data);
}