<?php namespace Andreoav\Cbr\Distances;

/**
 * 
 */
class EuclideanDistance extends Distance
{

	/**
	 * [getDistance description]
	 * 
	 * @param  [type] $p1 [description]
	 * @param  [type] $p2 [description]
	 * @return [type]     [description]
	 */
	public function getDistance($p1, $p2)
	{
		return pow($p1 - $p2, 2);
	}

}