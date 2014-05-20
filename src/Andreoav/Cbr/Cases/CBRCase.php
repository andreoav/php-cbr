<?php namespace Andreoav\Cbr\Cases;

use Andreoav\Cbr\Distances\Distance;
use Andreoav\Cbr\Exception\CbrException;

/**
 * 
 */
class CBRCase
{
    protected $name;

    protected $attributes = array();

    protected $algorithm;

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
     * [setAlgorithm description]
     * 
     * @param Distance $_algorithm [description]
     */
    public function setAlgorithm(Distance $_algorithm)
    {
        $this->algorithm = $_algorithm;
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
    public function getDistance(CBRCase $_targetCase)
    {
        if ($this->algorithm === null)
        {
            throw new CbrException('Distance algorithm not set.');
        }

        return $this->algorithm->getDistance($this, $_targetCase);
    }

    public function getSimilarity(CBRCase $_targetCase, $_algorithm = 'EuclideanDistance')
    {
        $_distance = $this->getDistance($_targetCase);
        return $_distance === 0 ? 1 : (1 / $_distance);
    }
}