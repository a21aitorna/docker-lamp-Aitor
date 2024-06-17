<!doctype html>
<html lang="en">
  <head>
    <title>Post Fácil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <?php
        require 'e2.php';
        $universidad = array(
            "Facultad de Ciencias" => array(
                "Departamento de Física" => array(
                    "Profesores" => array(
                        "Juan Pérez",
                        "Ana García"
                    ),
                    "Cursos" => array(
                        "Mecánica",
                        "Electromagnetismo"
                    )
                ),
                "Departamento de Matemáticas" => array(
                    "Profesores" => array(
                        "Carlos Sánchez",
                        "María López"
                    ),
                    "Cursos" => array(
                        "Álgebra",
                        "Cálculo"
                    )
                )
            ),
            "Facultad de Letras" => array(
                "Departamento de Historia" => array(
                    "Profesores" => array(
                        "José Ruiz",
                        "Elena Fernández"
                    ),
                    "Cursos" => array(
                        "Historia Antigua",
                        "Historia Moderna"
                    )
                ),
                "Departamento de Literatura" => array(
                    "Profesores" => array(
                        "Miguel Hernández",
                        "Laura Martínez"
                    ),
                    "Cursos" => array(
                        "Literatura Española",
                        "Literatura Universal"
                    )
                )
            )
        );
        //De la de imprimirProfesoresFiltrando pondré dos ejemplos, uno en ql que se muestren dos nombres de facultades diferentes (sólo hay dos nombres que empiecen por la misma letra), y otro ejemplo individual.
        echo "<h1>Listado de profesores</h1>";
        imprimirProfesores($universidad);
        
        echo("<br>====================================================================================================================================<br><h1>Listado de profesores cuyo nombre comienza por M</h1>");
        imprimirProfesoresFiltrando($universidad, "M");
        echo("<br>====================================================================================================================================<br><h1>Listado de profesores cuyo nombre comienza por C</h1>");
        imprimirProfesoresFiltrando($universidad, "C");
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>