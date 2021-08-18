

function pasarPk(tbl, pk, nombre) {
    modal = `<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>
                            Esta seguro de eliminar <br> ${tbl} ${nombre}
                            </h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-footer' id='container-button'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                        <a href='admin.php?modulo=${tbl}&controlador=${tbl}&funcion=eliminar&id=${pk}'>
                        <button type='button' class='btn btn-danger'>Eliminar</button></a>
                        </div>
                    </div>
                </div>
            </div>`;
    document.getElementById("mdl").innerHTML = modal;
}
//cambiar por filtrar'
function filtar(tbl) {

    var buscar = document.getElementById("buscar").value;
    var url = `fecth.php?modulo=${tbl}&controlador=${tbl}&funcion=filtrar`;
    const datos = new FormData;
    datos.append("buscar", buscar);

    console.log(url);

    fetch(url, { method: "POST", body: datos, })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            console.log(data);
            var tbl = document.getElementById('tbody');
            tbl.innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}



//Oferta
function replica(rep, father) {

    f = document.getElementById(father);
    r = document.getElementById(rep);
    var nuevo = r.cloneNode(true);
    nuevo.style.display = "flex";
    f.append(nuevo);
}

function nodeDelete(nodo, father, id = false) {

    f = document.getElementById(father);
    n = nodo.parentElement.parentElement;
    f.removeChild(n);

    console.log(n);

    if (id !== false) {
        const datos = new FormData();
        datos.append('id', id)

        var url = `fecth.php?modulo=Oferta&controlador=Oferta&funcion=deleteItem`;

        fetch(url, {
            method: "POST",
            body: datos,
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (data) {
                console.log(data);
            })
            .catch(function (error) {
                console.log(error);
            });

    }
}

function cboImg() {
    document.getElementById('container_img').innerHTML = `<input type="file" class="custom-file-input" name="imagen" lang="es">
    <label class="custom-file-label">Seleccione un archivo...</label>`;
}
