<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Tu tienda de tecnología</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        /* Estilos específicos de la tienda */
        .navbar {
            background: white;
            padding: 1rem 5%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #475569;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: #2563eb;
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #2563eb;
            color: white;
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            border-radius: 9999px;
        }

        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 5%;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.95;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-section {
            max-width: 600px;
            margin: 2rem auto;
            padding: 0 5%;
        }

        .search-box {
            display: flex;
            gap: 0.5rem;
            background: white;
            padding: 0.25rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }

        .search-box input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
        }

        .search-box button {
            padding: 0 2rem;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }

        .search-box button:hover {
            background: #1d4ed8;
        }

        .categories {
            padding: 2rem 5%;
        }

        .categories h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        .category-pills {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .category-pill {
            padding: 0.75rem 1.5rem;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 9999px;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
        }

        .category-pill:hover,
        .category-pill.active {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            padding: 2rem 5%;
        }

        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s;
            border: 1px solid #e2e8f0;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .product-image {
            height: 200px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            font-size: 0.85rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .product-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1e293b;
        }

        .product-description {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2563eb;
        }

        .add-to-cart {
            padding: 0.5rem 1rem;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .add-to-cart:hover {
            background: #1d4ed8;
        }

        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -2px 0 20px rgba(0,0,0,0.1);
            transition: right 0.3s;
            z-index: 1000;
            padding: 2rem;
        }

        .cart-sidebar.open {
            right: 0;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .close-cart {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #64748b;
        }

        .cart-items {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
        }

        .cart-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .cart-item-price {
            color: #2563eb;
            font-weight: 600;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            background: white;
            cursor: pointer;
        }

        .cart-total {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: white;
            border-top: 1px solid #e2e8f0;
        }

        .checkout-btn {
            width: 100%;
            padding: 1rem;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1rem;
        }

        .footer {
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 3rem 5%;
            margin-top: 4rem;
            text-align: center;
            color: #64748b;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            .cart-sidebar { width: 100%; right: -100%; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">TechStore</div>
        <div class="nav-links">
            <a href="#">Inicio</a>
            <a href="#">Productos</a>
            <a href="#">Ofertas</a>
            <a href="#">Contacto</a>
            <div class="cart-icon" onclick="toggleCart()">
                🛒
                <span class="cart-count" id="cartCount">0</span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Bienvenido a TechStore</h1>
        <p>Descubre la mejor tecnología con los mejores precios y envío gratis a todo el país</p>
    </section>

    <?php
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "mi_catalogo");
    
    // Obtener categorías únicas
    $categorias = $conn->query("SELECT DISTINCT categoria FROM productos ORDER BY categoria");
    
    // Obtener productos (con filtro si hay búsqueda)
    $where = "";
    if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
        $busqueda = $conn->real_escape_string($_GET['buscar']);
        $where = " WHERE nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%'";
    }
    if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
        $categoria = $conn->real_escape_string($_GET['categoria']);
        $where = $where ? $where . " AND categoria = '$categoria'" : " WHERE categoria = '$categoria'";
    }
    
    $productos = $conn->query("SELECT * FROM productos" . $where);
    ?>

    <!-- Barra de búsqueda -->
    <div class="search-section">
        <form class="search-box" method="GET">
            <input type="text" name="buscar" placeholder="Buscar productos..." value="<?php echo $_GET['buscar'] ?? ''; ?>">
            <button type="submit">Buscar</button>
        </form>
    </div>

    <!-- Categorías -->
    <div class="categories">
        <h2>Categorías</h2>
        <div class="category-pills">
            <a href="?<?php echo isset($_GET['buscar']) ? 'buscar='.$_GET['buscar'] : ''; ?>" class="category-pill <?php echo !isset($_GET['categoria']) ? 'active' : ''; ?>">Todos</a>
            <?php while($cat = $categorias->fetch_assoc()): ?>
            <a href="?categoria=<?php echo urlencode($cat['categoria']); ?><?php echo isset($_GET['buscar']) ? '&buscar='.$_GET['buscar'] : ''; ?>" 
               class="category-pill <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == $cat['categoria']) ? 'active' : ''; ?>">
                <?php echo $cat['categoria']; ?>
            </a>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Grid de productos -->
    <div class="products-grid">
        <?php if ($productos->num_rows > 0): ?>
            <?php while($producto = $productos->fetch_assoc()): ?>
            <div class="product-card">
                <div class="product-image">
                    <?php
                    // Icono según categoría
                    $iconos = [
                        'Electrónica' => '💻',
                        'Libros' => '📚',
                        'Accesorios' => '🎧'
                    ];
                    echo $iconos[$producto['categoria']] ?? '📦';
                    ?>
                </div>
                <div class="product-info">
                    <div class="product-category"><?php echo $producto['categoria']; ?></div>
                    <h3 class="product-name"><?php echo $producto['nombre']; ?></h3>
                    <p class="product-description"><?php echo $producto['descripcion']; ?></p>
                    <div class="product-footer">
                        <span class="product-price">$<?php echo number_format($producto['precio'], 2); ?></span>
                        <button class="add-to-cart" onclick="addToCart(<?php echo $producto['id']; ?>, '<?php echo addslashes($producto['nombre']); ?>', <?php echo $producto['precio']; ?>)">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div style="grid-column: 1/-1; text-align: center; padding: 4rem; color: #64748b;">
                <p style="font-size: 1.2rem;">No se encontraron productos</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Carrito de compras (sidebar) -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h2>Tu Carrito</h2>
            <button class="close-cart" onclick="toggleCart()">×</button>
        </div>
        <div class="cart-items" id="cartItems">
            <!-- Los items se agregarán dinámicamente con JavaScript -->
        </div>
        <div class="cart-total">
            <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                <span>Subtotal:</span>
                <span id="cartSubtotal">$0.00</span>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; color: #10b981;">
                <span>Envío:</span>
                <span>Grátis</span>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; font-weight: 600;">
                <span>Total:</span>
                <span id="cartTotal">$0.00</span>
            </div>
            <button class="checkout-btn" onclick="checkout()">Proceder al pago</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2026 TechStore - Todos los derechos reservados</p>
        <p style="margin-top: 1rem; font-size: 0.9rem;">Tu tienda de tecnología de confianza</p>
    </footer>

    <script>
        // Carrito de compras
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        function updateCartDisplay() {
            const cartItems = document.getElementById('cartItems');
            const cartCount = document.getElementById('cartCount');
            const cartSubtotal = document.getElementById('cartSubtotal');
            const cartTotal = document.getElementById('cartTotal');

            // Actualizar contador
            cartCount.textContent = cart.reduce((sum, item) => sum + item.quantity, 0);

            // Mostrar items
            cartItems.innerHTML = '';
            let subtotal = 0;

            cart.forEach(item => {
                subtotal += item.price * item.quantity;
                cartItems.innerHTML += `
                    <div class="cart-item">
                        <div class="cart-item-info">
                            <div class="cart-item-name">${item.name}</div>
                            <div class="cart-item-price">$${(item.price * item.quantity).toFixed(2)}</div>
                            <div class="cart-item-quantity">
                                <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity - 1})">-</button>
                                <span>${item.quantity}</span>
                                <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity + 1})">+</button>
                                <button class="quantity-btn" onclick="removeFromCart(${item.id})" style="margin-left: 0.5rem;">🗑️</button>
                            </div>
                        </div>
                    </div>
                `;
            });

            cartSubtotal.textContent = `$${subtotal.toFixed(2)}`;
            cartTotal.textContent = `$${subtotal.toFixed(2)}`;

            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function addToCart(id, name, price) {
            const existingItem = cart.find(item => item.id === id);
            
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ id, name, price, quantity: 1 });
            }

            updateCartDisplay();
            openCart();
        }

        function updateQuantity(id, newQuantity) {
            if (newQuantity <= 0) {
                removeFromCart(id);
                return;
            }

            const item = cart.find(item => item.id === id);
            if (item) {
                item.quantity = newQuantity;
                updateCartDisplay();
            }
        }

        function removeFromCart(id) {
            cart = cart.filter(item => item.id !== id);
            updateCartDisplay();
        }

        function toggleCart() {
            document.getElementById('cartSidebar').classList.toggle('open');
        }

        function openCart() {
            document.getElementById('cartSidebar').classList.add('open');
        }

        function checkout() {
            if (cart.length === 0) {
                alert('Tu carrito está vacío');
                return;
            }
            alert('¡Gracias por tu compra! (Modo demostración)');
            cart = [];
            updateCartDisplay();
            toggleCart();
        }

        // Inicializar carrito
        updateCartDisplay();
    </script>
</body>
</html>