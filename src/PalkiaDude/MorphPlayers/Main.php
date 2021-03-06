<?php
namespace PalkiaDude\MorphPlayers;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\entity\Zombie;
use pocketmine\Player;
use pocketmine\level\Position;
use pocketmine\Server;
use pocketmine\plugin\Plugin;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
class Main extends PluginBase implements Listener{
  
  public function onEnable(){
  $this->getServer()->getPluginManager()->registerevents($this, $this);
  $this->getLogger()->info(TextFormat::GREEN . "Morphing Powers Activated!");
  }
  function spawn($p){
    hidePlayer($p);
  }

    public function onCommand(CommandSender $sender, Command $cmd, $label,array $args){
        if(strtolower($cmd->getName()) === "morphcreeper"){
            if($sender instanceof Player){
                if($this->isPlayer($sender)){
                    $this->removePlayer($sender);
                    $sender->sendMessage(TextFormat::GOLD . "You have morphed back.");
                    return true;
                }
                else{
                    $this->addPlayer($sender);
                    $sender->sendMessage(TextFormat::GREEN . "You have morphed into the Zombie.");
                    return true;
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED . "Please use this command in-game.");
                return true;
            }
        }
    }
    public function addPlayer(Player $player){
        $this->players[$player->getName()] = $player->getName();
    }
    public function isPlayer(Player $player){
        return in_array($player->getName(), $this->players);
    }
    public function removePlayer(Player $player){
        unset($this->players[$player->getName()]);
    }
   public function onMove(PlayerMoveEvent $newb){
        $p= $newb->getPlayer();
        if(isset($this->zombie) && $p === $this->player){
          $this->zombie->teleport(new Position($p->getX(),$p->getY(),$p->getZ(),$p->getLevel()));
        }
      }
    }

