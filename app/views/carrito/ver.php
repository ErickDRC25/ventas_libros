<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - Librería Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <!-- Contenido del Carrito -->
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">
                <i class="bi bi-cart3"></i> Mi Carrito
            </h2>
            <a href="index.php?controller=Catalogo&action=index" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Seguir comprando
            </a>
        </div>

        <?php if (empty($_SESSION['carrito'])): ?>
            <div class="card text-center py-5">
                <div class="card-body">
                    <i class="bi bi-cart-x text-muted" style="font-size: 3rem;"></i>
                    <h4 class="card-title mt-3">Tu carrito está vacío</h4>
                    <p class="card-text">Agrega algunos libros increíbles a tu carrito</p>
                    <a href="index.php?controller=Catalogo&action=index" class="btn btn-primary">
                        <i class="bi bi-bag-plus"></i> Explorar libros
                    </a>
                </div>
            </div>
        <?php else: ?>
            <form action="index.php?controller=Carrito&action=actualizar" method="POST">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Productos en el carrito</h5>
                            </div>
                            <div class="card-body p-0">
                                <?php
                                $total = 0;
                                foreach ($_SESSION['carrito'] as $item):
                                    $subtotal = $item['precio'] * $item['cantidad'];
                                    $total += $subtotal;
                                ?>
                                    <div class="border-bottom p-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="<?= $item['imagen'] ?>"
                                                    alt="<?= $item['titulo'] ?>"
                                                    class="img-fluid rounded"
                                                    style="width: 80px; height: 100px; object-fit: cover;">
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="mb-1"><?= $item['titulo'] ?></h6>
                                                <small class="text-muted">Disponible: <?= $item['stock'] ?></small>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="fw-bold">S/ <?= number_format($item['precio'], 2) ?></span>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number"
                                                    name="cantidad[<?= $item['id_libro'] ?>]"
                                                    value="<?= $item['cantidad'] ?>"
                                                    min="1"
                                                    max="<?= $item['stock'] ?>"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="d-flex flex-column align-items-center">
                                                    <span class="fw-bold text-primary">S/ <?= number_format($subtotal, 2) ?></span>
                                                    <a href="index.php?controller=Carrito&action=eliminar&id=<?= $item['id_libro'] ?>"
                                                        class="btn btn-sm btn-outline-danger mt-1"
                                                        onclick="return confirm('¿Eliminar este producto?')">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3">
                            <button type="submit" class="btn btn-outline-warning">
                                <i class="bi bi-arrow-repeat"></i> Actualizar cantidades
                            </button>
                            <a href="index.php?controller=Carrito&action=vaciar"
                                class="btn btn-outline-danger"
                                onclick="return confirm('¿Vaciar todo el carrito?')">
                                <i class="bi bi-cart-x"></i> Vaciar carrito
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Resumen de compra</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <span>S/ <?= number_format($total, 2) ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Envío:</span>
                                    <span class="text-success">Gratis</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-3">
                                    <strong>Total:</strong>
                                    <strong class="text-primary">S/ <?= number_format($total, 2) ?></strong>
                                </div>

                                <a href="index.php?controller=Carrito&action=procesarCompra"
                                    class="btn btn-success w-100"
                                    onclick="return confirm('¿Confirmar compra?')">
                                    <i class="bi bi-credit-card"></i> Proceder al pago
                                </a>

                                <div class="mt-3 text-center">
                                    <small class="text-muted">
                                        <i class="bi bi-shield-check"></i> Compra segura
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>