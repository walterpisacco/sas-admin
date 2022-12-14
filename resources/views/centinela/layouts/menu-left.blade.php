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
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('centinela.gestionar.vehiculos')}}" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="material-icons">taxi_alert</i>
                    <span>@lang('Lista de Vehículos')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('centinela.ingreso.vehiculos')}}" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="material-icons">directions_car</i>
                    <span>@lang('Lectura de Patentes')</span>
                </a>
            </li>    
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('centinela.gestionar.personas')}}" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="material-icons">how_to_reg</i>
                    <span>@lang('Gestionar Personas')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('centinela.ingreso.personas')}}" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="material-icons">directions_walk</i>
                    <span>@lang('Ingreso de Personas')</span>
                </a>
            </li>                    
        </ul>
