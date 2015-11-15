<?php
class Neighbour2DGuesser implements  NeighbourGuesser {

	public function getNeighboursPositions( $position ) {
		return [
			new Position2D(  $position->x - 1,  $position->y - 1 ),
			new Position2D(  $position->x,  $position->y - 1),
			new Position2D(  $position->x + 1,  $position->y - 1 ),
			new Position2D(  $position->x - 1,  $position->y ) ,
			new Position2D(  $position->x + 1,  $position->y ),
			new Position2D(  $position->x - 1,  $position->y + 1 ),
			new Position2D(  $position->x,  $position->y + 1 ),
			new Position2D(  $position->x + 1,  $position->y + 1 )
		];
	}
}