<?php

class Universe {

	private $map = array();
	/** @var  NeighbourGuesser */
	private $neighbourGuesser;

	public function __construct( $neighbourGuesser ) {

		$this->neighbourGuesser = $neighbourGuesser;
	}

	public function add( PositionInterface $position, $state ) {
		$this->map[$position->getId()] = $state;
	}

	public function getState( PositionInterface $position ) {
		return $this->map[$position->getId()];
	}

	public function getNeighboursStates( $position ) {
		$neighbours = $this->neighbourGuesser->getNeighboursPositions( $position );
		$states = array_map( function( $neighbourPosition ) {
			return $this->getState( $neighbourPosition );
		}, $neighbours );
		return $states;
	}
}