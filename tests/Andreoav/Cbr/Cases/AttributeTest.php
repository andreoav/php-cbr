<?php namespace Andreoav\Cbr\Cases;

use Andreoav\Cbr\BaseTest;

class AttributeTest extends BaseTest
{
	protected $_attribute;

	public function __construct()
	{
		parent::__construct();
		$this->_attribute = new Attribute('attr', 100, 1.5);
	}

	public function testGetName()
	{
		$this->assertEquals($this->_attribute->getName(), 'attr');
	}

	public function testSetName()
	{
		$this->_attribute->setName('attr2');
		$this->assertEquals($this->_attribute->getName(), 'attr2');
	}

	public function testGetValue()
	{
		$this->assertEquals($this->_attribute->getValue(), 100);
	}

	public function testSetValue()
	{
		$this->_attribute->setValue(150);
		$this->assertEquals($this->_attribute->getValue(), 150);
	}

	public function testGetWeight()
	{
		$this->assertEquals($this->_attribute->getWeight(), 1.5);
	}

	public function testSetWeight()
	{
		$this->_attribute->setWeight(2.0);
		$this->assertEquals($this->_attribute->getWeight(), 2.0);
	}	

	public function testGetWeightedValue()
	{
		$this->assertEquals($this->_attribute->getWeightedValue(), 100 * 1.5);
	}
}