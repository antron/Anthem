<?php

/**
 * ライブラリ：削除モーダル.
 */

namespace App\Lib;

/**
 * ライブラリ：削除モーダル.
 *
 * @version 0.0.0 2020-04-27


 */
class DeletexModel
{

    /**
     * 削除が可能かフラグ.
     *
     * @var boolean
     */
    public $error;

    /**
     * 削除メッセージを表示するPタグ.
     *
     * @var string
     */
    public $parag;

    /**
     * 削除のルーティング.
     *
     * @var string
     */
    public $route;

    /**
     * 削除対象の表示名.
     *
     * @var string
     */
    public $title;

    /**
     * 削除のモデル.
     *
     * @var string
     */
    protected $table_name;

    /**
     * モデル.
     *
     * @var var
     */
    protected $model;

    /**
     * コンストラクタ.
     * 
     * @param Model $model モデル
     */
    public function __construct($model)
    {
        $this->table_name = $model->getTable();

        $this->model = $model;

        $this->error = false;

        $this->title = '削除前確認';

        $this->parag = '';

        $this->route = [substr($this->table_name, 0, -1) . '.destroy', $model->id];
    }

}
