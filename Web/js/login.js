
function load() {

    var url = `fecth.php?modulo=TipoDocumento&controlador=TipoDocumento&funcion=select`;
    var tip_doc = document.getElementById('tip_doc');
    fetch(url)
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            console.log(data);
            tip_doc.innerHTML = data
        })
        .catch(function (error) {
            console.log(error);
        })
}
// onclick="stopDefAction(event);"onclick="stopDefAction(event);"
// function stopDefAction(evt) {
//     evt.preventDefault();
//     console.log(evt);

//     pass = document.getElementById("pass").value;

//     if (pass === "siit.pass") {

//         num_doc = document.getElementById("num_doc").value;
//         var datos = new FormData();
//         datos.append("num_doc",num_doc);
//         var url = `fecth.php?modulo=Access&controlador=Access&funcion=getCambioPass`;
//         fetch(url, {
//             method: "POST",
//             body: datos,
//         })
//             .then(function (response) {
//                 return response.text();
//             })
//             .then(function (data) {

//                 var container = document.getElementById('container');
//                 container.innerHTML = data;
//             })
//             .catch(function (error) {
//                 console.log(error);
//             });

//     } else {
//         document.forms['form'].submit();
//     }
// }

// function login() {
//     var form = document.getElementById("form")
//     var url = `fecth.php?modulo=Access&controlador=Access&funcion=iniciarSesion`;
//     const datos = new FormData();
//     fetch(url,{ method: "POST",body: datos})
//     .then(function (response) {
//         return response.text();
//     })
//     .then(function (data) {
//         console.log(data);
//         if (data === 'admin.php') {
//             window.location.href = data;
//         }else if (data === 'index.php'){
//             window.location.href = data;
//         }else{
//             window.location.href = "login.php";

//         }
//     })
//     .catch(function(error) {
//         console.log(error)
//     });
// }