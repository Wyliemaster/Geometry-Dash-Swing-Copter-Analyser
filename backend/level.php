<?php
require_once "settings.php";
require_once "objects.php";
class Level
{
    public $settings = NULL;
    public $objects = [];


    public static function create($string)
    {
        $instance = new Level();
        $data = explode(";", $string);

        $instance->settings = Settings::create($data[0]);
        array_shift($data);

        $size = count($data) - 1; // accounting for the shift

        for ($i = 0; $i < $size; $i++) { 
            array_push(
                $instance->objects, 
                GDObject::create($data[$i])
            );
        }

        return $instance;
    }
}
