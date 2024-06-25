<div class="custom-sidebar">
    <ul>
        @can('listaPaciente')
        <li class="custom-menu-item custom-font-alt">PACIENTES
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('listaPaciente') }}" style="color: #fff;">Pacientes</a></li>
            </ul>
        </li>
        @endcan
        @can('listaPsicologo')
            <li class="custom-menu-item custom-font-alt">PSICÓLOGOS
                <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                    <li><a href="{{ route('listaPsicologo') }}" style="color: #fff;">Psicologos</a></li>
                </ul>
            </li>
        @endcan
        <li class="custom-menu-item custom-font-alt">SESIONES
            @can('homePacienteSesiones')
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('homePacienteSesiones') }}" style="color: #fff;">Mis Sesiones</a></li>
            </ul>
            @endcan
            @can('listadoAllSesiones')
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('listadoAllSesiones') }}" style="color: #fff;">Lista de Sesiones</a></li>
            </ul>
            @endcan
            @can('psicologo.sesiones')
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('psicologo.sesiones') }}" style="color: #fff;">Sesiones</a></li>
            </ul>
            @endcan
            @can('homePsicologoHorario')
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('homePsicologoHorario') }}" style="color: #fff;">Mis Horarios</a></li>
            </ul>
            @endcan
            @can('paciente.sesion')
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('paciente.sesion') }}" style="color: #fff;">Programar Sesión</a></li>
            </ul>
            @endcan
            @can('psicologo.sesion')
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('psicologo.sesion') }}" style="color: #fff;">Programar Sesión</a></li>
            </ul>
            @endcan
        </li>
        <li class="custom-menu-item custom-font-alt">CAMBIAR DATOS PERSONALES
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="#" style="color: #fff;">Datos Personales</a></li>
            </ul>
        </li>
        <li class="custom-menu-item custom-font-alt">CAMBIAR CONTRASEÑA
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('cambiarContraseña') }}" style="color: #fff;">Cambiar Contraseña</a></li>
            </ul>
        </li>
        <li class="custom-menu-item custom-font-alt">NOTIFICACIONES
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('user.view.notificaciones') }}" style="color: #fff;">Aviso de pagos</a></li>
            </ul>
        </li>
    </ul>
</div>