<div class="card shadow">
    <div class="card-header bg-info text-white">
        <h2 class="card-title mb-0">
            <i class="bi bi-receipt"></i> Detalle de Venta #<?= explode(' ', $titulo)[3] ?>
        </h2>
    </div>
    <div class="card-body">
        <?php if (empty($detalles)): ?>
            <div class="alert alert-warning">No se encontraron detalles para esta venta.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Libro</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($detalles as $detalle):
                            $subtotal = $detalle['precio_unitario'] * $detalle['cantidad'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $detalle['imagen'] ?>"
                                            alt="<?= $detalle['titulo'] ?>"
                                            class="rounded me-3"
                                            width="50" height="65">
                                        <div>
                                            <strong><?= $detalle['titulo'] ?></strong>
                                        </div>
                                    </div>
                                </td>
                                <td>S/ <?= number_format($detalle['precio_unitario'], 2) ?></td>
                                <td><?= $detalle['cantidad'] ?></td>
                                <td class="fw-bold">S/ <?= number_format($subtotal, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="table-dark">
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td><strong>S/ <?= number_format($total, 2) ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="index.php?controller=Venta&action=index" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al listado
                </a>
                <button onclick="window.print()" class="btn btn-primary">
                    <i class="bi bi-printer"></i> Imprimir
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>