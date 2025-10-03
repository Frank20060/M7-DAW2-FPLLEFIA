<?php

// Función para generar la tabla de productos

    function generarTablaProductos($productos){

        $tabla = '<table class="tabla-productos">';
        $tabla .= '<tr><th>Imagen</th><th>Nombre</th><th>Precio (€)</th><th>Disponibilidad</th></tr>';

        foreach($productos as $producto){
            $disponibilidad = $producto['disponible'] ? 'Disponible' : 'No disponible';
            $claseDisponibilidad = $producto['disponible'] ? 'disponible' : 'no-disponible';

            $tabla .= '<tr>';
            $tabla .= '<td><img src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '" class="imagen-producto"></td>';
            $tabla .= '<td>' . $producto['nombre'] . '</td>';
            $tabla .= '<td>' . $producto['precio'] . '</td>';
            $tabla .= '<td class="' . $claseDisponibilidad . '">' . $disponibilidad . '</td>';
            $tabla .= '</tr>';
        }

        $tabla .= '</table>';

        return $tabla;

    }

    function muestraInfoContacto($nombre, $telefono, $foto){

        $info = '<div class="info-contacto">';
        $info .= '<img src="' . $foto . '" alt="Foto de perfil" class="foto-perfil">';
        $info .= '<p><strong>Nombre:</strong> ' . $nombre . '</p>';
        $info .= '<p><strong>Teléfono:</strong> ' . $telefono . '</p>';
        $info .= '</div>';  
        return $info;

    }

?>