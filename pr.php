<!DOCTYPE html>
<html lang="es">

<head>
    <title>Título</title>
    <meta charset="UTF-8" />
    <!-- Loading Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <form>
        <input type="radio" name="option" id="radio1" checked />
        <label for="radio1">
            <span class="fa-stack">
                <i class="fa fa-circle-o fa-stack-1x"></i>
                <i class="fa fa-circle fa-stack-1x"></i>
            </span>
            Hombre
        </label><br />
        <input type="radio" name="option" id="radio2" />
        <label for="radio2">
            <span class="fa-stack">
                <i class="fa fa-circle-o fa-stack-1x"></i>
                <i class="fa fa-circle fa-stack-1x"></i>
            </span>
            Mujer
        </label><br />
        <input type="checkbox" name="option" id="check1" checked />
        <label for="check1">
            <span class="fa-stack">
                <!-- <i class="far fa-thumbs-up fa-stack-1x"></i> -->
                <i class="fa fa-thumbs-up fa-stack-1x"></i>
            </span>
            DVD
        </label>

        <label>
            <input type='checkbox' hidden />
            <!-- <span>check</span> -->
            <span>
            <i class="fa fa-thumbs-up fa-stack-1x"></i>
                
            </span>

            <label>

                <br />
                <input type="checkbox" name="option" id="check2" />
                <label for="check2">
                    <span class="fa-stack">
                        <i class="far fa-thumbs-up fa-stack-1x"></i>
                        <i class="fa fa-check fa-stack-1x"></i>
                    </span>
                    CD
                </label><br />
    </form>
</body>

</html>
<style>
    /* Hidding the radiobuttons &amp; checkboxes */
    input[type="radio"],
    input[type="checkbox"] {
        display: none;
    }

    /* Styling background */
    label i:first-child {
        color: gray;
    }

    /* Hidding the "check" status of inputs */
    input[type="radio"]+label .fa-circle,
    input[type="checkbox"]+label .fa-check {
        display: none;
    }

    /* Styling the "check" status */
    input[type="radio"]:checked+label .fa-circle,
    input[type="checkbox"]:checked+label .fa-thumbs-up {
        display: block;
        color: blue;
    }

    /* Styling checkboxes */
    input[type="checkbox"]:checked+label .fa-check {
        position: relative;
        left: .125em;
        bottom: .125em;
    }

    /* Styling radiobuttons */
    input[type="radio"]:checked+label .fa-circle-o {
        display: none;
    }
    label{ cursor:pointer; user-select:none; }
input:checked + span::before {
  content: ' <i class="far fa-thumbs-up fa-stack-1x"></i>';
}
</style>

<!-- <script>
    label {
        cursor: pointer;user - select: none;
    }
    input: checked + span::before {
        content: 'un';
    }
</script> -->