<?php



class FishTaco {
	private $recipe;
	private $taste;

	//constructor method
	public function __construct (float $newRecipe, float $newTaste) {
		$this->setRecipe($newRecipe);
		$this->setTaste($newTaste);
	}

/**
 *
 * getters
 */
	public function getRecipe(): float {
		return ($this->recipe);
	}
	public function getTaste(): float {
		return ($this->taste);
	}

	/**
	 * setters
	 * @param float $newRecipe
	 */
	public function setRecipe(float $newRecipe) :void {
		$this->recipe =$newRecipe;
	}
	public function setTaste(float $newTaste) :void {
	$this->taste =$newTaste;
	}
	//delicious method
	public function delicious () :float {
		return ($this->recipe - $this->taste);
	}

}




