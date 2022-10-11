<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- <style>
        body {
            font-size: sans-serif;
            max-width: 400px;
        }

        #container li {
            padding: 18px;
            margin: 8px 0;
            background: #ddd;
            list-style: none;
        }

        #contenedor li a {
            cursor: pointer;
            float: right;
            padding: 3px 7px;
            background: #fbfbfb;
        }
    </style> -->
    <title>Document</title>
</head>

<body>
    <!-- <div id="container">
  <div id="1" class="cupcake">1</div>
  <div id="2" class="cupcake">2</div>
  <div id="3" class="cupcake">3</div>
  <div id="4" class="cupcake">4</div>
  <div id="5" class="cupcake">5</div>
  <div id="6" class="cupcake">6</div>
  <div id="7" class="cupcake">7</div>
  <div id="8" class="cupcake">8</div>
  <div id="9" class="cupcake">9</div>
  <div id="10" class="cupcake">10</div>
</div> -->
    <div id="comentar">
        <li class="list-group-item">Contenido 1<button type="button" class="btn btn-primary"><i class="fas fa-backspace enlace"></i></button></li>
        <li class="list-group-item">Contenido 2<button type="button" class="btn btn-primary"><i class="fas fa-backspace enlace"></i></button></li>
        <li class="list-group-item"><b>José Daniel : </b>yo digo que no<button type="button" class="btn btn-primary">x</button></li>
    </div>
    <!-- <button class="boton">Probar</button> -->

</body>

</html>
<script>
    //     var container = document.getElementById('container');

    // document.getElementById('boton').addEventListener('click', (e) => {
    //   let cupcakes = Array.prototype.slice.call(document.getElementsByClassName("cupcake"), 0);

    //   for(element of cupcakes){
    //     console.log(element);
    //     element.remove();
    //   }  
    // });
    window.onload = () => {
        // let boton = document.querySelector(".boton")
        let container = document.getElementById("comentar")
        let enlaces = document.getElementsByClassName("btn")

        // boton.addEventListener("click", () => {

        //     // let li = document.createElement("li")
        //     // li.innerHTML = "Contenido " + Math.random() + "<a class='enlace'>x</a>";

        //     // container.appendChild(li);

        //     // se llama nuevamente el evento para que le asigne a cada enlace nuevo el evento de eliminar
        //     // eliminar();
            
        // })

        function eliminar() {
            // se recorren todos los elemntos a con clase .enlace
            for (var i = 0; i < enlaces.length; i++) {
                // se asigna el evento
                enlaces[i].onclick = function(e) {
                    var content = e.target.parentNode.parentNode;
                    var li = e.target.parentNode;
                    content.removeChild(li);
                };
            }
        }
        // si no se llama al incializar el documento no se pueden eliminar los ya existentes
        eliminar();
    }
</script>