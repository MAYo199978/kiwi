<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kiwi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
        }
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }
        .dashboard-container {
            padding: 40px 0;
        }
        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            backdrop-filter: blur(10px);
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .feature-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .btn-logout {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            background: linear-gradient(45deg, #ee5a24, #ff6b6b);
            transform: scale(1.05);
        }
        .stats-card {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .floating-element {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }
        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
        }
        .floating-element:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 50%;
            right: 15%;
            animation-delay: 2s;
        }
        .floating-element:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }
        .color-changing-text {
            animation: colorChange 4s infinite;
        }
        @keyframes colorChange {
            0% { color: #667eea; }
            25% { color: #764ba2; }
            50% { color: #f093fb; }
            75% { color: #f5576c; }
            100% { color: #667eea; }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <span class="color-changing-text">Kiwi</span>
            </a>
            <div class="d-flex">
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="dashboard-container">
        <div class="container">
            <div class="welcome-card">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 fw-bold mb-3">
                            ¡Bienvenido, <span class="color-changing-text">{{ auth()->user()->name }}</span>!
                        </h1>
                        <p class="lead mb-0">Has iniciado sesión exitosamente en el sistema de gestión de multisesiones.</p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="stats-card">
                            <i class="fas fa-shield-alt fa-3x mb-3"></i>
                            <h3>Sesión Segura</h3>
                            <p>ID: {{ session()->getId() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-lock"></i>
                    </div>
                    <h5 class="fw-bold">Inicio de Sesión Único</h5>
                    <p>Solo una sesión activa por usuario. Si inicias en otro dispositivo, la anterior se cierra automáticamente.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-cookie-bite"></i>
                    </div>
                    <h5 class="fw-bold">Cookies Seguras</h5>
                    <p>Tu sesión se mantiene con cookies HTTPOnly y configuración segura para máxima protección.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="fw-bold">Recordar Usuario</h5>
                    <p>La opción "Recordarme" mantiene tu sesión activa por más tiempo.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h5 class="fw-bold">Recuperación de Sesiones</h5>
                    <p>El sistema maneja automáticamente la expiración y renovación de sesiones.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Dinamismo: Cambiar colores de los iconos
        const icons = document.querySelectorAll('.feature-icon');
        let iconHue = 0;
        setInterval(() => {
            iconHue = (iconHue + 5) % 360;
            icons.forEach(icon => {
                icon.style.filter = `hue-rotate(${iconHue}deg)`;
            });
        }, 200);

        // Efecto hover en cards
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.background = 'linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1))';
            });
            card.addEventListener('mouseleave', () => {
                card.style.background = 'rgba(255, 255, 255, 0.9)';
            });
        });

        // Animación de elementos flotantes
        document.querySelectorAll('.floating-element').forEach((element, index) => {
            element.style.animationDelay = `${index * 2}s`;
        });
    </script>
</body>
</html>