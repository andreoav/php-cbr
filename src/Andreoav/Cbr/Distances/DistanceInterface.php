<?php namespace Andreoav\Cbr\Distances;

use Andreoav\Cbr\Cases\CBRCase;

interface DistanceInterface {

    public function getDistance(CBRCase $sourceCase, CBRCase $targetCase);

}