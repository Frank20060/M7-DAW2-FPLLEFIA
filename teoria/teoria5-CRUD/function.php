<?php
session_start();

if(!isset($_SESSION['personajes'])){
    $_SESSION['personajes'] = 
        [   
            'id' => 0,
            'nombre' => 'Iron Man',
            'img' => 'https://preview.redd.it/my-drawing-of-iron-man-v0-zemup6vdi5le1.png?width=640&crop=smart&auto=webp&s=e2332067977b9152c8b0f481295df1255665cf8e',
            'poder' => 'Dinero y Robots',
            'descripcion' => 'Tony Stark, io con mucho dinero y mu listo que hace robots'
        ];
};

//Funcion para añadir personaje (CREATE en BDD)
function agregarPersonaje($nombre, $img, $poder, $descripcion){
    array_push($_SESSION['personajes'],
        [   
            'nombre' => $nombre,
            'img' => $img,
            'poder' => $poder,
            'descripcion' => $descripcion
        ]
    );
}
//Funcion que edita un personaje
function editarPersonaje($id, $nombre, $img, $poder, $descripcion){
    //Comprovamos id
    if(isset($_SESSION['personajes'][$id])){

        $_SESSION['personajes'][$id] = [
        [   
            'nombre' => $nombre,
            'img' => $img,
            'poder' => $poder,
            'descripcion' => $descripcion
        ]
        ];

    }
};



?>