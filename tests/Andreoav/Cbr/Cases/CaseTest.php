<?php namespace Andreoav\Cbr\Cases;

use Andreoav\Cbr\BaseTest;

/**
 * 
 */
class AbstractCaseTest extends BaseTest
{
    public function testLoadCase()
    {
        $cbrcase = new CBRCase; 
        $cbrcase->loadCase(__DIR__ . '/Json/testCase.json');
        
        // Assert case name
        $this->assertEquals($cbrcase->getName(), 'Case Name');
        
        // Assert one attribute
        $this->assertCount(2, $cbrcase->getAttributes());

        // Assert attribute name
        $this->assertEquals($cbrcase->getAttributes()[0]->getName(), 'attr');

        // Assert value
        $this->assertEquals($cbrcase->getAttributes()[0]->getValue(), 150);

        // Assert weight
        $this->assertEquals($cbrcase->getAttributes()[0]->getWeight(), 1.0);
    }

    /**
     * [testAttributeByName description]
     * 
     * @return [type] [description]
     */
    public function testAttributeByName()
    {
        $cbrcase = new CBRCase;
        $cbrcase->loadCase(__DIR__ . '/Json/testCase.json');

        // Test instance
        $this->assertInstanceOf('Andreoav\Cbr\Cases\Attribute', $cbrcase->getAttributeByName('attr'));

        // Test attribute name
        $this->assertEquals($cbrcase->getAttributeByName('attr')->getName(), 'attr');

        // Test attribute value
        $this->assertEquals($cbrcase->getAttributeByName('attr')->getValue(), 150);

        // Test attribute weight
        $this->assertEquals($cbrcase->getAttributeByName('attr')->getWeight(), 1.0);

        // must be null
        $this->assertNull($cbrcase->getAttributeByName('otherAttribute'));  
    }

    /**
     * [testGetEuclideanDistance description]
     * 
     * @return [type] [description]
     */
    public function testGetEuclideanDistance()
    {
        $caseOne = new CBRCase;
        $caseOne->loadCase(__DIR__ . '/Json/testCase.json');

        $caseTwo = new CBRCase;
        $caseTwo->loadCase(__DIR__ . '/Json/testCase2.json');

        // Set Algorithms
        $caseOne->setAlgorithm(new \Andreoav\Cbr\Distances\EuclideanDistance());
        $caseTwo->setAlgorithm(new \Andreoav\Cbr\Distances\EuclideanDistance());
        
        // Must be 111.80339887499
        $this->assertEquals($caseOne->getDistance($caseTwo), 111.80339887499);
    }

    public function testManhattanDistance()
    {
        $caseOne = new CBRCase;
        $caseOne->loadCase(__DIR__ . '/Json/testCase.json');

        $caseTwo = new CBRCase;
        $caseTwo->loadCase(__DIR__ . '/Json/testCase2.json');

        // Set Algorithm
        $caseOne->setAlgorithm(new \Andreoav\Cbr\Distances\ManhattanDistance());
        $caseTwo->setAlgorithm(new \Andreoav\Cbr\Distances\ManhattanDistance());

        // Must be 150
        $this->assertEquals($caseOne->getDistance($caseTwo), 150);
    }

    /**
     * [testGetSimilarity description]
     * 
     * @return [type] [description]
     */
    public function testGetSimilarity()
    {
        $caseOne = new CBRCase;
        $caseOne->loadCase(__DIR__ . '/Json/testCase.json');

        $caseTwo = new CBRCase;
        $caseTwo->loadCase(__DIR__ . '/Json/testCase2.json');

        // Set Algorithms
        $caseOne->setAlgorithm(new \Andreoav\Cbr\Distances\EuclideanDistance());
        $caseTwo->setAlgorithm(new \Andreoav\Cbr\Distances\EuclideanDistance());
        
        // Must be 0.0089442719099992
        $this->assertEquals($caseOne->getSimilarity($caseTwo), 0.0089442719099992);
    }
}