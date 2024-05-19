<div class="Contenedor-List">
    <form action="/controllers/matricula.controller.php" method="POST" class="form" id="form_nueva_matricula">
        <!--Formulario Estudiante-->
        <div id="form_estudiante">
            <div>
                <h2 class="titulo">I. Datos Personales del estudiante</h2>
                <hr class="estilos-hr-form"/>
            </div>
            <div class="inputs-group">
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Primer nombre" required id="pri_nombre_estudiante" name="pri_nombre_estudiante"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Segundo nombre" id="seg_nombre_estudiante" name="seg_nombre_estudiante"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Primer Apellido" required id="pri_apellido_estudiante" name="pri_apellido_estudiante"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Segundo Apellido" id="seg_apellido_estudiante" name="seg_apellido_estudiante"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="date" required id="fecha_nacimiento_estudiante" name="fecha_nacimiento_estudiante"/>
                    <i class="bi bi-calendar-date icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Cédula" required id="cedula_estudiante" name="cedula_estudiante"/>
                    <i class="bi bi-person-vcard icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <select class="form-selec" required id="genero" name="genero">
                        <option value="" disabled selected>Género</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    <i class="bi bi-people-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control telefono" type="number" placeholder="Teléfono celular" required id="telefono_estudiante" name="telefono_estudiante" pattern="\d{8}" title="Debe ingresar 8 dígitos"/>
                    <i class="bi bi-telephone-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Direccion" required id="direccion_estudiante" name="direccion_estudiante"/>
                    <i class="bi bi-geo-alt-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="email" placeholder="Correo electrónico" id="correo_estudiante" name="correo_estudiante"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <select class="form-selec" required id="estado" name="estado">
                        <option value="" disabled selected>Matricula</option>
                        <option value="1">Reingreso</option>
                        <option value="2">Nuevo ingreso</option>
                    </select>
                    <i class="bi bi-puzzle icon"></i>
                </div>
            </div>
            <div class="icon-container">
                <button type="button" class="btn btn-dark" onclick="cambiarForm()">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
        <!--Formulario tutor-->
        <div id="form_tutor" style="display: none";>
            <div>
                <h2 class="titulo">II. Datos Personales del tutor</h2>
                <hr class="estilos-hr-form"/>
            </div>
            <div class="inputs-group">
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Primer nombre" required id="pri_nombre_tutor" name="pri_nombre_tutor"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Segundo nombre" id="seg_nombre_tutor" name="seg_nombre_tutor"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Primer Apellido" required id="pri_apellido_tutor" name="pri_apellido_tutor"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Segundo Apellido" id="seg_apellido_tutor" name="seg_apellido_tutor"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Cédula" required id="cedula_tutor" name="cedula_tutor"/>
                    <i class="bi bi-person-vcard icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control telefono2" type="number" placeholder="Teléfono celular" required id="telefono_tutor" name="telefono_tutor"/>
                    <i class="bi bi-telephone-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="text" placeholder="Direccion" required id="direccion_tutor" name="direccion_tutor"/>
                    <i class="bi bi-geo-alt-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <input class="form-control" type="email" placeholder="Correo electrónico" required id="correo_tutor" name="correo_tutor"/>
                    <i class="bi bi-person-fill icon"></i>
                </div>
    
                <div class="cajas-texto">
                    <select class="form-selec" required id="parentesco" name="parentesco">
                        <option value="" disabled selected>Parentesco</option>
                        <option value="1">Padre</option>
                        <option value="2">Madre</option>
                        <option value="3">Tutor Legal</option>
                    </select>
                    <i class="bi bi-people-fill icon"></i>
                </div>    
            </div>
            <div class="icon-container-i">
                <button type="button" class="btn btn-dark" onclick="cambiarForm()">
                    <i class="bi bi-arrow-left"></i>
                </button>
            </div>
            <div class="icon-container">
                <button type="button" class="btn btn-dark" onclick="cambiarFormMatricula()">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
        <!--Formulario Matricula-->
        <div id="form_matricula" style="display: none";>
            <div class="inputs-group-2">
                <table class="tabla">
                    <thead>
                        <tr class="encabezado-tabla">
                            <th colspan="6">Calificaciones del Estudiaste</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="calificaciones">
                            <td class="materia" colspan="2">Matemáticas</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n-matematica" name="n-matematica"></td>
                            <td class="materia" colspan="2">Lengua Extranjera</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_lengua_extranjera" name="n_lengua_extranjera"></td>
                        </tr>
                        <tr class="calificaciones">
                            <td class="materia" colspan="2">Lengua Y Literatura</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_lengua_literatura" name="n_lengua_literatura"></td>
                            <td class="materia" colspan="2">Ciencias Naturales</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_ciencias_naturales" name="n_ciencias_naturales"></td>
                        </tr>
                        <tr class="calificaciones">
                            <td class="materia" colspan="2">Educación Física</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_educacion_fisica" name="n_educacion_fisica"></td>
                            <td class="materia" colspan="2">Química</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_quimica" name="n_quimica"></td>
                        </tr>
                        <tr class="calificaciones">
                            <td class="materia" colspan="2">Orientacion Tecnica y Vocacional</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_otv" name="n_otv"></td>
                            <td class="materia" colspan="2">Física</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_fisica" name="n_fisica"></td>
                        </tr>
                        <tr class="calificaciones">
                            <td class="materia" colspan="2">Biología</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_biologia" name="n_biologia"></td>
                            <td class="mater" colspan="2">Historia</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_historia" name="n_historia"></td>
                        </tr>
                        <tr class="calificaciones">
                            <td class="materia" colspan="2">Geografía</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_geografia" name="n_geografia"></td>
                            <td class="materia" colspan="2">Economía</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_economia" name="n_economia"></td>
                        </tr>
                        <tr class="calificaciones">
                            <td class="materia" colspan="2">Sociología</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_sociologia" name="n_sociologia"></td>
                            <td class="materia" colspan="2">Expresión Cultural y Artistica</td>
                            <td class="input-tabla"><input type="number" placeholder="100.00" min="0" max="100" id="n_eca" name="n_eca"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="icon-container-i">
                    <button type="button" class="btn btn-dark" onclick="cambiarFormMatricula()">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="icon-container-guardar">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-floppy-fill"></i>
                GUARDAR
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.input-tabla input[type="number"]');
    inputs.forEach(input => {
        input.addEventListener('change', function() {
            if (this.value > 100) {
                this.value = 100;
                alert('La nota máxima permitida es 100.');
            }
        });
    });
});

document.getElementById('form_nueva_matricula').addEventListener('submit', function(event) {
    var telefonoEstudiante = document.querySelector('.telefono').value;
    var telefonoTutor = document.querySelector('.telefono2').value;

    if (telefonoEstudiante.length!== 8 || telefonoTutor.length!== 8) {
        alert('Los teléfonos celulares del estudiante y del tutor deben tener exactamente 8 dígitos.');
        event.preventDefault();
    }
});
</script>