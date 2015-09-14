<?php

namespace CaptainKenji17;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\level\sound\AnvilFallSound;

class Main extends PluginBase implements Listener{
	public function onEnable(){
		$this->saveDefaultConfig();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        	$this->getServer()->getLogger()->info(TextFormat::BLUE . "Plugin Enabled!");
	}
	public function onHurt(EntityDamageEvent $event){
		if($event instanceof EntityDamageByEntityEvent){
			$damager = $event->getDamager();
			if($damager instanceof Player){
				if($damager->getInventory()->getItemInHand()->getId() === 280){
					$event->setKnockBack($this->getConfig()->get("KnockBack-Power"));
                              $level = $damager->getLevel();
                              $level->addSound(new AnvilFallSound($player->getLocation()));     
				}
			}
		}
	}
}
