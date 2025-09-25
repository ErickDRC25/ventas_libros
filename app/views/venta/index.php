<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h2 class="card-title mb-0">
            <i class="bi bi-cart-check"></i> Historial de Ventas
        </h2>
    </div>
    <div class="card-body">
        <?php if (empty($ventas)): ?>
            <div class="text-center py-4">
                <i class="bi bi-cart-x display-1 text-muted"></i>
                <h4 class="text-muted">No hay ventas registradas</h4>
                <p class="text-muted">Aún no se han realizado ventas en el sistema.</p>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Venta</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Items</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ventas as $venta): ?>
                            <tr>
                                <td><strong>#<?= $venta['id_venta'] ?></strong></td>
                                <td>
                                    <?= $venta['nombre'] ?> <?= $venta['apellido'] ?>
                                    <br><small class="text-muted"><?= $venta['correo'] ?></small>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($venta['fecha_venta'])) ?></td>
                                <td class="fw-bold text-success">S/ <?= number_format($venta['monto_total'], 2) ?></td>
                                <td>
                                    <?php
                                    $detalleModel = new DetalleVenta();
                                    $items = $detalleModel->obtenerPorVenta($venta['id_venta']);
                                    echo count($items);
                                    ?>
                                </td>
                                <td>
                                    <a href="index.php?controller=Venta&action=detalle&id=<?= $venta['id_venta'] ?>"
                                        class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Ver Detalle
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>