<?php

    class Contenido {
        // *Atributos generales
        private  $id;
        private  $titulo;
        private  $descripcion;

        protected array $errores = [];

        // *Método Constructor
        public function __construct($id,$titulo,$descripcion)
        {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descripcion = $descripcion;
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of titulo
         */
        public function getTitulo()
        {
                return $this->titulo;
        }

        /**
         * Get the value of descripcion
         */
        public function getDescripcion()
        {
                return $this->descripcion;
        }

           /**
         * Get the value of errores
         */
        public function getErrores(): array
        {
                return $this->errores;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Set the value of titulo
         */
        public function setTitulo($titulo): self
        {
                $this->titulo = $titulo;

                return $this;
        }

        /**
         * Set the value of descripcion
         */
        public function setDescripcion($descripcion): self
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        public function validar(): bool
        {
                $this->errores= [];

                if (empty(trim($this->titulo))) {
                        $this->errores['titulo'] = "El título es Obligatorio";
                }elseif (mb_strlen(trim($this->titulo)) < 5) {
                        $this->errores['titulo'] = "El título debe tener como mínimo 5 carácteres";
                }

                if (empty(trim($this->descripcion))) {
                        $this->errores['descripcion'] = "La descripción es Obligatoria";
                }elseif (mb_strlen(trim($this->descripcion)) < 20) {
                        $this->errores['descripcion'] = "La descripción debe tener como mínimo 20 carácteres";
                }

                return empty($this->errores);
        }

     
    }