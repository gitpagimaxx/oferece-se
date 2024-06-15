<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url(ENV('APP_URL')) }}/images/logotipo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav mr-auto">
                <li><a href="{{ url(ENV('APP_URL')) }}/dashboard" class="btn">Dashboard</a></li>
                <li><a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas" class="btn">Ofertas</a></li>
                <li><a href="{{ url(ENV('APP_URL')) }}/dashboard/avaliacao" class="btn">Avaliações</a></li>
                <li><a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes" class="btn">Clientes</a></li>
                <li><a href="{{ url(ENV('APP_URL')) }}/dashboard/perfil" class="btn">Perfil</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ url(ENV('APP_URL')) }}/dashboard/perfil" class="dropdown-item">
                                {{ __('Perfil') }}
                            </a>
                            <a href="{{ url(ENV('APP_URL')) }}/dashboard/cota" class="dropdown-item">
                                {{ __('Limite de Uso') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>