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
		$xRange = range( $this->xmin, $this->xmax );
		$threeXRange = array_merge( $xRange, $xRange, $xRange );
		$firstOccurence = array_search( $coordinate, $threeXRange );
		unset( $threeXRange[$firstOccurence] );
		return $threeXRange[ array_search( $coordinate, $threeXRange ) + $offset ];
	}

	private function getTransformedYCoordinate( $coordinate, $offset ) {
		$yRange = range( $this->ymin, $this->ymax );
		$threeYRange = array_merge( $yRange, $yRange, $yRange );
		$firstOccurence = array_search( $coordinate, $threeYRange );
		unset( $threeYRange[$firstOccurence] );
		return $threeYRange[ array_search( $coordinate, $threeYRange ) + $offset ];
	}
}