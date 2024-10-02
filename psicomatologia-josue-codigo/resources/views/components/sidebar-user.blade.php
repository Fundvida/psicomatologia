<div class="custom-sidebar">
    <ul>
        @can('listaPaciente')
        <li class="custom-menu-item custom-font-alt">PACIENTES O BENEFICIARIOS
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('listaPaciente') }}" style="color: #fff;">Pacientes</a></li>
            </ul>
        </li>
        @endcan
        @can('pacientesTutor')
        <li class="custom-menu-item custom-font-alt">MENORES DE EDAD
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('tutor.pacientes') }}" style="color: #fff;">Lista de menores de edad</a></li>
            </ul>
        </li>
        @endcan
        @can('listaPsicologo')
            <li class="custom-menu-item custom-font-alt">PROFESIONALES
                <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                    <li><a href="{{ route('listaPsicologo') }}" style="color: #fff;">Profesionales</a></li>
                </ul>
            </li>
        @endcan
        <li class="custom-menu-item custom-font-alt">SESIONES
            @can('homePacienteSesiones')
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('homePacienteSesiones') }}" style="color: #fff;">Mis Sesiones</a></li>
            </ul>
            @endcan
            @can('tutorSesiones')
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('tutor.seesiones') }}" style="color: #fff;">Mis Sesiones</a></li>
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
            @if(auth()->user()->hasRole('Paciente'))
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('paciente.sesion') }}" style="color: #fff;">Programar Sesión</a></li>
            </ul>
            @else
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('tutor.sesion') }}" style="color: #fff;">Programar Sesión</a></li>
            </ul>
            @endif
            @endcan

            @can('psicologo.sesion')
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('psicologo.sesion') }}" style="color: #fff;">Programar Sesión</a></li>
            </ul>
            @endcan
        </li>
        <li class="custom-menu-item custom-font-alt">CAMBIAR DATOS PERSONALES
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('user.edit.view') }}" style="color: #fff;">Datos Personales</a></li>
            </ul>
        </li>
        <li class="custom-menu-item custom-font-alt">CAMBIAR CONTRASEÑA
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('cambiarContraseña') }}" style="color: #fff;">Cambiar Contraseña</a></li>
            </ul>
        </li>
        <li class="custom-menu-item custom-font-alt">NOTIFICACIONES
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                <li><a href="{{ route('user.view.notificaciones') }}" style="color: #fff;">Notificaciones</a></li>
            </ul>
        </li>
    </ul>
</div>
