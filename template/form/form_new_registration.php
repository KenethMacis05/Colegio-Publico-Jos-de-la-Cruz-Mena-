<form action="" class="ms-2">
    <div id="form_estudiante"class="ms-2">
        <div>
            <h2 class="titulo">I. Datos Personales del estudiante</h2>
            <hr />
        </div>

        <div class="inputs-group">
            <div class="cajas-texto">
                <input type="text" placeholder="Primer nombre" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Segundo nombre" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Primer Apellido" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Segundo Apellido" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="date" placeholder="Apellidos" />
                <i class="bi bi-calendar-date icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Cédula" />
                <i class="bi bi-person-vcard icon"></i>
            </div>

            <div class="cajas-texto">
                <select class="select-menu">
                    <option value="" disabled selected>Género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Femenino">Uno de los 29 tipos de gay</option>
                </select>
                <i class="bi bi-people-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="number" placeholder="Teléfono celular" />
                <i class="bi bi-telephone-fill icon"></i>
            </div>

            <div class="cajas-texto cont">
                <textarea name="" id="" cols="30" rows="1" placeholder="Direccion"></textarea>
                <i class="bi bi-geo-alt-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Correo electrónico" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <select>
                    <option value="" disabled selected>Matricula</option>
                    <option value="opcion1">Reingreso</option>
                    <option value="opcion2">Nuevo ingreso</option>
                </select>
                <i class="bi bi-puzzle icon"></i>
            </div>


            <div class="icon-container">
                <button type="button" class="btn btn-secondary" onclick="cambiarForm()">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
    <!--Formulario tutor-->
    <div id="form_tutor" style="display: none";>
        <div>
            <h2 class="titulo">II. Datos Personales del tutor</h2>
            <hr />
        </div>

        <div class="inputs-group">

            <div class="cajas-texto">
                <input type="text" placeholder="Primer nombre" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Segundo nombre" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Primer Apellido" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Segundo Apellido" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Cédula" />
                <i class="bi bi-person-vcard icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Teléfono celular" />
                <i class="bi bi-telephone-fill icon"></i>
            </div>

            <div class="cajas-texto cont">
                <textarea name="" id="" cols="30" rows="1" placeholder="Direccion"></textarea>
                <i class="bi bi-geo-alt-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <input type="text" placeholder="Correo electrónico" />
                <i class="bi bi-person-fill icon"></i>
            </div>

            <div class="cajas-texto">
                <select>
                    <option value="" disabled selected>Parentesco</option>
                    <option value="opcion5">Ninguno</option>
                    <option value="opcion1">Mamá</option>
                    <option value="opcion2">Papá</option>
                    <option value="opcion2">Hermano/a</option>
                    <option value="opcion4">Tía/sobrino/a</option>
                    <option value="opcion2">Otro</option>
                </select>
                <i class="bi bi-people-fill icon"></i>
            </div>
            <div class="icon-container-i">
                <button type="button" class="btn btn-secondary" onclick="cambiarForm()">
                    <i class="bi bi-arrow-left"></i>
                </button>
            </div>
            <div class="icon-container">
                <button type="button" class="btn btn-secondary" onclick="cambiarFormMatricula()">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
    <!--Formulario Matricula-->
    <div id="form_matricula" style="display: none";>
        <div>
            
            <hr />
        </div>

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
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                        <td class="materia" colspan="2">Lengua Extranjera</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                    </tr>
                    <tr class="calificaciones">
                        <td class="materia" colspan="2">Lengua Y Literatura</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                        <td class="materia" colspan="2">Ciencias Naturales</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                    </tr>
                    <tr class="calificaciones">
                        <td class="materia" colspan="2">Educación Física</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                        <td class="materia" colspan="2">Química</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                    </tr>
                    <tr class="calificaciones">
                        <td class="materia" colspan="2">Orientacion Tecnica y Vocacional</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                        <td class="materia" colspan="2">Física</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                    </tr>
                    <tr class="calificaciones">
                        <td class="materia" colspan="2">Biología</td>
                        <td class="input-tabla"><input type="number" max="100" pattern="[0-9]{2}" placeholder="100.00"></td>
                        <td class="mater" colspan="2">Historia</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                    </tr>
                    <tr class="calificaciones">
                        <td class="materia" colspan="2">Geografía</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                        <td class="materia" colspan="2">Economía</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                    </tr>
                    <tr class="calificaciones">
                        <td class="materia" colspan="2">Sociología</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                        <td class="materia" colspan="2">Expresión Cultural y Artistica</td>
                        <td class="input-tabla"><input type="number" placeholder="100.00"></td>
                    </tr>
                </tbody>
            </table>
            <div class="icon-container-i">
                <button type="button" class="btn btn-secondary" onclick="cambiarFormMatricula()">
                    <i class="bi bi-arrow-left"></i>
                </button>
            </div>
            <div class="icon-container">
                <button type="button" class="btn btn-success" onclick="alertSave()">
                <i class="bi bi-floppy-fill"></i>
            </button>
            </div>
        </div>
    </div>

</form>