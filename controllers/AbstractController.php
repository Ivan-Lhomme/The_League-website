<?php
    abstract class AbstractController {
        public function render(array $data, string $template) : void{
            require "templates/layout.phtml";
        }
    }
?>
