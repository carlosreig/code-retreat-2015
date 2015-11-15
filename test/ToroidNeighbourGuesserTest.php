<?php

class ToroidNeighbourGuesserTest extends  PHPUnit_Framework_TestCase {
	public function testItGetsNeighboursFromAPosition() {
		$neighbourGuesser = new ToroidNeighbourGuesser( 0, 3, 0, 3 );
		$position = new Position2D( 0, 0 );

		$aPositions = $neighbourGuesser->getNeighboursPositions( $position );
		$aExpectedPositions = [
			new Position2D( 3, 3 ),
			new Position2D( 0, 3 ),
			new Position2D( 1, 3 ),
			new Position2D( 3, 0 ),
			new Position2D( 1, 0 ),
			new Position2D( 3, 1 ),
			new Position2D( 0, 1 ),
			new Position2D( 1, 1 ),
		];

		$this->assertEquals( $aExpectedPositions, $aPositions );
	}
}
