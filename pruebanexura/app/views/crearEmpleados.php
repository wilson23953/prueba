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

    <div class="container w-75 mt-3">
        <header>
            <h1>Crear empleado</h1>
        </header>

        <div class="container mt-4 mb-5">
            <div class="alert alert-primary" role="alert">
              Los campos con asteriscos (*) son obligatorios
            </div>

          <form id="formEmpleado" method="POST">

            <input type="hidden" id="id" name="id" value="<?= $datos['id'] ?>">
            <div class="row mb-3 align-items-center">
              <label class="col-sm-3 col-form-label text-end">Nombre completo *</label>
              <div class="col-sm-9">
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre completo del empleado" value="<?= htmlspecialchars($datos['nombre'] ?? '') ?>">
              </div>
            </div>

            <div class="row mb-3 align-items-center">
              <label class="col-sm-3 col-form-label text-end">Correo electrónico *</label>
              <div class="col-sm-9">
                <input type="email" id="email" name="email" class="form-control" placeholder="Correo electrónico" value="<?= htmlspecialchars($datos['email'] ?? '') ?>">
              </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-sm-3 col-form-label text-end">Sexo *</label>
                <div class="col-sm-9">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sexo" value="M" <?= $datos['sexo'] === 'M' ? 'checked' : '' ?> >
                      <label class="form-check-label" for="sexo">
                        Masculino
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sexo" value="F" <?= $datos['sexo'] === 'F' ? 'checked' : '' ?> >
                      <label class="form-check-label" for="sexo">
                        Femenino
                      </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 align-items-center">
              <label class="col-sm-3 col-form-label text-end">Área *</label>
              <div class="col-sm-9">
                <select class="form-select" name="area" id="area" aria-label="select">
                  <option selected>Seleccionar</option>
                  <option value="1" <?= $datos['area'] == '1' ? 'selected' : '' ?>>Ventas</option>
                  <option value="2" <?= $datos['area'] == '2' ? 'selected' : '' ?>>Calidad</option>
                  <option value="3" <?= $datos['area'] == '3' ? 'selected' : '' ?>>Producción</option>
                </select>
              </div>
            </div>

            <div class="row mb-3 align-items-center">
              <label class="col-sm-3 col-form-label text-end">Descripción *</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción de la experiencia del empleado"><?= htmlspecialchars($datos['descripcion'] ?? '') ?></textarea>
              </div>
            </div>

            <div class="row mb-3 align-items-center">
              <label class="col-sm-3 col-form-label text-end"></label>
              <div class="col-sm-9">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="boletin" name="boletin" <?= $datos['boletin'] ? 'checked' : '' ?>>
                  <label class="form-check-label" for="boletin">
                    Deseo recibir boletín informativo
                  </label>
                </div>
              </div>
            </div>

            <div class="row mb-3 align-items-center">
              <label class="col-sm-3 col-form-label text-end">Roles *</label>
              <div class="col-sm-9">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="rol1" name="rol" <?= ($datos['rol'] == '1') ? 'checked' : '' ?>>
                  <label class="form-check-label" for="rol1">
                    Profesional de proyectos - Desarrollador
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="2" id="rol2" name="rol" <?= ($datos['rol'] == '2') ? 'checked' : '' ?> onchange="validar(this)">
                  <label class="form-check-label" for="rol2">
                    Gerente estrátegico
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="3" id="rol3" name="rol" <?= ($datos['rol'] == '3') ? 'checked' : '' ?> onchange="validar(this)">
                  <label class="form-check-label" for="rol3">
                    Auxiliar administrativo
                  </label>
                </div>
              </div>
            </div>

            <div class="row">



              <div class="col-sm-9 offset-sm-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                
              </div>
            </div>
          </form>
        </div>

    </div>

</body>
</html>