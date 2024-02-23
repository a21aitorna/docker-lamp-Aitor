<?php

class Alien {
    private $nombre;
    private static $numberOfAliens = 0;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        self::$numberOfAliens++;
    }

    public static function getNumberOfAliens() {
        return self::$numberOfAliens;
    }
}

?>
