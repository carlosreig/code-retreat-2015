<?php

class NeighbourGuesserTest extends  PHPUnit_Framework_TestCase {
	public function testItGetsNeighboursFromAPosition() {
		$neighbourGuesser = new Neighbour2DGuesser();
		$position = new Position2D( 1, 2 );

		$aPositions = $neighbourGuesser->getNeighboursPositions( $position );
		$aExpectedPositions = [
			new Position2D( 0, 1 ),
			new Position2D( 1, 1 ),
			new Position2D( 2, 1 ),
			new Position2D( 0, 2 ),
			new Position2D( 2, 2 ),
			new Position2D( 0, 3 ),
			new Position2D( 1, 3 ),
			new Position2D( 2, 3 ),
		];

		$this->assertEquals( $aExpectedPositions, $aPositions );
	}
}
