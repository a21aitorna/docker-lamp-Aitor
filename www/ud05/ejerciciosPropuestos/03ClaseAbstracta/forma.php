<?php
abstract class Forma{
    abstract protected function getColor();
    abstract protected function setColor($color);
    public function describe(){
        return sprintf("Soy un %s de color %s \n", get_class($this), $this->getColor());
    }

}