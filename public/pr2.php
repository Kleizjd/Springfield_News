<style>form {
margin-bottom: 3px;
}
form span {
display:inline-block;
width:100px;
}</style>
<link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
<div class="cantidadProducto">
     <p>Cantidad</p>
     <form name="formCantidad">
           <span>Pan</span>
           <a onclick="aumentarUno(this)"><i class="fas fa-angle-up"></i></a>
           <input type="text" name="numero" class="numeroCantidadProducto" value="1" ReadOnly>
           <a onclick="disminuirUno(this)"><i class="fas fa-angle-down"></i></a>
     </form>
     <form name="formCantidad">
           <span>Leche</span>
           <a onclick="aumentarUno(this)"><i class="fas fa-angle-up"></i></a>
           <input type="text" name="numero" class="numeroCantidadProducto" value="1" ReadOnly>
           <a onclick="disminuirUno(this)"><i class="fas fa-angle-down"></i></a>
     </form>
     <form name="formCantidad">
           <span>Huevos</span>
           <a onclick="aumentarUno(this)"><i class="fas fa-angle-up"></i></a>
           <input type="text" name="numero" class="numeroCantidadProducto" value="1" ReadOnly>
           <a onclick="disminuirUno(this)"><i class="fas fa-angle-down"></i></a>
     </form>
     <form name="formCantidad">
           <span>Harina</span>
           <a onclick="aumentarUno(this)"><i class="fas fa-angle-up"></i></a>
           <input type="text" name="numero" class="numeroCantidadProducto" value="1" ReadOnly>
           <a onclick="disminuirUno(this)"><i class="fas fa-angle-down"></i></a>
     </form>
</div>
<script>
      function aumentarUno(element)
{
    var form = element.parentNode;
    if(form.numero.value < 10){
        form.numero.value ++;
    }else{
        alert("La cantidad maxima de productos a comprar es 10");
    }
}

function disminuirUno(element)
{
    var form = element.parentNode;
    if(form.numero.value > 0){
        form.numero.value--;
    }else{
        alert("Su carrito ya está en cero");
    }
}

</script>