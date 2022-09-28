<?php if ($_SESSION["rolid"] != 2) : ?>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky shadow-lg">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <i class="fas fa-home"> <a href="./">Home - Dashboard</a>
                            </i>
                        </li>
                        <div class="list-group list-group-flush">

                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./"><i class="fas fa-home"></i>Home - Dashboard</a>
                            <?php if ($_SESSION["rolid"] != 2) : ?>

                                <a class="list-group-item list-group-item-action list-group-item-light p-3" id="verNoticia">Noticias</a>
                            <?php endif; ?>

                            <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" id="verCliente">Clientes</a> -->
                            <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" id="proveedor">Proveedores</a> -->
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
<?php else: ?>
    <script>
        $(document).ready(function() {
            $(function borraClass() {
                $("#hey").removeClass("col-md-9");
                $("#hey").removeClass("col-lg-10");
            });
        });
    </script>
<?php endif; ?>