# 🛒 TechStore - Sistema de Comercio Electrónico

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

## 📋 Descripción del Proyecto

Plataforma de comercio electrónico completa desarrollada como proyecto portfolio. Cuenta con una **tienda online para clientes** y un **panel administrativo** para la gestión de productos. El sistema permite visualizar productos, filtrar por categorías y administrar el inventario de manera eficiente.

**✨ Características principales:**
- 🏬 Tienda online con catálogo dinámico
- 🔍 Buscador y filtros por categoría
- 🛒 Carrito de compras funcional
- 📊 Dashboard administrativo con estadísticas
- 📦 CRUD completo de productos
- 📈 Gráficas interactivas
- 💻 Diseño responsive y profesional

---

## 🚀 Tecnologías Utilizadas

| Tecnología | Versión | Uso |
|------------|---------|-----|
| PHP | 8.2 | Backend y lógica del servidor |
| MySQL | 8.0 | Base de datos |
| HTML5 | - | Estructura de las páginas |
| CSS3 | - | Estilos y diseño responsive |
| JavaScript | ES6 | Interactividad y carrito |
| Chart.js | 4.4 | Gráficas estadísticas |
| Apache | 2.4 | Servidor web |

---

## 📁 Estructura del Proyecto

techstore/
│
├── index.php # Tienda online (frontend clientes)
├── admin.php # Panel administrativo (dashboard)
├── estilo.css # Estilos globales
├── README.md # Documentación


---

## ⚙️ Instalación y Configuración

### Requisitos Previos
- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL + PHP)
- Navegador web moderno
- Git (opcional, para clonar)

### Pasos de Instalación

1. **Clona este repositorio** (o descarga los archivos):
   ```bash
   git clone https://github.com/TU-USUARIO/techstore.git

2. Copia los archivos a la carpeta de XAMPP:
   C:\xampp\htdocs\techstore\

3. Inicia los servicios de Apache y MySQL desde el panel de XAMPP.
4. Crea la base de datos:
  Abre phpMyAdmin: http://localhost/phpmyadmin
  Crea una base de datos llamada mi_catalogo
5.Ejecuta el script SQL para crear la tabla y datos de ejemplo:
  CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    categoria VARCHAR(100)
);

INSERT INTO productos (nombre, descripcion, precio, categoria) VALUES
('Aprende PHP en 24h', 'El mejor libro para aprender PHP rápido', 29.99, 'Libros'),
('Monitor LG 24"', 'Monitor Full HD', 159.99, 'Electrónica'),
('Ratón inalámbrico', 'Ratón ergonómico recargable', 25.50, 'Accesorios'),
('Teclado Mecánico RGB', 'Teclado gaming con switches mecánicos', 89.99, 'Accesorios'),
('Curso de MySQL', 'Aprende bases de datos desde cero', 49.99, 'Libros');

6. ¡Listo! Accede al proyecto:
  Tienda online: http://localhost/techstore/index.php
  Panel admin: http://localhost/techstore/admin.php

## 🎯 Funcionalidades Detalladas

### 🏬 Tienda Online (`index.php`)
- ✅ **Catálogo dinámico:** Muestra todos los productos desde la base de datos
- ✅ **Buscador en tiempo real:** Filtra productos por nombre o descripción
- ✅ **Filtro por categorías:** Selecciona productos por categoría específica
- ✅ **Carrito de compras:**
  - Agregar/eliminar productos
  - Ajustar cantidades
  - Persistencia con localStorage
  - Cálculo automático de totales
- ✅ **Diseño responsive:** Funciona en móviles, tablets y desktop
- ✅ **Hero section:** Banner promocional profesional

### 📊 Panel Administrativo (`admin.php`)
- ✅ **Dashboard interactivo** con métricas clave:
  - Total de productos
  - Número de categorías
  - Precio promedio
  - Producto más caro
- ✅ **Gráficas estadísticas:**
  - Distribución por categoría (gráfica de dona)
  - Ventas mensuales (demo)
- ✅ **CRUD completo de productos:**
  - ➕ Agregar nuevos productos
  - ✏️ Editar productos existentes
  - 🗑️ Eliminar productos
- ✅ **Tabla de productos** con información detallada
- ✅ **Diseño tipo panel de control** profesional
- ✅ **Modal para agregar/editar** productos

---

## 📸 Capturas de Pantalla

### Tienda Online
<img width="1874" height="801" alt="image" src="https://github.com/user-attachments/assets/f2a45af7-e0b1-470b-9abf-14e74e1551e6" />
<img width="1867" height="850" alt="image" src="https://github.com/user-attachments/assets/708e5ea0-5788-4bc9-acc5-8e56ea38692e" />
### Dashboard
<img width="1838" height="870" alt="image" src="https://github.com/user-attachments/assets/a0b0c067-6338-4a3d-ae44-68b1f274c4c8" />
<img width="1847" height="558" alt="image" src="https://github.com/user-attachments/assets/597723ba-829c-4791-b5ca-701902b283d2" />

---

## 💻 Habilidades Demostradas

| Habilidad | Implementación |
|-----------|----------------|
| **PHP** | Backend completo, conexión a MySQL, prepared statements |
| **MySQL** | Diseño de BD, consultas avanzadas (COUNT, AVG, MAX, GROUP BY) |
| **HTML5/CSS3** | Maquetación profesional, diseño responsive, animaciones |
| **JavaScript** | Carrito de compras, modales, interacciones |
| **Chart.js** | Visualización de datos con gráficas |
| **CRUD** | Crear, Leer, Actualizar y Eliminar productos |
| **Seguridad** | Prepared statements para evitar inyección SQL |
| **UI/UX** | Diseño intuitivo, experiencia de usuario |
| **Git/GitHub** | Control de versiones (este repositorio) |
