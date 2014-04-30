<?php namespace Andreoav\Cbr\Cases;

/**
 * 
 */
class CBRCase
{
	protected $name;

	protected $attributes = array();

	/**
	 * Load a case .json file into the system
	 * 
	 * @param  string $filepath Full path to the file
	 */
	public function loadCase($_filepath)
	{
		$_contents = json_decode(file_get_contents($_filepath));

		if (isset($_contents->name))
		{
			$this->name = $_contents->name;
		} // else throw

		if (isset($_contents->attributes) and count($_contents->attributes) > 0)
		{
			foreach ($_contents->attributes as $_attribute)
			{
				$this->attributes[] = new Attribute($_attribute->name,
					$_attribute->value, $_attribute->weight);
			}
		}
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

	/**
	 * [getAttributeByName description]
	 * @param  [type] $_name [description]
	 * @return [type]        [description]
	 */
	public function getAttributeByName($_name)
	{
		foreach ($this->attributes as $_attribute)
		{
			if ($_attribute->getName() === $_name)
			{
				return $_attribute;
			}
		}

		return null;
	}

	/**
	 * [getDistanceBetweenCases description]
	 * 
	 * @param  CBRCase $_targetCase [description]
	 * @return [type]               [description]
	 */
	public function getEuclideanDistance(CBRCase $_targetCase)
	{
		$_distSum = 0;
		foreach ($this->attributes as $_attribute)
		{
			$_targetAttribute = $_targetCase->getAttributeByName($_attribute->getName());

			// There is an attribute
			if ($_targetAttribute !== null)
			{
				$_absSum = abs($_attribute->getWeightnedValue() - $_targetAttribute->getWeightnedValue());
				$_distSum += pow($_absSum, 2);
			}
		}

		return sqrt($_distSum);
	}

	public function getSimilarity(CBRCase $_targetCase, $_algorithm = 'EuclideanDistance')
	{
		if (method_exists($this, 'get' . $_algorithm))
		{
			$_distance = $this->{'get' . $_algorithm}($_targetCase);
			return $_distance !== 0 ? 1 / $_distance : 1;
		}
	}
}