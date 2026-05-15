<?php

    include_once("modelos/Inicio.php");
    include_once("modelos/DescripcionValor.php");
    include_once("modelos/Valor.php");
    include_once("modelos/DescripcionPrograma.php");
    include_once("modelos/Programa.php");
    include_once("modelos/DescripcionGaleria.php");
    include_once("modelos/Galeria.php");
    include_once("modelos/Configuracion.php");

    class ControladorPaginas{
        // *Función para mostrar la página de inicio
        public function inicio(){
            include_once("vistas/paginas/inicio.php");
        }

        // *Función para mostrar el error
        public function error(){
            include_once("vistas/paginas/error.php");
        }

        //* Función para mostrar toda la información de la página de edutécnica
        public function web(){
            $registroInicio = Inicio::mostrarPrimerRegistroInicio();
            $registroDescripcionValor = DescripcionValor::mostrarRegistroDescripcionValor();
            $registroValores = Valor::mostrarValores();
            $registroDescripcionPrograma = DescripcionPrograma::mostrarPrimerRegistro();
            $registroProgramas = Programa::mostrarProgramas();
            $registroDescripcionGaleria = DescripcionGaleria::mostrarPrimerRegistro();
            $registroGaleria = Galeria::mostrarGaleria();
            $registroConfiguracion = Configuracion::mostrarPrimerRegistroConfiguracion();
            include_once("vistas/institucion/index.php");
        }

    }
