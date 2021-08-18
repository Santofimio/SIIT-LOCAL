function detOferta(container) {
    var cont = document.getElementById(container);

    var str = `<div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <select class="form-control" name="programa[]">
                            <option>Seleccioné...</option>
                            <?php
                            foreach ($programa as $pro) {
                                echo "<option value='" . $pro['pro_id'] . "' >" . $pro['pro_nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" class="form-control" name="cupos[]" required>
                    </div>
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-danger float-end" onclick="">-</button>
                </div>
            </div>`;

    cont.append(crearTemplate(str));
}

function crearTemplate(htmlString) {
    const html = document.implementation.createHTMLDocument();
    html.body.innerHTML = htmlString;
    const secciones = html.body.children[0];
    return secciones;
}

function loadData(tbl, fun) {

    var datos;

    if (fun === 'create' || fun === 'update' || fun === 'delete') {
        var datos = new FormData(document.getElementById(`form`));
    }

    var url = `fecth.php?modulo=${tbl}&controlador=${tbl}&funcion=${fun}`;
    fetch(url, {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {

            var container = document.getElementById('container');
            container.innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
}

function inicioSesion() {
    var datos = document.getElementById("sesion");

    fetch("fecth.php?modulo=Auth&controlador=Auth&funcion=login", {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            console.log(data);
            window.location.href = data;
        })
        .catch(function (error) {
            console.log(error)

        })
}