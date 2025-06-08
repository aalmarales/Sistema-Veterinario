<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare Plus | Clínica Veterinaria Moderna</title>

    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <i class="fas fa-paw"></i>
                <span>HEALT PETS....</span>
                 <i class="fas fa-paw"></i>
            </div>
            <ul class="nav-links">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#equipo">Equipo</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>

            <a href="{{ url('/app') }}" class="cta-button" target="_blank">Session</a>

            <a href="{{ url('/admin') }}" class="cta-button" target="_blank">Admin</a>

            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="inicio">
        <div class="hero-content animate">
            <h1>Cuidado experto para tus mascotas</h1>
            <p>En HEALT PETS... ofrecemos servicios veterinarios de alta calidad con tecnología de punta y un equipo de profesionales apasionados por los animales.</p>
            <div class="hero-buttons">
                {{-- <a href="#servicios" class="btn btn-primary">Nuestros Servicios</a>
                <a href="#cita" class="btn btn-secondary">Urgencias 24/7</a> --}}
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="servicios">
        <h2 class="section-title animate">Nuestros Servicios</h2>
        <p class="section-subtitle animate delay-1">Ofrecemos una amplia gama de servicios veterinarios para mantener a tu mascota saludable y feliz en todas las etapas de su vida.</p>
        
        <div class="services-grid">
            <div class="service-card animate delay-1">
                <div class="service-icon">
                    <i class="fas fa-stethoscope"></i>
                </div>
                <h3>Consulta General</h3>
                <p>Exámenes completos, diagnóstico y tratamiento para enfermedades comunes y crónicas en mascotas.</p>
                <a href="#" class="learn-more">Saber más <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="service-card animate delay-2">
                <div class="service-icon">
                    <i class="fas fa-syringe"></i>
                </div>
                <h3>Vacunación</h3>
                <p>Programas completos de vacunación para proteger a tu mascota de enfermedades infecciosas.</p>
                <a href="#" class="learn-more">Saber más <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="service-card animate delay-3">
                <div class="service-icon">
                    <i class="fas fa-cut"></i>
                </div>
                <h3>Cirugías</h3>
                <p>Procedimientos quirúrgicos desde esterilizaciones hasta cirugías complejas con tecnología avanzada.</p>
                <a href="#" class="learn-more">Saber más <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="service-card animate delay-4">
                <div class="service-icon">
                    <i class="fas fa-tooth"></i>
                </div>
                <h3>Odontología</h3>
                <p>Cuidado dental profesional incluyendo limpiezas, extracciones y tratamientos para enfermedades periodontales.</p>
                <a href="#" class="learn-more">Saber más <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="service-card animate delay-1">
                <div class="service-icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3>Cardiología</h3>
                <p>Diagnóstico y tratamiento de enfermedades cardíacas con ecocardiografía y electrocardiografía.</p>
                <a href="#" class="learn-more">Saber más <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="service-card animate delay-2">
                <div class="service-icon">
                    <i class="fas fa-x-ray"></i>
                </div>
                <h3>Diagnóstico por Imágenes</h3>
                <p>Radiografía digital, ultrasonido y resonancia magnética para diagnósticos precisos.</p>
                <a href="#" class="learn-more">Saber más <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="nosotros">
        <div class="about-container">
            <div class="about-image animate">
                <img src="https://images.unsplash.com/photo-1588943211346-0908a1fb0b01?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1935&q=80" alt="Veterinaria PetCare Plus">
            </div>
            <div class="about-content animate delay-1">
                <h2>Nuestra Historia</h2>
                <p>PetCare Plus fue fundada en 2010 con la misión de proporcionar cuidado veterinario excepcional en un ambiente cálido y acogedor. Lo que comenzó como una pequeña clínica se ha convertido en un centro veterinario de referencia en la región.</p>
                <p>Nuestro equipo de veterinarios altamente calificados está comprometido con el bienestar animal y utiliza las últimas tecnologías para garantizar los mejores resultados para tus mascotas.</p>
                
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">12+</div>
                        <div class="stat-label">Años de Experiencia</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">5,000+</div>
                        <div class="stat-label">Mascotas Felices</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Profesionales</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team" id="equipo">
        <h2 class="section-title animate">Nuestro Equipo</h2>
        <p class="section-subtitle animate delay-1">Conoce a nuestro equipo de veterinarios y especialistas apasionados por el cuidado animal.</p>
        
        <div class="team-grid">
            <div class="team-member animate delay-1">
                <div class="member-image">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Dr. Laura Méndez">
                </div>
                <div class="member-info">
                    <h3>Dra. Laura Méndez</h3>
                    <p>Veterinaria General</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="team-member animate delay-2">
                <div class="member-image">
                    <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" alt="Dr. Carlos Ruiz">
                </div>
                <div class="member-info">
                    <h3>Dr. Carlos Ruiz</h3>
                    <p>Cirujano Veterinario</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="team-member animate delay-3">
                <div class="member-image">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" alt="Dra. Sofía Vargas">
                </div>
                <div class="member-info">
                    <h3>Dra. Sofía Vargas</h3>
                    <p>Cardióloga Veterinaria</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="team-member animate delay-4">
                <div class="member-image">
                    <img src="https://images.unsplash.com/photo-1527613426441-4da17471b66d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80" alt="Dr. Javier López">
                </div>
                <div class="member-info">
                    <h3>Dr. Javier López</h3>
                    <p>Especialista en Imágenes</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2 class="section-title animate">Lo que dicen nuestros clientes</h2>
        <p class="section-subtitle animate delay-1">La satisfacción de nuestros clientes y sus mascotas es nuestra mayor recompensa.</p>
        
        <div class="testimonial-slider animate delay-2">
            <div class="testimonial">
                <p class="testimonial-content">"El equipo de PetCare Plus salvó la vida de mi perro Max cuando tuvo una emergencia. Su profesionalismo y compasión son incomparables. ¡Recomiendo esta clínica a todos los dueños de mascotas!"</p>
                <div class="testimonial-author">
                    <div class="author-image">
                        <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="María González">
                    </div>
                    <div class="author-info">
                        <h4>María González</h4>
                        <p>Dueña de Max (Golden Retriever)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section class="appointment" id="cita">
        <div class="appointment-container">
            <h2 class="animate">Agenda una cita</h2>
            <p class="animate delay-1">Programa una consulta para tu mascota con nuestro equipo de expertos.</p>
            
            <div class="appointment-form animate delay-2">
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nombre completo</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="tel" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pet">Nombre de la mascota</label>
                            <input type="text" id="pet" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="service">Servicio requerido</label>
                            <select id="service" class="form-control" required>
                                <option value="">Seleccione un servicio</option>
                                <option value="consulta">Consulta General</option>
                                <option value="vacunacion">Vacunación</option>
                                <option value="cirugia">Cirugía</option>
                                <option value="odontologia">Odontología</option>
                                <option value="emergencia">Urgencia</option>
                                <option value="otros">Otros</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Fecha preferida</label>
                            <input type="date" id="date" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Mensaje adicional</label>
                        <textarea id="message" class="form-control" rows="4"></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">Agendar Cita</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contacto">
        <div class="footer-container">
            <div class="footer-col">
                <h3>PetCare Plus</h3>
                <p>Clínica veterinaria moderna comprometida con el bienestar animal y la excelencia médica.</p>
                <div class="social-media">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="footer-col">
                <h3>Enlaces rápidos</h3>
                <ul class="footer-links">
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#nosotros">Sobre nosotros</a></li>
                    <li><a href="#equipo">Nuestro equipo</a></li>
                    <li><a href="#cita">Agendar cita</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Servicios</h3>
                <ul class="footer-links">
                    <li><a href="#">Consulta general</a></li>
                    <li><a href="#">Vacunación</a></li>
                    <li><a href="#">Cirugías</a></li>
                    <li><a href="#">Odontología</a></li>
                    <li><a href="#">Diagnóstico por imágenes</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Contacto</h3>
                <div class="footer-contact">
                    <p><i class="fas fa-map-marker-alt"></i> Av. Principal 1234, Ciudad</p>
                    <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                    <p><i class="fas fa-envelope"></i> info@petcareplus.com</p>
                    <p><i class="fas fa-clock"></i> Lunes-Viernes: 8am-8pm<br>Sábados: 9am-4pm<br>Urgencias: 24/7</p>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2023 PetCare Plus. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="{{asset('js/myscript.js')}}"></script>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</body>
</html>