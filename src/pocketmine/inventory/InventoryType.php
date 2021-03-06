<?php
namespace pocketmine\inventory;

/**
 * Saves all the information regarding default inventory sizes and types
 */
class InventoryType{
	const CHEST = 0;
	const DOUBLE_CHEST = 1;
	const PLAYER = 2;
	const FURNACE = 3;
	const CRAFTING = 4;
	const WORKBENCH = 5;
	const BREWING_STAND = 6;
	const ANVIL = 7;
	const ENCHANT_TABLE = 8;

	private static $default = [];

	private $size;
	private $title;
	private $typeId;

	/**
	 * @param $index
	 *
	 * @return InventoryType
	 */
	public static function get($index){
		return isset(static::$default[$index]) ? static::$default[$index] : null;
	}

	public static function init(){
		if(count(static::$default) > 0){
			return;
		}

		static::$default[static::CHEST] = new InventoryType(27, "Chest", 0);
		static::$default[static::DOUBLE_CHEST] = new InventoryType(27 + 27, "Double Chest", 0);
		static::$default[static::PLAYER] = new InventoryType(40, "Player", 0); //27 CONTAINER, 4 ARMOR (9 reference HOTBAR slots)
		static::$default[static::FURNACE] = new InventoryType(3, "Furnace", 2);
		static::$default[static::CRAFTING] = new InventoryType(5, "Crafting", 1); //4 CRAFTING slots, 1 RESULT
		static::$default[static::WORKBENCH] = new InventoryType(10, "Crafting", 1); //9 CRAFTING slots, 1 RESULT
		static::$default[static::ENCHANT_TABLE] = new InventoryType(2, "Enchant", 4); //1 INPUT/OUTPUT, 1 LAPIS
		static::$default[static::BREWING_STAND] = new InventoryType(4, "Brewing", 5); //1 INPUT, 3 POTION
		static::$default[static::ANVIL] = new InventoryType(3, "Anvil", 6); //2 INPUT, 1 OUTPUT
	}

	/**
	 * @param int    $defaultSize
	 * @param string $defaultTitle
	 * @param int    $typeId
	 */
	private function __construct($defaultSize, $defaultTitle, $typeId = 0){
		$this->size = $defaultSize;
		$this->title = $defaultTitle;
		$this->typeId = $typeId;
	}

	/**
	 * @return int
	 */
	public function getDefaultSize(){
		return $this->size;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle(){
		return $this->title;
	}

	/**
	 * @return int
	 */
	public function getNetworkType(){
		return $this->typeId;
	}
}
