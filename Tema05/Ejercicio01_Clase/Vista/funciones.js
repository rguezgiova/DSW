function cambiarFila(inputs, readOnly = false, background = 'lightblue') {
    for (let input of inputs) {
        if (input.name !== name) {
            input.readOnly = readOnly;
            input.style.backgroundColor = background;
        }
    }
}

function ponerModificableFila(id) {
    var fila = document.getElementById('fila_'+id);
    var inputs = fila.getElementsByTagName('input');
    cambiarFila(inputs);
    var botonModificar = document.getElementById('modificar_'+id);
    botonModificar.innerHTML = 'Guardar';
    var listener = function () {
        cambiarFila(inputs, true, 'white');
        this.innerHTML = 'Modificar'
        this.removeEventListener('click', listener);
        crearEnviarFormulario(inputs);
    };
    botonModificar.addEventListener('click', listener);
}

function createInput(name, value, type='hidden') {
    var input = document.createElement('input');
    input.setAttribute('type', type);
    input.setAttribute('name', name);
    input.setAttribute('id', name);
    input.setAttribute('value', value);
    return input;
}

function crearEnviarFormulario(inputs) {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    document.URL;
    form.setAttribute('action', directorioBase()+'/Controlador/actualizarProducto.php');
    form.setAttribute('enctype', 'multipart/form-data');
    for (let input of inputs) {
        let name = input.name;
        let value = input.value;
        form.appendChild(createInput(name, value));
    }
    document.body.appendChild(form);
    enviarDatos(form);
}

function directorioBase() {
    var items = document.URL.split("/");
    items.pop(); items.pop();
    return items.join("/");
}

function formToJson(form) {

}

function enviarDatos(form) {
    var url = form.getAttribute('action');
    fetch(url, {
        body: form,
        headers: { "Content-type":"multipart/form-data"}
    }). then(response => {
        response.json().then(data => {
            const { resultado } = data;
            if (resultado === "true") {
                alert("Datos modificados correctamente");
            } else {
                alert("Hubo un error al insertar los datos");
            }
        });
    });
}