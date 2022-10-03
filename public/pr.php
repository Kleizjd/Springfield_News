<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a onclick="aumentarUno(this)"><i class="fas fa-angle-up">hey</i></a>
<button type="button" onclick="aumentarUno(this)">hello</button>
</body>
</html>
<script>
    function aumentarUno(element)
{
    var form = element.parentNode;
    if(form.numero.val < 10){
        form.numero.val ++;
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