<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="/pruebanexura/public/js/empleados.js" defer></script>
    <title>Prueba</title>
</head>
<body>
    <div class="container mt-3">
        <header>
            <h1>Lista de empleados</h1>
        </header>

        <div class="d-flex justify-content-end">
            <button class="btn btn-primary btn-sm" onclick="window.location.href='/pruebanexura/empleados/nuevo'">
              <i class="bi bi-person-plus-fill"></i> Crear
            </button>
        </div>

        <main>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col"><i class="bi bi-person-fill"></i> Nombre</th>
                  <th scope="col">@ Email</th>
                  <th scope="col"><i class="bi bi-gender-ambiguous"></i> Sexo</th>
                  <th scope="col"><i class="bi bi-briefcase-fill"></i> Área</th>
                  <th scope="col"><i class="bi bi-briefcase-fill"></i> Boletín</th>
                  <th scope="col">Modificar</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($empleados as $emp): ?>
                    <tr id="fila<?= $emp["id"] ?>">
                        <td><?= $emp["id"] ?></td>
                        <td><?= $emp["nombre"] ?></td>
                        <td><?= $emp["email"] ?></td>
                        <td><?= $emp["sexo"] ?></td>
                        <td><?= $emp["area"] ?></td>
                        <td><?= $emp["boletin"] ?></td>
                        <td><button type="button" class="btn" onclick="editar(<?= $emp["id"] ?>);"><i class="bi bi-pencil-square"></i></button></td>
                        <td><button type="button" class="btn" onclick="eliminarEmpleado(<?= $emp["id"] ?>)"><i class="bi bi-trash-fill"></i></button></td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        </main>
    </div>
</body>
</html>