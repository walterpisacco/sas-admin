<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <img src="{{asset('adminTemplate/img/logo.jpg')}}"/>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.menu')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Módulos</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Opciones
            </div>
           @if (auth()->user()->rol == 'Super')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('usuario.clientes')}}" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>@lang('Gestionar Clientes')</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin.usuarios')}}" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>@lang('Gestionar Usuarios')</span>
                </a>
            </li>
        </ul>
