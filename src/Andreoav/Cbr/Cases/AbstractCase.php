<?php namespace Andreoav\Cbr\Cases;

abstract class AbstractCase
{
	protected $name;

	protected $attributes = array();

	public function loadCase($filepath)
	{
		$_contents = json_decode(file_get_contents($filepath));

		if (isset($_contents->name))
		{
			$this->name = $_contents->name;
		} // else throw

		if (isset($_contents->attributes) and count($_contents->attributes) > 0)
		{
			foreach ($_contents->attributes as $_attribute)
			{
				$this->attributes[] = new Attribute($_attribute->name, $_attribute->weight);
			}
		}

		return $_contents;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($_name)
	{
		$this->name = $_name;
	}

	public function getAttributes()
	{
		return $this->attributes;
	}
}