<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Teoria 3 - Funciones</h1>

    <?php
    
        function suma($a, $b){
            return $a + $b;
        }

        function generarSaludo($nombre){

            return "Hola, " . $nombre. "!";
        }
        echo generarSaludo("Frank");
        echo '<br>';

        function calcularTotal($precio, $cantidad, $impuesto){

            $subtotal = $precio * $cantidad;
            $total = $subtotal + ($subtotal * $impuesto / 100);
            return $total;

        }
        echo calcularTotal(100, 2, 21);

        echo '<br>';
        ///Funiones array

        $palabras = ['Hola', 'mundo', 'desde','php'];
        $palabras_implode = implode(", " , $palabras);
        echo $palabras_implode;
        echo '<br>';

        $cadena = "hola,que,tal,estas";
        $palabras_explode = explode(",", $cadena);
        print_r($palabras_explode);



        



    ?>
    
</body>
</html>