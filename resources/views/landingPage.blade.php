<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BIENVENID@...</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>

    </head>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <!-- Logo a la izquierda -->
                <a class="navbar-brand fw-bold" href="#page-top">
                    <img src="{{ asset('images/logo gav2.png') }}" alt="Logo" style="height: 100px">
                </a>

                <!-- Botón para colapsar el navbar en dispositivos pequeños -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menú
                    <i class="bi-list"></i>
                </button>

                <!-- Contenido del navbar -->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-4 my-lg-1">
                        <li class="nav-item mb-3 me-3">
                            <a id="loginLink" class="btn btn-outline-primary btn-lg btn-paso1 rounded-pill fw-bold" href="{{ route('login') }}">INICIAR SESIÓN</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="btn btn-outline-primary btn-lg btn-paso1 rounded-pill fw-bold" href="{{ route('agendarcita') }}">AGENDAR CITA</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">

                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-3 lh-1 mb-3 font-alt">No Existe Salud Sin Salud Mental</h1>
                            <p class="lead fw-normal text-muted mb-5 ttNorms">Acceso directo a terapias personalizadas y atención especializada que comprende y atiende sus necesidades.</p>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Masthead device mockup feature-->
                        <div class="masthead-device-mockup">
                            <img src="{{ asset('images/LOGO-SALUD-MENTAL.png') }}" alt="landing1" style="height: 500px">

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <aside class="text-center bg-gradient-primary-to-secondary py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="display-3 font-weight-bold text-black font-alt mb-4">Nuestros Servicios</h1>
                    </div>
                </div>
            </div>
        </aside>

        <section id="servicios">
            <div class="container px-5">
                <div class="row justify-content-center align-items-center">

                    <!-- Primer grupo de cuatro imágenes -->
                    <div class="col-md-4 mb-5 mr-3 ml-3 d-flex justify-content-center align-items-end">
                        <!-- Feature item-->
                        <div class="text-center img-feature">
                            <img src="{{ asset('images/psicologia-infantil.png') }}" class="img-feature d-block mx-auto mb-4" alt="Imagen 1" style="max-width: 200px;">
                            <h3 class="font-alt" style="color: #366a75;">Psicología Infantil</h3>
                            <p class="text-muted mb-0 description">"Nuestro enfoque en la psicología infantil se centra en comprender y atender las necesidades emocionales y mentales de los niños en su etapa de desarrollo. Desde el cuidado psicológico especializado hasta el apoyo en el crecimiento y la resolución de conflictos, trabajamos para promover un entorno saludable y feliz para los más pequeños."</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-5 mr-3 ml-3 d-flex justify-content-center align-items-end">
                        <!-- Feature item-->
                        <div class="text-center img-feature">
                            <img src="{{ asset('images/jovenes-adolescentes.png') }}" class="img-feature d-block mx-auto mb-4" alt="Imagen 2" style="max-width: 200px;">
                            <h3 class="font-alt" style="color: #366a75;">Adolescentes y Jóvenes</h3>
                            <p class="text-muted mb-0 description">"En nuestra fundación, nos dedicamos a ofrecer apoyo psicológico especializado para adolescentes y jóvenes en su camino hacia la madurez emocional y el bienestar mental. Reconocemos los desafíos únicos que enfrentan en esta etapa de la vida y trabajamos para proporcionar un espacio seguro donde puedan explorar sus emociones, enfrentar los desafíos y desarrollar habilidades para una vida plena."</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-5 mr-3 ml-3 d-flex justify-content-center align-items-end">
                        <!-- Feature item-->
                        <div class="text-center img-feature">
                            <img src="{{ asset('images/adulto.png') }}" class="img-feature d-block mx-auto mb-4" alt="Imagen 3" style="max-width: 200px;">
                            <h3 class="font-alt" style="color: #366a75;">Adultos</h3>
                            <p class="text-muted mb-0 description">"En nuestra fundación, ofrecemos un espacio acogedor y de apoyo para adultos que buscan cuidar su salud mental y emocional. Entendemos que la vida adulta puede presentar una variedad de desafíos, desde el manejo del estrés y la ansiedad hasta la resolución de conflictos y la búsqueda de un mayor bienestar."</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-5 mr-3 ml-3 d-flex justify-content-center align-items-end">
                        <!-- Feature item-->
                        <div class="text-center img-feature">
                            <img src="{{ asset('images/adulto-mayor.png') }}" class="img-feature d-block mx-auto mb-4" alt="Imagen 4" style="max-width: 200px;">
                            <h3 class="font-alt" style="color: #366a75;">Adulto Mayor</h3>
                            <p class="text-muted mb-0 description">"En nuestra fundación, nos dedicamos a proporcionar un apoyo especializado y compasivo para los adultos mayores que buscan mantener su bienestar emocional y mental en esta etapa de la vida. Reconocemos los desafíos únicos que enfrentan los adultos mayores, desde ajustes en la vida después de la jubilación hasta enfrentar la soledad y la pérdida."</p>
                        </div>
                    </div>

                    <!-- Segundo grupo de tres imágenes -->
                    <div class="col-md-4 mb-5 mr-3 ml-3 d-flex justify-content-center align-items-end">
                        <!-- Feature item-->
                        <div class="text-center img-feature">
                            <img src="{{ asset('images/terapia-pareja.png') }}" class="img-feature d-block mx-auto mb-4" alt="Imagen 5" style="max-width: 200px;">
                            <h3 class="font-alt" style="color: #366a75;">Terapia de Pareja</h3>
                            <p class="text-muted mb-0 description description-left">"En nuestra fundación, ofrecemos un espacio seguro y de apoyo para las parejas que buscan fortalecer su relación y superar desafíos juntos. Entendemos que las relaciones de pareja pueden enfrentar dificultades en cualquier etapa, ya sea que estén lidiando con problemas de comunicación, conflictos recurrentes o cambios en la dinámica de la relación."</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-5 mr-3 ml-3 d-flex justify-content-center align-items-end">
                        <!-- Feature item-->
                        <div class="text-center img-feature">
                            <img src="{{ asset('images/taller-de-charlas-y-foros.png') }}" class="img-feature d-block mx-auto mb-4" alt="Imagen 6" style="max-width: 200px;">
                            <h3 class="font-alt" style="color: #366a75;">Taller de Charlas y Foros</h3>
                            <p class="text-muted mb-0 description description-left">"En nuestra fundación, ofrecemos un espacio seguro y de apoyo para las parejas que buscan fortalecer su relación y superar desafíos juntos. Entendemos que las relaciones de pareja pueden enfrentar dificultades en cualquier etapa, ya sea que estén lidiando con problemas de comunicación, conflictos recurrentes o cambios en la dinámica de la relación."</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-5 mr-3 ml-3 d-flex justify-content-center align-items-end">
                        <!-- Feature item-->
                        <div class="text-center img-feature">
                            <img src="{{ asset('images/taller-de-cuerdas-bajas.png') }}" class="img-feature d-block mx-auto mb-4" alt="Imagen 7" style="max-width: 200px;">
                            <h3 class="font-alt" style="color: #366a75;">Taller de Cuerdas Bajas</h3>
                            <p class="text-muted mb-0 description description-left">"En nuestra fundación, ofrecemos un espacio seguro y de apoyo para las parejas que buscan fortalecer su relación y superar desafíos juntos. Entendemos que las relaciones de pareja pueden enfrentar dificultades en cualquier etapa, ya sea que estén lidiando con problemas de comunicación, conflictos recurrentes o cambios en la dinámica de la relación."</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-secondary py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="display-3 font-weight-bold text-black font-alt mb-4">Te Ofrecemos...</h1>
                    </div>
                </div>
            </div>
        </aside>
        <!-- App features section-->
        <section id="features">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid px-5">
                            <div class="row gx-5">
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-person-fill-gear icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Atención Integral Personalizada</h3>
                                        <p class="text-muted mb-0">Nuestro enfoque se centra en la individualidad de cada situación. Brindamos un espacio seguro para el manejo de ansiedad, depresión y  otros desafíos emocionales.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-person-heart icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Fomentando la Comprensión Mutua</h3>
                                        <p class="text-muted mb-0">Promovemos el entendimiento profundo entre nuestros pacientes y terapeutas para lograr una comunicación efectiva y resultados significativos.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-check-circle-fill icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Experiencia Comprobada</h3>
                                        <p class="text-muted mb-0">Contamos con un equipo de especialistas altamente cualificados para ofrecer asesoramiento, evaluaciones y terapias adaptadas a cada persona.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-shield-lock-fill icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Seguridad y Confidencialidad</h3>
                                        <p class="text-muted mb-0">La privacidad y la protección de la información son primordiales. Aseguramos un entorno de confianza donde se resguarda cada detalle compartido.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-bar-chart-fill icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Evaluaciones Profundas</h3>
                                        <p class="text-muted mb-0">Realizamos un análisis detallado para entender las raíces de los comportamientos y encontrar las mejores estrategias de intervención.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-award-fill icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Calidad y Seguimiento Continuo</h3>
                                        <p class="text-muted mb-0">Nos comprometemos con la mejora constante y el seguimiento continuado para garantizar el progreso y la satisfacción de nuestros pacientes.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-0">
                        <!-- Features section device mockup-->
                        <div class="features-device-mockup">
                            <img src="{{ asset('images/landing2.1.jpg') }}" alt="landing2" style="height: 280px">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic features section-->
        <section class="bg-light">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-12 col-lg-5">
                        <h1 class="font-weight-bold text-black font-alt mb-4">Profesionales dedicados a tu bienestar emocional</h1>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-0">Nuestro compromiso es brindar apoyo psicológico de calidad, accesible y adaptado a tus necesidades. Con un equipo de expertos en salud mental, ofrecemos un camino hacia la resiliencia y la recuperación emocional.</p>
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <div class="px-5 px-sm-0"><img src="{{ asset('images/landing3.1.jpg') }}" alt="landing3" style="height: 400px"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to action section-->
        <section class="cta">
            <div class="cta-content">
                <div class="container px-5">
                    <h1 class="font-weight-bold text-white font-alt mb-4">Conecta con Especialistas en Salud Mental</h1>

                    <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="" target="_blank">Agende su Consulta Aquí</a>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <h1 class="text-white font-alt">Contactanos para más Información...</h1>
                <br></br>
                <div class="text-white-50 small">
                    <a href="#!">TELF: (+591) 72087186 (+591) 72714248</a>
                    <br></br>
                    <a href="#!">OFICINA CENTRAL: Av. Melchor Pérez de Olguín e Idelfonso Murgía Nro. 1253 Cochabamba - Bolivia</a>
                    <br></br>
                    <a href="#!">OFICINA REGIONAL: C. Batallón Colorados. Edificio "El Condor", Piso 4, Oficina 402. La Paz - Bolivia</a>
                    <br></br>
                    <a href="https://wa.me/59172087186" target="_blank" class="text-white fs-2 me-3"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.instagram.com/gabinetedesanacion/" target="_blank" class="text-white fs-2 me-3"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.tiktok.com/@gabinete_de_sanacion" target="_blank" class="text-white fs-2 me-3"><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100089761086195" target="_blank" class="text-white fs-2 me-3"><i class="bi bi-facebook"></i></a>
                </div>
            </div>
        </footer>
        <!-- Feedback Modal-->
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script src="js/hoverDescription.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                var loginLink = document.getElementById('loginLink');
                $.ajax({
                    type: "GET",
                    url: "/check-auth",
                    success: function(response) {
                        if(response.authenticated) {
                            loginLink.innerHTML = 'IR A CUENTA';
                            console.log("El usuario está autenticado.");
                        } else {
                            loginLink.innerHTML = 'INICIAR SESIÓN'
                            console.log("El usuario no está autenticado.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error en la solicitud AJAX:", error);
                    }
                });
            });
        </script>
    </body>
</html>
