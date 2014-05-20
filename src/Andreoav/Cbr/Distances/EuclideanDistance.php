<?php namespace Andreoav\Cbr\Distances;

use Andreoav\Cbr\Cases\CBRCase;

class EuclideanDistance extends Distance {

    /**
     * @param CBRCase $sourceCase
     * @param CBRCase $targetCase
     * @return float
     */
    public function getDistance(CBRCase $sourceCase, CBRCase $targetCase)
    {
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

        return sqrt($totalDistance);
    }

    protected function getLocalDistance($value1, $value2)
    {
        return pow($value1 - $value2, 2);
    }
}