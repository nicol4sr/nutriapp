@php
    $usuario = auth()->user();
    $notificaciones = auth()->user()->unreadNotifications;
@endphp

<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('images/icons/icon.png') }}" alt="">
            <span class="d-none d-lg-block">Nutri-Star</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="reloj">
        <p class="fecha"></p>
        <p class="tiempo"></p>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">
                        {{ $notificaciones->count() }}
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="padding: 0">
                    <li class="dropdown-header" style="font-size: 1.1rem">
                        Tienes {{ $notificaciones->count() }} notificaciones
                    </li>
                    <li class="dropdown-item">
                        <hr class="dropdown-divider">
                    </li>

                    @foreach ($usuario->unreadNotifications as $notificacion)
                        @php
                            $data = $notificacion->data;
                        @endphp
                        <li class="notification-item">
                            <a href="{{ route('notificacion.leer', ['notificacion_id' => $notificacion->id]) }}">
                                <div class="px-4" style="margin: -0.8rem 0rem;">
                                    <h4>{{ $data['titulo'] }}</h4>
                                    @if ($notificacion->type === 'App\Notifications\EspecialistaNotification')
                                        <p>
                                            El usuario {{ $notificacion->data['usuario'] }} ha solicitado sus servicios
                                            para realizar una consulta.
                                        </p>
                                    @elseif ($notificacion->type === 'App\Notifications\ConsultaNotification')
                                        <p>
                                            @if ($data['estado'])
                                                El especialista {{ $notificacion->data['especialista'] }} ha respondido
                                                su solicitud.
                                            @else
                                                El especialista {{ $notificacion->data['especialista'] }} ha rechazado
                                                su solicitud.
                                            @endif
                                        </p>
                                    @endif
                                    <small>
                                        {{ \Carbon\Carbon::parse($notificacion['created_at'])->diffForHumans() }}
                                    </small>
                                </div>
                            </a>
                        </li>

                        <li class="dropdown-item">
                            <hr class="dropdown-divider">
                        </li>
                    @endforeach


                    <li class="dropdown-footer" style="margin-top: -1rem">
                        <a href="{{ route('notificaciones.leer') }}" style="font-size: 1.1rem">
                            Marcar todas como leídas
                        </a>
                    </li>
                    <li class="dropdown-footer" style="margin-top: -1rem">
                        <a href="{{ route('notificaciones') }}" style="font-size: 1.1rem">
                            Ver notificaciones leídas
                        </a>
                    </li>

                </ul>

            </li>

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ $usuario->foto == null ? asset('images/users/profile_0.png') : asset('storage/imagenes/' . $usuario->foto) }}"
                        alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                </a>


                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-item" style="cursor:auto">
                    </li>

                    <li class="dropdown-item">
                        <h6>{{ $usuario->name }}</h6>

                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('perfil') }}">
                            <i class="bi bi-person"></i>
                            <span>Mi Perfil - <span>{{ $usuario->getRoleNames()[0] }}</span></span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Salir</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>

</header>
