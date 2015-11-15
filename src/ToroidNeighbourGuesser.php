<?php

class ToroidNeighbourGuesser extends Neighbour2DGuesser {
	/**
	 * @var
	 */
	private $xmin;
	/**
	 * @var
	 */
	private $xmax;
	/**
	 * @var
	 */
	private $ymin;
	/**
	 * @var
	 */
	private $ymax;

	public function __construct( $xmin, $xmax, $ymin, $ymax ) {
		$this->xmin = $xmin;
		$this->xmax = $xmax;
		$this->ymin = $ymin;
		$this->ymax = $ymax;
	}

	public function getNeighboursPositions( $position ) {
		return [
			new Position2D( $this->getTransformedXCoordinate( $position->x, - 1), $this->getTransformedYCoordinate( $position->y, - 1 ) ),
			new Position2D( $this->getTransformedXCoordinate( $position->x, 0 ), $this->getTransformedYCoordinate( $position->y, - 1) ),
			new Position2D( $this->getTransformedXCoordinate( $position->x, + 1), $this->getTransformedYCoordinate( $position->y, - 1 ) ),
			new Position2D( $this->getTransformedXCoordinate( $position->x,  - 1), $this->getTransformedYCoordinate( $position->y, 0 ) ) ,
			new Position2D( $this->getTransformedXCoordinate( $position->x,  + 1), $this->getTransformedYCoordinate( $position->y, 0 ) ),
			new Position2D( $this->getTransformedXCoordinate( $position->x,  - 1), $this->getTransformedYCoordinate( $position->y, + 1 ) ),
			new Position2D( $this->getTransformedXCoordinate( $position->x, 0 ) , $this->getTransformedYCoordinate( $position->y, + 1 ) ),
			new Position2D( $this->getTransformedXCoordinate( $position->x,  + 1), $this->getTransformedYCoordinate( $position->y, + 1 ) )
		];
	}

	private function getTransformedXCoordinate( $coordinate, $offset ) {
		return $this->getCoordinateWithOffset( $this->xmin, $this->xmax, $coordinate, $offset );
	}

	private function getTransformedYCoordinate( $coordinate, $offset ) {
		return $this->getCoordinateWithOffset( $this->ymin, $this->ymax, $coordinate, $offset );
	}

	private function getCoordinateWithOffset( $min, $max, $coordinate, $offset ) {
		$range = range( $min, $max );
		$rangeRepeatedThreeTimes = array_merge( $range, $range, $range );
		$coordinateKeys = array_keys( $rangeRepeatedThreeTimes, $coordinate );
		return $rangeRepeatedThreeTimes[$coordinateKeys[1] + $offset];
	}

}