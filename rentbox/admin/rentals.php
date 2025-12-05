<?php 
session_start();
if(!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== 'admin') {
    header('Location: ../error.php'); exit;
}
include_once '../dataBase/config/databaseConfig.php';

include_once './adminQuerrys/lloguers.php';
$llogers = getAllLloguers();

include_once './adminQuerrys/vehicles.php';
include_once './adminQuerrys/clients.php';




?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lloguers - RentBox Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-car-front-fill me-2"></i>RentBox</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><span class="nav-link"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['nom'] ?? 'Admin'; ?></span></li>
            <li class="nav-item"><a class="nav-link" href="../auth/logout.php"><i class="bi bi-box-arrow-right"></i> Sortir</a></li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <nav class="nav flex-column py-3">
                <a class="nav-link" href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a class="nav-link" href="vehicles.php"><i class="bi bi-car-front"></i> Vehicles</a>
                <a class="nav-link" href="clients.php"><i class="bi bi-people"></i> Clients</a>
                <a class="nav-link active" href="rentals.php"><i class="bi bi-calendar-check"></i> Lloguers</a>
            </nav>
        </div>
        
        <div class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-calendar-check"></i> Gestió de Lloguers</h2>
                <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#crearLloguerModal">
                    Crear Lloguer
                </button>
            </div>
            
            <div class="card card-custom mb-4">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Tots els clients</option>
                                <option>Joan Garcia</option>
                                <option>Maria López</option>
                                <option>Pere Sánchez</option>
                                <option>Laura Rodríguez</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Tots els vehicles</option>
                                <option>Xiaomi Scooter Pro</option>
                                <option>Bici Urbana City</option>
                                <option>Moto Elèctrica NIU</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Tots els estats</option>
                                <option>Actiu</option>
                                <option>Pendent</option>
                                <option>Finalitzat</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary-custom w-100">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card card-custom">
                <div class="card-body">
                    <table class="table table-custom table-hover">
                         <thead>
                            <tr>
                                <th>Usuari</th>
                                <th>Vehicle</th>
                                <th>Data Inici</th>
                                <th>Data Fi</th>
                                <th>Estat</th>
                                <th>Preu Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($llogers as $lloguer): ?>
                                <tr>
                                    <td><?= $lloguer['usuari'] ?></td>
                                    <td><?= $lloguer['vehicle'] ?></td>
                                    <td><?= $lloguer['data_inici'] ?></td>
                                    <td><?= $lloguer['data_fi'] ?></td>
                                    <td>
                                        <span class="badge <?= $lloguer['estat'] === 'actiu' ? 'bg-success' : 'bg-secondary' ?>">
                                            <?= $lloguer['estat'] ?>
                                        </span>
                                    </td>
                                    <td><?= $lloguer['preu_total'] ?>€</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="crearLloguerModal" tabindex="-1" aria-labelledby="crearLloguerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="./crearLloguer.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="crearLloguerModalLabel">Crear Lloguer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Usuari</label>
            <select name="usuari_id" class="form-select" required>
              <?php
              $usuarios = getUsuaris();
              foreach($usuarios as $usuario) {
                  echo "<option value='{$usuario['id']}'>{$usuario['nom']} {$usuario['cognoms']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label>Vehicle</label>
            <select name="vehicle_id" class="form-select" required>
              <?php
              $vehiculos = getVehiclesDisponibles();
              foreach($vehiculos as $vehiculo) {
                  echo "<option value='{$vehiculo['id']}'>{$vehiculo['nom']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label>Data Inici</label>
            <input type="date" name="data_inici" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Data Fi</label>
            <input type="date" name="data_fi" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Estat</label>
            <select name="estat" class="form-select" required>
              <option value="actiu">Actiu</option>
              <option value="pendent">Pendent</option>
              <option value="finalitzat">Finalitzat</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-orange">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>