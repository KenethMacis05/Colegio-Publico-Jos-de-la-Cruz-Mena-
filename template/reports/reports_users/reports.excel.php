<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>

<table class="table table-striped table-dark " id="table_id">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Password</th>
            <th>Permisos</th>
            <th>Primer nombre</th>
            <th>Primer apellido</th>
            <th>Telefono</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "gestion_escolar_jdlcm");
        $SQL = "CALL sp_read_user();";
        $dato = mysqli_query($conexion, $SQL);
        if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) {
        ?>
        <tr>
            <td><?php echo $fila['Usuario']; ?></td>
            <td><?php echo $fila['Contrasena']; ?></td>
            <td><?php echo $fila['Permisos']; ?></td>
            <td><?php echo $fila['Pri_Nombre']; ?></td>
            <td><?php echo $fila['Pri_Apellido']; ?></td>
            <td><?php echo $fila['Telefono']; ?></td>
        </tr>
        <?php
            }
        }