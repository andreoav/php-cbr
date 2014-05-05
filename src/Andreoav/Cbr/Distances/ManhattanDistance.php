<?php namespace Andreoav\Cbr\Distances;

class ManhattanDistance extends Distance
{
	public function getDistance($p1, $p2)
	{
		return abs($p1 - $p2);
	}
}