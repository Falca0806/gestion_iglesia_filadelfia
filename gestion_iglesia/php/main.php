<?php

// Conexion  bdd- verificacion de datos y funciones 
function conexion(){
    $pdo = new PDO('mysql:host=localhost;dbname=gestion_iglesia2','root','');
    return $pdo;
}

// Verificiar datos
function verificar_datos($filtro,$cadena){
    if (preg_match("/^" . $filtro . "$/",$cadena)) {
        return false;
    } else {
        return true;
    }

}


    //Limpiar cadenas de texto
    function limpiar_cadena($cadena){
        $cadena = trim($cadena); //Elimina espacios
        $cadena = stripslashes($cadena); //Elimina barras /
        $cadena = str_ireplace("<script>","",$cadena); //
        $cadena = str_ireplace("</script>","",$cadena); //
        $cadena = str_ireplace("<script src>","",$cadena);
        $cadena = str_ireplace("<script type=>","",$cadena); 
        $cadena = str_ireplace("SELECT * FROM","",$cadena); 
        $cadena = str_ireplace("DELETE FROM","",$cadena); 
        $cadena = str_ireplace("INSERT INTO","",$cadena); 
        $cadena = str_ireplace("DROP TABLE","",$cadena);
        $cadena = str_ireplace("DROP DATABASE","",$cadena);
        $cadena = str_ireplace("TRUNCATE TABLE","",$cadena);
        $cadena = str_ireplace("SHOW TABLES","",$cadena);
        $cadena = str_ireplace("SHOW DATABASES","",$cadena);
        $cadena = str_ireplace("<?php","",$cadena);
        $cadena = str_ireplace("?>","",$cadena);
        $cadena = str_ireplace("</script>","",$cadena);
        $cadena = str_ireplace("--","",$cadena);
        $cadena = str_ireplace("^","",$cadena);
        $cadena = str_ireplace("<","",$cadena);
        $cadena = str_ireplace("[","",$cadena);
        $cadena = str_ireplace("]","",$cadena);
        $cadena = str_ireplace("==","",$cadena);
        $cadena = str_ireplace(";","",$cadena);
        $cadena = str_ireplace("::","",$cadena);
        $cadena = trim($cadena); //Elimina espacios
        $cadena = stripslashes($cadena); //Elimina barras /
        return $cadena;
    }

    
    //Funcion paginador de tablas

    function paginador_tablas($pagina, $numero_paginas,$url, $botones){
    $tabla = '<nav aria-label="Page navigation example">';



    if ($pagina<=1) {
        $tabla .='
        <ul class="pagination justify-content-end">
        <li class="page-item disabled" disabled>
        <a class="page-link">Anterior</a>
        </li>';
        
    }else{
        $tabla .='
        <ul class="pagination justify-content-end">
        <li class="page-item">
        <a class="page-link" href="'.$url.($pagina-1).'">Anterior</a>
        </li>
        <li class="page-item">
        <a class="page-link" href="'.$url.'1">1</a>
        </li>
        ';
        
    }

    $contador=0;
    for ($i=$pagina; $i<=$numero_paginas; $i++) { 
        if($contador>=$botones){
            break;
        }
        if ($pagina==$i) {
            $tabla.='<li class="page-item primary"><a class="page-link" href="'.$url.$i.'">'.$i.'</a></li>';
        }else{
            $tabla.='<li class="page-item"><a class="page-link" href="'.$url.$i.'">'.$i.'</a></li>';
        }

        $contador++;
    }

    
    if ($pagina==$numero_paginas) {
        $tabla .='
        <li class="page-item">
        <a class="page-link disabled" disabled >Siguiente</a>
        </li>
        </ul>
        ';
        
    }else{
        $tabla .='
        <li class="page-item"><a class="page-link" href="'.$url.$numero_paginas.'">'.$numero_paginas.'</a></li>
        <li class="page-item">
        <a class="page-link" href="'.$url.($pagina+1).'">Siguiente</a>
        </li>
        </ul>
        ';
        
    }



    $tabla.='</nav>';
    return $tabla;
}