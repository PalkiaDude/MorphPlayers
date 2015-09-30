<?php
namespace PalkiaDude\MorphPlayers;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\entity\Creeper;
use pocketmine\Player;
use pocketmine\level\Position;
use pocketmine\Server;
use pocketmine\plugin\Plugin;
class Main extends PluginBase implements Listener{
  
  public function onEnable(){
  $this->getServer()->getPluginManager()->registerevents($this, $this);
  $this->getLogger()->info(TextFormat::GREEN . "Morphing Powers Activated!");
  }
  function spawn($p){
    hidePlayer($p);
  }
}

      public function onMove(PlayerMoveEvent $newb){
        $p= $newb getPlayer();
        if(isset($this->creeper) && $p === $this->player){
          $this->creeper->teleport(new Position($p->getX(),$p->getY(),$p->getZ(),$p->getLevel()));
        }
      }
    }
  }
}
