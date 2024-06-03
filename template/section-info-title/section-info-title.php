<?php
$url_actual = $_SERVER["REQUEST_URI"];
$tituloFormSection = '';

if ($url_actual!== '/' && strpos($url_actual, 'views')!== false) {
    $nombrePagina = substr($url_actual, strlen('views/') + 1);
    switch ($nombrePagina) {        
        case 'tutor.view.php':
            $tituloFormSection = 'Tutores';
            break;
        case 'student.view.php':
            $tituloFormSection = 'Estudiantes';
            break;
        case 'registration.view.php':
            $tituloFormSection = 'Matriculas';
            break;
        case 'school_period.view.php':
            $tituloFormSection = 'Periodos Escolares';
            break;
        case 'users.view.php':
            $tituloFormSection = 'Usuarios';
            break;
        default:
            $tituloFormSection = 'Página Desconocida';
            break;
    }
} elseif (strpos($url_actual, 'home.php')!== false) {
    $tituloFormSection = 'Dashboard';
}

$_SESSION['title_form_section'] = $tituloFormSection;
?>


<div class="info-title">
    <span class="title">
        <?php
            echo $_SESSION['title_form_section'];
        ?>
    </span>
</div>

<div class="info-school-period">
    <span class="school-period">
        Periodo Escolar /
        <a id="schoolPeriod" class="text-white" href="/views/school_period.view.php"><?php print $_SESSION['school_period']; ?></a>
    </span>
</div>