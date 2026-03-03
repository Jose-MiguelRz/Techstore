<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Panel Administrativo</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        /* Estilos específicos del admin */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: white;
            border-right: 1px solid #e2e8f0;
            padding: 2rem 1.5rem;
        }

        .sidebar-logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }

        .sidebar-menu a {
            display: block;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: #475569;
            text-decoration: none;
            transition: all 0.2s;
            font-weight: 500;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #2563eb;
            color: white;
        }

        .sidebar-menu a i {
            margin-right: 0.75rem;
        }

        /* Main content */
        .main-content {
            flex: 1;
            background: #f8fafc;
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 2rem;
            color: #0f172a;
        }

        .date-badge {
            background: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }

        /* Stats grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .stat-card h3 {
            color: #64748b;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.25rem;
        }

        .stat-trend {
            color: #10b981;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        /* Charts container */
        .charts-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .chart-card h3 {
            margin-bottom: 1rem;
            color: #0f172a;
        }

        /* Recent products */
        .recent-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .add-product-btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-header h2 {
            color: #0f172a;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #64748b;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #475569;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 1rem;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #2563eb;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .edit-btn, .delete-btn {
            padding: 0.4rem 0.8rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .edit-btn {
            background: #dbeafe;
            color: #1e40af;
        }

        .delete-btn {
            background: #fee2e2;
            color: #991b1b;
        }

        @media (max-width: 768px) {
            .admin-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
            }
            .charts-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "mi_catalogo");
    
    // Procesar acciones del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action'])) {
            if ($_POST['action'] === 'add') {
                $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio, categoria) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssds", $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['categoria']);
                $stmt->execute();
            } elseif ($_POST['action'] === 'edit') {
                $stmt = $conn->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, categoria=? WHERE id=?");
                $stmt->bind_param("ssdsi", $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['categoria'], $_POST['id']);
                $stmt->execute();
            } elseif ($_POST['action'] === 'delete') {
                $stmt = $conn->prepare("DELETE FROM productos WHERE id=?");
                $stmt->bind_param("i", $_POST['id']);
                $stmt->execute();
            }
            header("Location: admin.php");
            exit;
        }
    }
    
    // Obtener estadísticas
    $total_productos = $conn->query("SELECT COUNT(*) as count FROM productos")->fetch_assoc()['count'];
    $total_categorias = $conn->query("SELECT COUNT(DISTINCT categoria) as count FROM productos")->fetch_assoc()['count'];
    $precio_promedio = $conn->query("SELECT AVG(precio) as avg FROM productos")->fetch_assoc()['avg'];
    $producto_caro = $conn->query("SELECT MAX(precio) as max FROM productos")->fetch_assoc()['max'];
    
    // Obtener productos
    $productos = $conn->query("SELECT * FROM productos ORDER BY id DESC");
    
    // Obtener datos para gráficas
    $cat_stats = $conn->query("SELECT categoria, COUNT(*) as total FROM productos GROUP BY categoria");
    $categorias_labels = [];
    $categorias_data = [];
    while($row = $cat_stats->fetch_assoc()) {
        $categorias_labels[] = $row['categoria'];
        $categorias_data[] = $row['total'];
    }
    ?>
    
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-logo">TechStore Admin</div>
            <ul class="sidebar-menu">
                <li><a href="#" class="active"><i>📊</i> Dashboard</a></li>
                <li><a href="#"><i>📦</i> Productos</a></li>
                <li><a href="#"><i>🛒</i> Órdenes</a></li>
                <li><a href="#"><i>👥</i> Clientes</a></li>
                <li><a href="#"><i>⚙️</i> Configuración</a></li>
                <li><a href="index.php" target="_blank"><i>🌐</i> Ver Tienda</a></li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
                <div class="date-badge"><?php echo date('l, F j, Y'); ?></div>
            </div>
            
            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Productos</h3>
                    <div class="stat-number"><?php echo $total_productos; ?></div>
                    <div class="stat-trend">+12% vs mes anterior</div>
                </div>
                <div class="stat-card">
                    <h3>Categorías</h3>
                    <div class="stat-number"><?php echo $total_categorias; ?></div>
                    <div class="stat-trend"><?php echo $total_categorias; ?> categorías activas</div>
                </div>
                <div class="stat-card">
                    <h3>Precio Promedio</h3>
                    <div class="stat-number">$<?php echo number_format($precio_promedio, 2); ?></div>
                    <div class="stat-trend">↑ 5% este mes</div>
                </div>
                <div class="stat-card">
                    <h3>Producto más caro</h3>
                    <div class="stat-number">$<?php echo number_format($producto_caro, 2); ?></div>
                    <div class="stat-trend">Producto premium</div>
                </div>
            </div>
            
            <!-- Charts -->
            <div class="charts-row">
                <div class="chart-card">
                    <h3>Distribución por Categoría</h3>
                    <canvas id="categoriasChart" style="width:100%; height:200px;"></canvas>
                </div>
                <div class="chart-card">
                    <h3>Ventas Mensuales (Demo)</h3>
                    <canvas id="ventasChart" style="width:100%; height:200px;"></canvas>
                </div>
            </div>
            
            <!-- Recent Products -->
            <div class="recent-header">
                <h2 style="color: #0f172a;">Productos Recientes</h2>
                <button class="add-product-btn" onclick="openModal('add')">
                    <span>+</span> Agregar Producto
                </button>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($producto = $productos->fetch_assoc()): ?>
                        <tr>
                            <td>#<?php echo $producto['id']; ?></td>
                            <td><strong><?php echo $producto['nombre']; ?></strong><br><small style="color:#64748b;"><?php echo substr($producto['descripcion'], 0, 30); ?>...</small></td>
                            <td><span class="badge badge-info"><?php echo $producto['categoria']; ?></span></td>
                            <td><strong>$<?php echo number_format($producto['precio'], 2); ?></strong></td>
                            <td><span class="badge badge-success">En stock</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="edit-btn" onclick="openModal('edit', <?php echo htmlspecialchars(json_encode($producto)); ?>)">Editar</button>
                                    <form method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar producto?')">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                        <button type="submit" class="delete-btn">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Modal para agregar/editar producto -->
    <div class="modal" id="productModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Agregar Producto</h2>
                <button class="close-modal" onclick="closeModal()">×</button>
            </div>
            <form method="POST" id="productForm">
                <input type="hidden" name="action" id="formAction" value="add">
                <input type="hidden" name="id" id="productId">
                
                <div class="form-group">
                    <label>Nombre del Producto</label>
                    <input type="text" name="nombre" id="productName" required>
                </div>
                
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" id="productDesc" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Precio</label>
                    <input type="number" step="0.01" name="precio" id="productPrice" required>
                </div>
                
                <div class="form-group">
                    <label>Categoría</label>
                    <select name="categoria" id="productCategory" required>
                        <option value="Electrónica">Electrónica</option>
                        <option value="Libros">Libros</option>
                        <option value="Accesorios">Accesorios</option>
                        <option value="Hogar">Hogar</option>
                        <option value="Deportes">Deportes</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width:100%;">Guardar Producto</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráfica de categorías
        new Chart(document.getElementById('categoriasChart'), {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($categorias_labels); ?>,
                datasets: [{
                    data: <?php echo json_encode($categorias_data); ?>,
                    backgroundColor: ['#2563eb', '#7c3aed', '#db2777', '#ea580c', '#16a34a']
                }]
            }
        });
        
        // Gráfica de ventas (demo)
        new Chart(document.getElementById('ventasChart'), {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Ventas 2026',
                    data: [65, 78, 82, 89, 94, 103],
                    borderColor: '#2563eb',
                    tension: 0.4
                }]
            }
        });
        
        // Modal functions
        function openModal(action, product = null) {
            const modal = document.getElementById('productModal');
            const title = document.getElementById('modalTitle');
            const formAction = document.getElementById('formAction');
            
            if (action === 'edit' && product) {
                title.textContent = 'Editar Producto';
                formAction.value = 'edit';
                document.getElementById('productId').value = product.id;
                document.getElementById('productName').value = product.nombre;
                document.getElementById('productDesc').value = product.descripcion;
                document.getElementById('productPrice').value = product.precio;
                document.getElementById('productCategory').value = product.categoria;
            } else {
                title.textContent = 'Agregar Producto';
                formAction.value = 'add';
                document.getElementById('productId').value = '';
                document.getElementById('productForm').reset();
            }
            
            modal.classList.add('active');
        }
        
        function closeModal() {
            document.getElementById('productModal').classList.remove('active');
        }
        
        // Cerrar modal con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>