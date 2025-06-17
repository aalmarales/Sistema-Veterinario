<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WildCare | Veterinaria Experimental</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Playfair+Display:wght@700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/otro_style.css') }}">
    

</head>
<body>
    <!-- NAVBAR FLOTANTE -->
    <nav class="navbar">
        <a href="#" class="logo"><i class="fas fa-paw"></i> WildCare</a>
        <ul class="nav-links">
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#galeria">Galería</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </nav>

    <!-- HERO SECTION CON BLOB ANIMADO -->
    <section class="hero" id="inicio">
        <div class="blob">rett</div>
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="hero-content fade-in">
            <h1>Donde la naturaleza <br>se encuentra con la ciencia.</h1>
            <p class="delay-1">Una nueva forma de cuidar a tus mascotas. Medicina avanzada en un entorno natural.</p>
            <div class="delay-2">
                <a href="#contacto" class="btn">Reservar cita</a>
                <a href="#servicios" class="btn btn-outline">Explorar</a>
            </div>
        </div>
    </section>

    <!-- SERVICIOS CON EFECTO 3D -->
    <section class="services" id="servicios">
        <div class="section-title fade-in">
            <h2>Servicios Especializados</h2>
            <p class="delay-1">Tecnología de vanguardia para el cuidado animal.</p>
        </div>
        <div class="services-grid">
            <div class="service-card fade-in delay-1">
                <div class="service-icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3>Cardiología Avanzada</h3>
                <p>Ecocardiografías y monitoreo cardíaco para diagnósticos precisos.</p>
                <a href="#" class="btn">Saber más</a>
            </div>
            <div class="service-card fade-in delay-2">
                <div class="service-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <h3>Neurología</h3>
                <p>Técnicas avanzadas para el tratamiento de trastornos neurológicos.</p>
                <a href="#" class="btn">Saber más</a>
            </div>
            <div class="service-card fade-in delay-3">
                <div class="service-icon">
                    <i class="fas fa-dna"></i>
                </div>
                <h3>Genética Veterinaria</h3>
                <p>Test genéticos para prevenir enfermedades hereditarias.</p>
                <a href="#" class="btn">Saber más</a>
            </div>
        </div>
    </section>

    <!-- GALERÍA INTERACTIVA -->
    <section class="gallery" id="galeria">
        <div class="section-title fade-in">
            <h2>Nuestro Espacio</h2>
            <p class="delay-1">Un entorno diseñado para el bienestar animal.</p>
        </div>
        <div class="gallery-container">
            <div class="gallery-item fade-in delay-1">
                <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Clínica">
            </div>
            <div class="gallery-item fade-in delay-1">
                <img src="https://images.unsplash.com/photo-1554692918-08fa0fdc9db3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Sala de espera">
            </div>
           
            
            <div class="gallery-item fade-in delay-3">
                <img src="https://images.unsplash.com/photo-1594149929911-78975a43d4f5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Jardín">
            </div>

            <div class="gallery-item fade-in delay-3">
                <img src="https://images.unsplash.com/photo-1544568100-847a948585b9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Equipo">
            </div >
                
            <div class="gallery-item fade-in delay-3">
                <img src="https://cdn0.expertoanimal.com/es/posts/7/9/4/pomerania_20497_0_600.jpg">
            </div>
        </div>
    </section>

    <!-- FOOTER CON ONDA -->
    <footer id="contacto">
        <div class="footer-wave"></div>
        <div class="footer-content">
            <div class="footer-column">
                <h3>WildCare</h3>
                <p>Revolucionando el cuidado veterinario con enfoque holístico y tecnología de punta.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-spotify"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Contacto</h3>
                <p><i class="fas fa-map-marker-alt"></i> Bosque Urbano 123</p>
                <p><i class="fas fa-phone"></i> +34 987 654 321</p>
                <p><i class="fas fa-envelope"></i> hola@wildcare.com</p>
            </div>
            <div class="footer-column">
                <h3>Horario</h3>
                <p>Lun-Vie: 8:00 - 20:00</p>
                <p>Sáb: 9:00 - 14:00</p>
                <p>Urgencias 24/7</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 WildCare. Medicina Veterinaria Experimental.</p>
        </div>
    </footer>

     <script src="{{asset('js/otro_script.js')}}"></script>

    @vite(['resources/js/app.js', 'resources/css/app.css'])

    </body>
</html>