<?php namespace Andreoav\Cbr\Distances;

use Andreoav\Cbr\Cases\CBRCase;

class ManhattanDistance extends Distance {

    public function getDistance(CBRCase $sourceCase, CBRCase $targetCase)
    {
        //return abs($sourceCase - $targetCase);    

        $totalDistance = 0;
        foreach ($sourceCase->getAttributes() as $sourceAttribute)
        {
            $targetAttribute = $targetCase->getAttributeByName($sourceAttribute->getName());

            // There is an attribute
            if ($targetAttribute !== null)
            {
                $totalDistance += $this->getLocalDistance($sourceAttribute->getWeightedValue(),
                    $targetAttribute->getWeightedValue());
            }
        }

        return $totalDistance;
    }

    protected function getLocalDistance($value1, $value2)
    {
        return abs($value1 - $value2);
    }
}