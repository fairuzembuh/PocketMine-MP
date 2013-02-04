<?php

/*

           -
         /   \
      /         \
   /   PocketMine  \
/          MP         \
|\     @shoghicp     /|
|.   \           /   .|
| ..     \   /     .. |
|    ..    |    ..    |
|       .. | ..       |
\          |          /
   \       |       /
      \    |    /
         \ | /

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.


*/

class SugarcaneBlock extends TransparentBlock{
	public function __construct(){
		parent::__construct(SUGARCANE_BLOCK, 0, "Sugarcane");
	}
	
	public function getDrops(Item $item, Player $player){
		return array(
			array(SUGARCANE, 0, 1),
		);
	}
	
	public function place(BlockAPI $level, Item $item, Player $player, Block $block, Block $target, $face, $fx, $fy, $fz){
		if($block->inWorld === true){
			$down = $level->getBlockFace($block, 0);
			if($down->getID() === SUGARCANE_BLOCK){
				$level->setBlock($block, $this->id, 0);
				return true;				
			}elseif(/*$down->getID() === 2 or $down->getID() === 3 or */$down->getID() === 12){
				$block0 = $level->getBlockFace($down, 2);
				$block1 = $level->getBlockFace($down, 3);
				$block2 = $level->getBlockFace($down, 4);
				$block3 = $level->getBlockFace($down, 5);
				if($block0->getID() === WATER or $block0->getID() === STILL_WATER
				or $block1->getID() === WATER or $block1->getID() === STILL_WATER
				or $block2->getID() === WATER or $block2->getID() === STILL_WATER
				or $block3->getID() === WATER or $block3->getID() === STILL_WATER){
					$level->setBlock($block, $this->id, 0);
					return true;
				}
			}
		}
		return false;
	}
	
}