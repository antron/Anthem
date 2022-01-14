<?php

/**
 */

namespace Antron\Anthem;

class Anthem
{

    /**
     * ファイルを削除する.
     * 
     * @param string $filepath ファイルパス
     */
    public static function unlinkFile($filepath)
    {
        if (file_exists($filepath)) {
            unlink($filepath);
        }
    }

}
