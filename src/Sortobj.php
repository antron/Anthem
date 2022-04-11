<?php

namespace Antron\Anthem;

class Sortobj
{

    /**
     * オブジェクトの配列.
     *
     * @var array
     */
    public $objects;

    /**
     * 降順フラグ.
     * 降順ならtrue、デフォルトはtrue
     *
     * @var boolean
     */
    private $order_desc;

    /**
     * ソート対象となる値.
     *
     * @var var
     */
    private $values;

    /**
     * コンストラクタ.
     * 
     * @param boolean $order_desc 降順フラグ
     */
    public function __construct($order_desc = true)
    {
        $this->objects = [];

        $this->order_desc = $order_desc;

        $this->values = [];
    }

    /**
     * 追加.
     * 
     * @param var $key キー
     * @param var $value 値
     * @param var $object オブジェクト
     */
    public function add($key, $value, $object)
    {
        $this->objects[$key] = $object;

        $this->values[$key] = $value;
    }

    public function sort($objects, $key_value, $max = 100000)
    {
        foreach ($objects as $key => $object) {

            $this->add($key, $object[$key_value], $object);
        }

        return $this->get($max);
    }

    public function get($max = 100000)
    {

        $objects = [];

        if ($this->order_desc) {
            arsort($this->values);
        } else {
            asort($this->values);
        }

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
