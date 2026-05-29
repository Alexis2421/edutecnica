<?php

include_once("config/conexion.php");

class Configuracion
{
        // *Atributos
        private $id;
        private $logo;
        private $colorEncabezado;
        private $nombreInstitucion;
        private $facebook;
        private $instagram;
        private $tiktok;
        private $nombreContacto;
        private $direccion;
        private $telefono;
        private $correo;
        private array $errores = [];

        public function __construct($id = null, $logo = '', $colorEncabezado = '', $nombreInstitucion = '', $facebook = '', $instagram = '', $tiktok = '', $nombreContacto = '', $direccion = '', $telefono = '', $correo = '')
        {
                $this->id = $id;
                $this->logo = $logo;
                $this->colorEncabezado = $colorEncabezado;
                $this->nombreInstitucion = $nombreInstitucion;
                $this->facebook = $facebook;
                $this->instagram = $instagram;
                $this->tiktok = $tiktok;
                $this->nombreContacto = $nombreContacto;
                $this->direccion = $direccion;
                $this->telefono = $telefono;
                $this->correo = $correo;
        }


        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of logo
         */
        public function getLogo()
        {
                return $this->logo;
        }

        /**
         * Get the value of colorEncabezado
         */
        public function getColorEncabezado()
        {
                return $this->colorEncabezado;
        }

        /**
         * Get the value of nombreInstitucion
         */
        public function getNombreInstitucion()
        {
                return $this->nombreInstitucion;
        }

        /**
         * Get the value of facebook
         */
        public function getFacebook()
        {
                return $this->facebook;
        }

        /**
         * Get the value of instagram
         */
        public function getInstagram()
        {
                return $this->instagram;
        }

        /**
         * Get the value of tiktok
         */
        public function getTiktok()
        {
                return $this->tiktok;
        }

        /**
         * Get the value of nombreContacto
         */
        public function getNombreContacto()
        {
                return $this->nombreContacto;
        }

        /**
         * Get the value of direccion
         */
        public function getDireccion()
        {
                return $this->direccion;
        }

        /**
         * Get the value of telefono
         */
        public function getTelefono()
        {
                return $this->telefono;
        }

        /**
         * Get the value of correo
         */
        public function getCorreo()
        {
                return $this->correo;
        }


        public function setId($value)
        {
                $this->id = $value;
        }

        public function setLogo($value)
        {
                $this->logo = $value;
        }

        public function setColorEncabezado($value)
        {
                $this->colorEncabezado = $value;
        }

        public function setNombreInstitucion($value)
        {
                $this->nombreInstitucion = $value;
        }

        public function setFacebook($value)
        {
                $this->facebook = $value;
        }

        public function setInstagram($value)
        {
                $this->instagram = $value;
        }

        public function setTiktok($value)
        {
                $this->tiktok = $value;
        }

        public function setNombreContacto($value)
        {
                $this->nombreContacto = $value;
        }

        public function setDireccion($value)
        {
                $this->direccion = $value;
        }

        public function setTelefono($value)
        {
                $this->telefono = $value;
        }

        public function setCorreo($value)
        {
                $this->correo = $value;
        }

        public function getErrores(): array
        {
                return $this->errores;
        }

        public function validarConfiguracionGeneral(array $files = []): bool
        {
                $this->errores = [];

                if (empty(trim($this->nombreInstitucion))) {
                        $this->errores['nombre_institucion'] = "El nombre de la institución es Obligatorio";
                } elseif (mb_strlen(trim($this->nombreInstitucion)) < 20) {
                        $this->errores['nombre_institucion'] = "El nombre de la institución debe tener como mínimo 20 carácteres";
                }

                if (empty(trim($this->facebook))) {
                        $this->errores['facebook'] = "La cuenta de facebook es Obligatoria";
                } elseif (mb_strlen(trim($this->facebook)) < 10) {
                        $this->errores['facebook'] = "La cuenta de facebook debe tener como mínimo 10 carácteres";
                }

                if (empty(trim($this->instagram))) {
                        $this->errores['instagram'] = "La cuenta de instagram es Obligatoria";
                } elseif (mb_strlen(trim($this->instagram)) < 10) {
                        $this->errores['instagram'] = "La cuenta de instagram debe tener como mínimo 10 carácteres";
                }

                if (empty(trim($this->tiktok))) {
                        $this->errores['tiktok'] = "La cuenta de tiktok es Obligatoria";
                } elseif (mb_strlen(trim($this->tiktok)) < 10) {
                        $this->errores['tiktok'] = "La cuenta de tiktok debe tener como mínimo 10 carácteres";
                }

                $hayArchivo = isset($files['logo']) && $files['logo']['error'] !== 4;

                // Si sí hay archivo
                if ($hayArchivo) {

                        // Validar errores de subida
                        if ($files['logo']['error'] !== 0) {
                                $this->errores['logo'] = "Error al subir la imagen";
                        } else {

                                $mime = mime_content_type($files['logo']['tmp_name']);

                                $permitidos = [
                                        'image/jpeg',
                                        'image/png',
                                        'image/webp'
                                ];

                                if (!in_array($mime, $permitidos)) {
                                        $this->errores['logo'] = "Formato no permitido. Solo se permite JPEG, PNG y WEBP";
                                }
                        }
                }

                return empty($this->errores);
        }

        public function validarConfiguracionContacto(): bool
        {
                $this->errores = [];

                if (empty(trim($this->nombreContacto))) {
                        $this->errores['nombre_contacto'] = "El nombre del contacto es Obligatorio";
                } elseif (mb_strlen(trim($this->nombreContacto)) < 20) {
                        $this->errores['nombre_contacto'] = "El nombre del contacto debe tener como mínimo 20 carácteres";
                }

                if (empty(trim($this->direccion))) {
                        $this->errores['direccion'] = "La dirección es Obligatoria";
                } elseif (mb_strlen(trim($this->direccion)) < 20) {
                        $this->errores['direccion'] = "La dirección debe tener como mínimo 20 carácteres";
                }

                if (empty(trim($this->telefono))) {
                        $this->errores['telefono'] = "Debe ingresar un número telefónico";
                } elseif (mb_strlen(trim($this->telefono)) <= 10) {
                        $this->errores['telefono'] = "El número telefónico debe tener 10 números";
                }


                if (empty(trim($this->correo))) {
                        $this->errores['correo'] = "Debe ingresar un correo";
                } elseif (!filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
                        $this->errores['correo'] = "Debe ingresar un correo válido";
                }

                return empty($this->errores);
        }



        // *Mostrando el primer registro de configuración
        public static function mostrarPrimerRegistroConfiguracion()
        {
                $conexion = conexion::conexionBD();
                $registroAMostrar = $conexion->prepare("SELECT * from configuracion order by id limit 1");
                $registroAMostrar->execute();
                $registroEncontrado = $registroAMostrar->fetch();
                return new Configuracion(
                        $registroEncontrado['id'],
                        $registroEncontrado['logo'],
                        $registroEncontrado['color_encabezado'],
                        $registroEncontrado['nombre_institucion'],
                        $registroEncontrado['facebook'],
                        $registroEncontrado['instagram'],
                        $registroEncontrado['tiktok'],
                        $registroEncontrado['nombre_contacto'],
                        $registroEncontrado['direccion'],
                        $registroEncontrado['telefono'],
                        $registroEncontrado['correo']
                );
        }

        public static function actualizarConfiguracionGeneral($nombreInstitucion, $colorEncabezado, $facebook, $instagram, $tiktok, $logo, $id)
        {
                $conexion = conexion::conexionBD();
                $registroAActualizar = $conexion->prepare("UPDATE configuracion set nombre_institucion=?,color_encabezado=?,facebook=?,instagram=?,tiktok=?,logo=? where id=?");
                $registroAActualizar->execute(array($nombreInstitucion, $colorEncabezado, $facebook, $instagram, $tiktok, $logo, $id));
        }

        public static function actualizarConfiguracionContacto($nombreContacto, $direccion, $telefono, $correo, $id)
        {
                $conexion = conexion::conexionBD();
                $registroAActualizar = $conexion->prepare("UPDATE configuracion set nombre_contacto=?,direccion=?,telefono=?, correo=? where id=?");

                $registroAActualizar->execute(array($nombreContacto, $direccion, $telefono, $correo, $id));
        }
}
