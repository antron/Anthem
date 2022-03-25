<?php

/**
 */

namespace Antron\Anthem\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IndexedImport implements ToCollection, WithHeadingRow
{

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        unset($collection);
    }

}