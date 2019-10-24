<?php



class FishTaco {
	private $recipe;
	private $taste;

	//constructor method
	public function __construct() {
		$this->recipe;
		$this->taste;
	}


/**
 * accessor for recipe.
 *
 * getters
 */
	public function getRecipe(): float {
		return ($this->recipe);null;
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

$betterTaco = new FishTaco();
echo $betterTaco->getRecipe()."_". $betterTaco->getTaste()."=". $betterTaco->delicious();

$betterTaco->delicious();



