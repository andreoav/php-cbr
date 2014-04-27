<?php namespace Andreoav\Cbr\Cases;

class Attribute
{
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
	 * [__construct description]
	 * @param [type] $_name   [description]
	 * @param [type] $_weight [description]
	 */
	public function __construct($_name, $_weight)
	{
		$this->name   = $_name;
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
	 * [getWeight description]
	 * @return [type] [description]
	 */
	public function getWeight()
	{
		return $this->weight;
	}

	/**
	 * [getWeight description]
	 * @return [type] [description]
	 */
	public function setWeight($_weight)
	{
		$this->weight = (float) $_weight;
	}
}