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
    private $ranks;

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

        $this->ranks = [];
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

        $this->sortByOrder();

        $this->ranks[$key] = self::ranking($this->values);

        return $this->get($max);
    }

    private function sortByOrder()
    {


        if ($this->order_desc) {
            arsort($this->values);
        } else {
            asort($this->values);
        }
    }

    public function getRank($id)
    {
        return $this->ranks[$id];
    }

    public function get($max = 100000)
    {
        $this->sortByOrder();

        $this->ranks = self::ranking($this->values);

        $objects = [];

        $count = 0;

        foreach (array_keys($this->values) as $key) {

            if ($count < $max) {
                $objects[] = $this->objects[$key];
            } else {
                break;
            }

            $count++;
        }

        return $objects;
    }

    /**
     * 順位の作成.
     * 配点配列を受け取って順位を付加する。同点があった場合は同順位とする。
     *
     * @return array 配点配列
     */
    public static function ranking($values)
    {
        $pointrank = 0;

        $rankadd = 1;

        $value_former = 0;

        $ranks = [];

        foreach ($values as $id => $value) {

            if ($value === $value_former) {
                $rankadd++;
            } else {
                $pointrank = $pointrank + $rankadd;

                $rankadd = 1;
            }

            $ranks[$id] = $pointrank;

            $value_former = $value;
        }

        return $ranks;
    }

}
