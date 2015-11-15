<?php

class Position2D implements PositionInterface {

	public $x;
	public $y;

	public function __construct($x, $y) {
		$this->x = $x;
		$this->y = $y;
	}

	public function getId() {
		return 'x'.$this->x.'y'.$this->y;
	}
}