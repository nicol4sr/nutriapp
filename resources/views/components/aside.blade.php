@php
    $usuario = auth()->user();
    $especialidad = $usuario->especialista;
@endphp

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Inicio -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="bi bi-house"></i>
                <span>Inicio</span>
            </a>
        </li>

        <!-- Receta -->
        @if ($usuario->hasRole(['Nutricionista', 'Entrenador', 'Administrador']))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('receta') }}">
                    <i class="bi bi-clipboard"></i><span>Crear Receta</span>
                </a>
            </li>
        @endif

        <!-- Planes -->
        <li class="nav-item active">
            <a class="nav-link collapsed active" data-bs-target="#components-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-flag"></i><span>Planes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="dropdown-item">
                    <a href="{{ route('listado-planes') }}">
                        <i class="bi bi-circle"></i><span class="dropdown-item-color">Plan Nutricional</span>
                    </a>
                </li>
                <li class="dropdown-item">
                    <a href="{{ route('ejercicios') }}">
                        <i class="bi bi-circle"></i><span class="dropdown-item-color">Plan de Ejercicios</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Consulta -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('consultas.index') }}">
                <i class="bi bi-chat-square-text"></i><span>Consultas</span>
            </a>
        </li>


        <!-- Estadisticas -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('datos-fisicos') }}">
                <i class="bi bi-graph-up-arrow"></i><span>Datos físicos</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-graph-up-arrow"></i><span>Estadisticas</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="dropdown-item">
                    <a href="{{ route('peso') }}">
                        <i class="bi bi-circle"></i><span class="dropdown-item-color">Peso</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        <!-- Valor de alimentos -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('valor_nutricional') }}">
                <i class="bi bi-file-text"></i><span>Valor de alimentos</span>
            </a>
        </li>


        <!-- Preguntas -->
        @if ($usuario->hasRole('Administrador'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('preguntas') }}">
                    <i class="bi bi-file-text"></i><span>Preguntas</span>
                </a>
            </li>
        @endif


        <!-- Especialista -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-navi" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard2-data"></i><span>Especialista</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-navi" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @if ($especialidad === null && !$usuario->hasRole('Administrador'))
                    <li class="dropdown-item">
                        <a href="{{ route('registro-especialista') }}">
                            <i class="bi bi-circle"></i><span class="dropdown-item-color">Registrarme</span>
                        </a>
                    </li>
                @endif
                @if ($usuario->hasRole('Administrador'))
                    <li class="dropdown-item">
                        <a href="{{ route('pendiente-especialista') }}">
                            <i class="bi bi-circle"></i><span class="dropdown-item-color">Especialistas</span>
                        </a>
                    </li>
                @endif
                <li class="dropdown-item">
                    <a href="{{ route('entrenador') }}">
                        <i class="bi bi-circle"></i><span class="dropdown-item-color">P.Entrenador</span>
                    </a>
                </li>
                <li class="dropdown-item">
                    <a href="{{ route('nutricionistas') }}">
                        <i class="bi bi-circle"></i><span class="dropdown-item-color">P.nutricionistas</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Configuracion -->
        @if ($usuario->hasRole('Administrador'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('respaldo') }}">
                    <i class="bi bi-gear"></i><span>Respaldo base de datos</span>
                </a>
            </li>
        @endif
    </ul>

</aside>
