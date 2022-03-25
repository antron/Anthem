<?php

namespace Antron\Anthem;

class Sortobj
{

    public $objects;
    private $values;

    public function __construct()
    {
        $this->values = [];
        $this->objects = [];
    }

    public function add($key, $value, $object)
    {

        $this->values[$key] = $value;
        $this->objects[$key] = $object;
    }

    public function get($max = 100000)
    {

        $objects = [];

        arsort($this->values);

        $keys = array_keys($this->values);

        $count = 0;

        foreach ($keys as $key) {

            if ($count < $max) {
                $objects[] = $this->objects[$key];
            } else {
                break;
            }

            $count++;
        }

        return $objects;
    }

}
