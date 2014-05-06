<?php namespace Andreoav\Cbr\Distances;

use Andreoav\Cbr\Cases\CBRCase;
use Andreoav\Cbr\Exception\CbrException;

abstract class Distance implements DistanceInterface {  

    public abstract function getDistance(CBRCase $sourceCase, CBRCase $targetCase);

    protected abstract function getLocalDistance($value1, $value2);

}