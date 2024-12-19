var formUI = document.getElementsByTagName( "form" )[ 0 ];
var inputsUI = formUI.getElementsByTagName( "textarea" );
var inputNombre = inputsUI[ 0 ];
var inputIngredientes = inputsUI[ 1 ];
var inputPreparacion = inputsUI[ 2 ];
var inputUsuarioID = 1;
// var inputSubmit = inputsUI[ 3 ];
var recordInsert = document.getElementById( "recordInsert" );

var dataNombre = " ";
var dataIngredientes = " ";
var dataPreparacion = " ";

recordInsert.addEventListener("click", function(e) {
    e.preventDefault();

    var endpoint = "http://localhost:8080/crud/recetas/insertar.php";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", endpoint, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("Nombre=" + inputNombre.value + "&Ingredientes=" + inputIngredientes.value + "&Preparacion=" + inputPreparacion.value + "&ID_Usuario=" + inputUsuarioID);

    xhr.addEventListener("load", function() {
        //var dataJson = JSON.parse(xhr.responseText);
        var dataJson = xhr.responseText;
        console.log(dataJson)});

        // if (dataJson.success) {
        //     // Limpiar el formulario
        //     formUI.reset();
        // } else {
        //     console.error("Error al insertar registro:", dataJson.message);
        // }
    });