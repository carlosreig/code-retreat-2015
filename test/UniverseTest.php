<?php
require 'vendor/autoload.php';

class UniverseTest extends PHPUnit_Framework_TestCase {


	public function testItGetsAnElementStateFromAPosition() {
		$universe = new Universe( new Neighbour2DGuesser() );
		$position = new Position2D( 1, 2 );
		$universe->add( $position, new Alive );
		$this->assertInstanceOf( 'Alive', $universe->getState( $position ) );
		$position = new Position2D( 0, 3 );
		$universe->add( $position, new Dead );
		$this->assertInstanceOf( 'Dead', $universe->getState( $position ) );
	}

	public function testItGetsTheNeighboursStates() {
		$universe = new Universe( new Neighbour2DGuesser() );
		$aPositions = [
			new Position2D( 0, 1 ),
			new Position2D( 1, 1 ),
			new Position2D( 2, 1 ),
			new Position2D( 0, 2 ),
			new Position2D( 2, 2 ),
			new Position2D( 0, 3 ),
			new Position2D( 1, 3 ),
			new Position2D( 2, 3 ),
		];

		foreach ( $aPositions as $position ) {
			$universe->add( $position, new Alive() );
		}

		$universe->add( new Position2D( 1, 3 ), new Dead );

		$states = $universe->getNeighboursStates( new Position2D( 1, 2 ) );
		$aAliveNeighbours = array_filter( $states, function( $state ) {
			return $state instanceof Alive;
		} );

		$this->assertCount( 7, $aAliveNeighbours );
		$this->assertCount( 8, $states );
	}
}