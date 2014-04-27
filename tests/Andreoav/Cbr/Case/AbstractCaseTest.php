<?php namespace Andreoav\Cbr\Cases;

use Andreoav\Cbr\BaseTest;
//use Andreoav

class AbstractCaseTest extends BaseTest
{
	public function testLoadCase()
	{
		$cbrcase  = new CBRCase;	
		$contents = $cbrcase->loadCase(__DIR__ . '/testCase.json');
		
		// Assert 
		$this->assertInstanceOf('stdClass', $contents);
		
		// Assert case name
		$this->assertEquals($cbrcase->getName(), 'Case Name');
		
		// Assert one attribute
		$this->assertCount(2, $cbrcase->getAttributes());

		// Assert attribute name
		$this->assertEquals($contents->attributes[0]->name, 'attr');

		// Assert weight

		print_r($contents);
	}
}