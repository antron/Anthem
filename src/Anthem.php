<?php

namespace Antron\Anthem;

class Anthem
{

    /**
     * Excelの内容を配列化.
     * 
     * @param string $filepath ファイルパス
     * @return array Excelの内容
     */
    public static function getArrayFromExcel($filepath)
    {
        $array_import = new \Antron\Anthem\Imports\ArrayImport();

        $array = \Excel::toArray($array_import, $filepath);

        return $array[0];
    }

    /**
     * Excelの内容を連想配列化.
     * 
     * @param string $filepath ファイルパス
     * @return array Excelの内容
     */
    public static function getIndexedFromExcel($filepath)
    {
        $array_import = new \Antron\Anthem\Imports\IndexedImport();

        $array = \Excel::toArray($array_import, $filepath);

        return $array[0];
    }

    /**
     * Pythonの実行結果のJsonをデコードして入手.
     * 
     * @param string $command コマンド
     * @return array Pythonの実行結果
     */
    public static function runPython($command)
    {

        $output = null;

        exec($command, $output);

        if (isset($output[0])) {

            return json_decode($output[0], true);
        } else {

            return null;
        }
    }

    /**
     * ファイルの削除.
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
