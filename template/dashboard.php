<!--Aqui comienza-->
<div class="col-auto col-md-3 col-xl-2 px-sm-2 bg-dark p-3 text-white contenedor" style="width: 280px; height: 100%;">

    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="../src/img/imagen1.webp" alt="Colegio Publíco José de la Cruz Mena" class="img-fluid logo">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto w-100" id="menu">
            <li class="nav-item pl-3">
                <a href="https://iergrupo6.seogoogle.pro" class="nav-link px-0 text-white pl-3">
                    <i class="fs-4 bi bi-house-fill"></i> <span class="ms-1 d-none d-sm-inline">Inicio</span>
                </a>
            </li>
            <li>
                <a href="../home.php" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/views/new_registration.view.php" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi bi-calendar-plus"></i> <span class="ms-1 d-none d-sm-inline">Crear Matricula</span></a>
            </li>
            <li>
                <a href="/views/registration.view.php" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi-table"></i></i> <span class="ms-1 d-none d-sm-inline">Matriculas</span>
                </a>
            </li>
            <li>
                <a href="/views/school_period.view.php" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Periodo Escolar</span>
                </a>
            </li>
            <li>
                <a href="/views/users.view.php" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Usuarios</span> </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqKRdNTUVE6P28Z1Gjw-fwnfsE6icmFmf4eiXXEpmc4A&s" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">Nombre</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="/views/user.config.view.php">Configuraciones</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/">Cerrar session</a></li>
            </ul>
        </div>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .logo {
            display: none;
        }
        .contenedor{
            width: auto !important;
            height: auto !important;
        }
    }
</style>