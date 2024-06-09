<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold me-auto" href="#page-top" style="margin-left: -80px;">
                <img src="{{ asset('images/logo gav2.png') }}" alt="Logo" style="height: 100px">
            </a>
            <ul class="navbar-nav ml-auto flex-row-reverse flex-md-row">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdownToggle">
                        <img src="images/faces/face28.jpg" alt="profile" class="img-fluid rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" id="profileDropdown" style="display: none; right: 0; left: auto;">

                        <form method="POST" action="" class="dropdown-item">
                            <button type="submit" class="btn btn-link text-dark" style="text-decoration: none;">
                                <i class="fas fa-cog text-primary"></i> <!-- Cambié la clase para el ícono de cierre de sesión -->
                                Configuración
                            </button>
                        </form>
                        <form method="POST" action="{{ route('cerrar_sesion') }}" class="dropdown-item">
                            @csrf
                            <button type="submit" class="btn btn-link text-dark" style="text-decoration: none;">
                                <i class="fas fa-power-off text-primary"></i> <!-- Cambié la clase para el ícono de cierre de sesión -->
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </li>
                <!-- Icono de campana para notificaciones -->
                <li class="nav-item">
                    <a class="nav-link" href="#" id="notificationIcon">
                        <i class="fas fa-bell"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var profileDropdown = document.getElementById('profileDropdown');
            var profileDropdownToggle = document.getElementById('profileDropdownToggle');

            profileDropdownToggle.addEventListener('click', function() {
                if (profileDropdown.style.display === 'none') {
                    profileDropdown.style.display = 'block';
                } else {
                    profileDropdown.style.display = 'none';
                }
            });
        });
    </script>