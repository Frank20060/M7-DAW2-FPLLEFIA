<?php
/*----------------------------------------------------------------------------------------
 * Copyright (c) Microsoft Corporation. All rights reserved.
 * Licensed under the MIT License. See LICENSE in the project root for license information.
 *---------------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Portafolio - Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            padding: 100px 20px;
            text-align: center;
        }
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        footer {
            background-color: #212529;
            color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Mi Portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#proyectos">Proyectos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sobre-mi">Sobre mí</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <h1 class="display-4">¡Hola! Soy Desarrollador Web</h1>
        <p class="lead">Construyo sitios web modernos, responsivos y rápidos.</p>
        <a href="#proyectos" class="btn btn-light btn-lg">Ver Proyectos</a>
    </section>

    <!-- Proyectos -->
    <section id="proyectos" class="container my-5">
        <h2 class="text-center mb-4">Mis Proyectos</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Proyecto 1">
                    <div class="card-body">
                        <h5 class="card-title">Proyecto 1</h5>
                        <p class="card-text">Descripción breve del proyecto.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Proyecto 2">
                    <div class="card-body">
                        <h5 class="card-title">Proyecto 2</h5>
                        <p class="card-text">Descripción breve del proyecto.</p>
                        <a href="#" class="btn btn-success">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Proyecto 3">
                    <div class="card-body">
                        <h5 class="card-title">Proyecto 3</h5>
                        <p class="card-text">Descripción breve del proyecto.</p>
                        <a href="#" class="btn btn-warning">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sobre mí -->
    <section id="sobre-mi" class="container my-5">
        <h2 class="text-center mb-4">Sobre mí</h2>
        <p class="text-center">Soy un desarrollador apasionado por el diseño y la tecnología. 
        Me gusta crear soluciones digitales que sean útiles y atractivas para los usuarios.</p>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="container my-5">
        <h2 class="text-center mb-4">Contacto</h2>
        <form class="mx-auto" style="max-width: 600px;">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" placeholder="Tu nombre">
            </div>
            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="email" class="form-control" placeholder="tu@email.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Mensaje</label>
                <textarea class="form-control" rows="4" placeholder="Escribe tu mensaje"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <p>© <?php echo date("Y"); ?> Mi Portafolio. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
