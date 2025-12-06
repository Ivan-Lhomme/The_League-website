<?php
    abstract class AbstractController {
        public function render(array $data, string $template) : void{
            extract($data);  /*add this to create variables from array key for the home.phtml, it works, so I won't touch*/
            require "templates/layout.phtml";
        }
    }
?>
