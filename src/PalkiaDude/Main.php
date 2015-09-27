<?php
namespace MorphPlayers;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\entity\Creeper;
use pocketmine\Player;
use pocketmine\level\Position;
use pocketmine\Server;
use pocketmine\plugin\Plugin
class Main extends PluginBase implements Listener{
  
  public function onEnable(){
  $this->getServer()->getPluginManager()->registerevents($this, $this)
  $this->getLogger()->info(TextFormat::GREEN . "Morphing Powers Activated!")
  }
  function spawn($p){
    hidePlayer($p);
  }
  }
public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
  if(strtolower($cmd -> getName()) === "morphcreeper"){
    if($sender instanceof Player){
      if($this->isPlayer($sender)){
        $this->removePlayer($sender);
        $sender->sendMessage(TextFormat::GOLD . "Morphing Powers deactivate!")
      }
      else{
        $this->addPlayer(sender);
        $sender->sendMessage(TextFormat::GREEN . "You have morphed into the explosive Creeper!")
      }
      }
    }
  }
}
