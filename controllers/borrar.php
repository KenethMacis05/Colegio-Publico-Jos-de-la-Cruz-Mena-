<?php 
if (strpos($url_actual, 'views')) {

    $input = $url_actual;

    preg_match('views/(.*?)/', $input, $paginaNombre);

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
} elseif (strpos($url_actual, 'views/new_registration.view.php')) {
    $paginaNombre[1] = 'user';
    if ($paginaNombre[1] == 'user') {
        $_SESSION['title_form_section'] = 'Configuración'; //Configuración
    }
} elseif (strpos($url_actual, 'user')) {
    $paginaNombre[1] = 'user';
    if ($paginaNombre[1] == 'user') {
        $_SESSION['title_form_section'] = 'Configuración'; //Configuración
    }
} else {
    $paginaNombre[1] = 'home';
    if ($paginaNombre[1] == 'home') {
        $_SESSION['title_form_section'] = 'Dashboard'; //Dashboard
    }
}
?>