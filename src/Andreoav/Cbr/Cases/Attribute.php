<?php namespace Andreoav\Cbr\Cases;

class Attribute {

    /**
     * [$name description]
     * @var [type]
     */
    protected $name;

    /**
     * [$weight description]
     * @var [type]
     */
    protected $weight;

    /**
     * [$value description]
     * @var [type]
     */
    protected $value;


    /**
     * @param       $_name
     * @param int   $_value
     * @param float $_weight
     */
    public function __construct($_name, $_value = 1, $_weight = 1.0)
    {
        $this->name = $_name;
        $this->value = $_value;
        $this->weight = (float) $_weight;
    }

    /**
     * [getName description]
     * @return [type] [description]
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * [setName description]
     * @param [type] $_name [description]
     */
    public function setName($_name)
    {
        $this->name = $_name;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * [setValue description]
     * @param [type] $_value [description]
     */
    public function setValue($_value)
    {
        $this->value = $_value;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param $_weight
     */
    public function setWeight($_weight)
    {
        $this->weight = (float) $_weight;
    }

    /**
     * @return int
     */
    public function getWeightedValue()
    {
        return $this->value * $this->weight;
    }
}