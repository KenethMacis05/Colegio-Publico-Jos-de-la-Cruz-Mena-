<?php
$url_actual = $_SERVER["REQUEST_URI"];

if (strpos($url_actual, 'views')) { 
    
    $input = $url_actual; 
    
    preg_match('~views/(.*?)/~', $input, $paginaNombre);
    
    $paginaNombre[1];

    if ($paginaNombre[1] == 'new_registration.view.php') {
        $_SESSION['title_form_section'] = 'Nueva Matricula'; //Nueva Matricula
    } elseif ($paginaNombre[1] == 'registration.view.php') {
        $_SESSION['title_form_section'] = 'Matriculas'; //matriculas
    } elseif ($paginaNombre[1] == 'users.view.php') {
        $_SESSION['title_form_section'] = 'Usuarios'; //Usuarios
    } elseif ($paginaNombre[1] == 'school_period') {
        $_SESSION['title_form_section'] = 'Periodo Escolar'; //Periodo Escolar
    }
}  elseif (strpos($url_actual, 'views/new_registration.view.php')) {
    $paginaNombre[1] = 'user';
    if ($paginaNombre[1] == 'user') {
        $_SESSION['title_form_section'] = 'Configuración'; //Configuración
    }
} elseif (strpos($url_actual, 'user')) {
    $paginaNombre[1] = 'user';
    if ($paginaNombre[1] == 'user') {
        $_SESSION['title_form_section'] = 'Configuración'; //Configuración
    }
}   else {
    $paginaNombre[1] = 'home';
    if ($paginaNombre[1] == 'home') {
        $_SESSION['title_form_section'] = 'Dashboard'; //Inicio
    }
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-ZenhVNpHmPQ0oW9GvtAuzNStRIdYJkvkvUShvtzKNiOo7XOaKshmLN2mtUXAqbVq" crossorigin="anonymous">

<!--se muestra el valor actual de la variable de sesión-->
<div class="info-title">
    <span class="title">
        <?php
        echo $_SESSION['title_form_section']; //(título de la sección actual).
        ?>
    </span>
</div>

<!--<div class="info-school-period">
    <span class="school-period">
        Periodo Escolar /
        <a id="schoolPeriod" href="modules/school_period"><?php print $_SESSION['school_period']; ?></a>
    </span>
</div>-->

