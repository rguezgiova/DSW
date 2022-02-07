function peticion(form) {
    let url = form.getAttribute('action');

    fetch(url, {
        body: new FormData(form),
        method: 'post'
    }).then(response => response.text())
        .then(data => {
            try {
                var respuesta = JSON.parse(data);
            } catch (exception) {
                console.log('Error al intentar parsear: ' + data);
            }
            let operacion = form.elements['operacion'].value;
            if (respuesta['response'] === true) {
                switch (operacion) {
                    case "insertar":
                        accion = 'insertado';
                        break;
                    case "modificar":
                        accion = 'actualizado';
                        break;
                    case "eliminar":
                        accion = 'eliminado';
                        break;
                    case "entrada":
                        accion = 'agregado';
                        break;
                    case "salida":
                        accion = 'retirado';
                        break;
                }
                alert('Producto ' + accion + ' correctamente');
                location.reload();
            } else {
                alert('Error en ' + operacion);
            }
        });
}

function crearForm(inputs, operacion, cantidad = null) {
    let form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '../Controlador/ControladorProducto.php');
    let op = document.createElement('input');
    op.setAttribute('name', 'operacion');
    op.setAttribute('value', operacion);
    form.append(op);

    if (operacion === 'eliminar') {
        let inputTmp = document.createElement('input');
        inputTmp.setAttribute('name', inputs[0].name);
        inputTmp.setAttribute('value', inputs[0].value);
        form.appendChild(inputTmp);
    } else {
        for (let input of inputs) {
            if (input.name !== 'margen') {
                let inputTmp = document.createElement('input');
                inputTmp.setAttribute('name', input.name);
                inputTmp.setAttribute('value', input.value);
                form.appendChild(inputTmp);
            }
        }
    }
    if (cantidad != null) {
        form.appendChild(cantidad)
    }
    peticion(form);
}

function eliminar(codigo) {
    let tmpArray = [];
    let input = document.createElement('input');
    input.name = 'codigo';
    input.value = codigo;
    tmpArray.push(input);
    crearForm(tmpArray, 'eliminar');
}

function modificar(codigo) {
    let fila = document.getElementById(codigo);
    let inputs = fila.getElementsByTagName('input');
    cambiarFila(inputs);
    let botonModificar = document.getElementById('modificar_'+codigo);
    botonModificar.innerHTML = 'Guardar';
    let listener = function() {
        cambiarFila(inputs, true);
        this.innerHTML = 'Modificar';
        this.removeEventListener('click', listener);
        crearForm(inputs);
    }
    botonModificar.addEventListener('click', listener);
}

function insertar() {
    let inputs = document.getElementById('insertar').getElementsByTagName('input');
    crearForm(inputs, 'insertar');
}

function entrada(codigo) {
    let fila = document.getElementById(codigo);
    let inputs = fila.getElementsByTagName('input');
    let cantidad = prompt('Cantidad');
    let inputCantidad = document.createElement('input');
    inputCantidad.setAttribute('name', 'cantidad');
    inputCantidad.setAttribute('value', cantidad);
    crearForm(inputs, 'entrada', inputCantidad);
}

function salida(codigo) {
    let inputs = codigo.getElementsByTagName('input');
    let cantidad = prompt('Cantidad');
    let inputCantidad = document.createElement('input');
    inputCantidad.setAttribute('name', 'cantidad');
    inputCantidad.setAttribute('value', cantidad);
    crearForm(inputs, 'salida', inputCantidad);
}

function primPag() {
    window.location.href = '../Controlador/init.php?pag=1';
}

function ultPag(pag) {
    window.location.href = '../Controlador/init.php?pag=' + pag;
}

function pagAnterior(pag) {
    window.location.href = '../Controlador/init.php?pag=' + pag;
}

function pagSiguiente(pag) {
    window.location.href = '../Controlador/init.php?pag=' + pag;
}

function cambiarFila(inputs, readOnly = false) {
    for (let input of inputs) {
        if (input.name !== name) {
            input.readOnly = readOnly;
        }
    }
}