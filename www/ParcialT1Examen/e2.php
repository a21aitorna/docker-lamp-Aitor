<?php

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

    function imprimirProfesores($array){
        echo "<ul>";
        foreach($array as $facultad=>$departamentos){
            echo("<h4>$facultad</h4>");
            foreach($departamentos as $departamento=>$datos_departamento){
                foreach($datos_departamento as $datos=>$profesores['Cursos']){
                    if(in_array($datos,['Profesores'])){
                        foreach($profesores as $profesor=>$nombresProfesores){
                            foreach($nombresProfesores as $nombreProfesor){
                                echo("<li>$nombreProfesor</li>");
                            }
                        }
                    }
                }
            }
        }
        echo "</ul>";
    }

    function imprimirProfesoresFiltrando($array, $comienzoLetra){
        echo "<ul>";
        foreach($array as $facultad=>$departamentos){
            
            foreach($departamentos as $departamento=>$datos_departamento){
                foreach($datos_departamento as $datos=>$profesores['Cursos']){
                    if(in_array($datos,['Profesores'])){
                        foreach($profesores as $profesor=>$nombresProfesores){
                            foreach($nombresProfesores as $nombreProfesor){
                                if(strtolower($nombreProfesor[0])==strtolower($comienzoLetra)){
                                    echo("<h4>$facultad</h4>");
                                    echo("<li>$nombreProfesor</li>");
                                }
                            }
                        }
                    }
                }
            }
        }
        echo "</ul>";
    }

?>