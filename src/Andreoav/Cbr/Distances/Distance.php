<?php namespace Andreoav\Cbr\Distances;

abstract class Distance implements DistanceInterface {	

    public function getDistance($p1, $p2)
    {
        return abs($p1 - $p2);
    }

}