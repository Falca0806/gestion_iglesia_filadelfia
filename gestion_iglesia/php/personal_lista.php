<?php

    $inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

    $tabla = "";

        // Consulta de busqueda
    if (isset($busqueda) && $busqueda != "") {
        $consulta_datos = "SELECT * FROM personal INNER JOIN cargos ON personal.cargos_id = cargos.cargos_id WHERE  personal.personal_nombre LIKE '%$busqueda%' OR personal.personal_dni LIKE '%$busqueda%' ORDER BY personal.personal_dni ASC LIMIT $inicio, $registros";

        $consulta_total = "SELECT COUNT(personal_id) FROM personal WHERE personal_nombre LIKE '%$busqueda%' OR personal_dni LIKE '%$busqueda%'";
        
    } else {
        $consulta_datos = "SELECT * FROM personal INNER JOIN cargos ON personal.cargos_id=cargos.cargos_id ORDER BY personal_dni ASC LIMIT $inicio, $registros";

        $consulta_total = "SELECT COUNT(personal_id) FROM personal";
    }

    $conexion = conexion();

    $datos = $conexion->query($consulta_datos);
    $datos = $datos->fetchAll();
    
    $total = $conexion->query($consulta_total);
    $total = (int) $total->fetchColumn();

    $numero_paginas = ceil( $total / $registros);

    $tabla .= '
        <div class="table-container">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Género</th>
                    <th scope="col">Estado Civil</th>
                    <th scope="col">Cargo</th>
                    <th colspan="2">Opciones</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
    ';

    if ($total >= 1 && $pagina <= $numero_paginas) {
        $contador = $inicio + 1;
        $pag_inicio = $inicio + 1;
        foreach ($datos as $rows) {
            $tabla .='
            <tr>
                <td>'. $contador .'</td>
                <td>'. $rows['personal_dni'] .'</td>
                <td>'. substr($rows['personal_nombre'], 0, 10) .'</td>
                <td>'. substr($rows['personal_apellido'], 0, 10) .'</td>
                <td>'. substr($rows['personal_fecha_nac'], 0, 25) .'</td>
                <td>'. substr($rows['personal_telefono'], 0, 25) .'</td>
                <td>'. substr($rows['personal_direccion'], 0, 10) .'</td>
                <td>'. substr($rows['personal_correo'], 0, 10) .'</td>
                <td>'. $rows['personal_genero'] .'</td>
                <td>'. $rows['personal_estado_civil'] .'</td>
                <td>'. $rows['cargos_nombre'] .'</td>
                <td>
                    <a href="index.php?vista=personal_edit&personal_id_edit='. $rows['personal_id'] .'" class="fa-solid fa-pen-to-square fa-xl" style="color: #FFD43B;"></a>                  
                </td>
                <td>
                    <a href="'. $url . $pagina . ' &personal_borrar='. $rows['personal_id'] .'" class="fa-solid fa-trash-can fa-xl" style="color: #ec2222;"></a>
                </td>
            </tr>
            ';
            $contador ++;
        }
        $pag_final = $contador - 1;
    } else {
        if ($total >= 1) {
            $tabla .= '
            <tr>
                <td colspan="6">
                    <a href="'. $url .' 1" class="button">
                        Haga clic acá para recargar el listado
                    </a>
                </td>
            </tr>
            ';
        } else {
            $tabla .= '
            <tr>
                <td colspan="7">
                    No hay registros en el sistema
                </td>
            </tr>
            ';
        }
        
        
    }
    
    
    $tabla .= '</tbody></table></div>';

    if ($total >= 1 && $pagina <= $numero_paginas) {
        $tabla .= '
        <p class="has-text-right">Mostrando personal <strong>'. $pag_inicio .'</strong> al <strong>'. $pag_final .'</strong> de un <strong>total de '. $total .'</strong></p>
        ';
    }
    $conexion = null;
    echo $tabla;

    //Paginador
    if ($total >= 1 && $pagina <= $numero_paginas) {
        echo paginador_tablas($pagina, $numero_paginas,$url, 1);
    }