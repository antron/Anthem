<?php

/**
 */

namespace Antron\Anthem\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ArrayExport implements FromArray
{

    private $array;

    public function __construct($array, $head = [])
    {
        if ($head) {
            $array = array_merge($head, $array);
        }

        $this->array = $array;
    }

    public function array(): array
    {
        return $this->array;
    }

}
