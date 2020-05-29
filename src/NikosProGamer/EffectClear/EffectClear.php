<?php

namespace NikosProGamer\EffectClear;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginManager;
use pocketmine\Player;

class EffectClear extends PluginBase implements Listener{
    
    public function onEnable()
    {
        $this->getLogger()->info("§d§lEC §r§6Enabled!");
        $this->registerEvents();

    }

    public function registerEvents()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if (strtolower($command->getName()) == "bless") {
            if ($sender->hasPermission("bless.cmd")) {
                foreach ($sender->getEffects() as $effect) {
                    if ($effect->getType()->isBad()) {
                        $sender->removeEffect($effect->getId());
                        $sender->sendMessage("§6§l§oYou have been blessed from bad effects!");
                    }elseif(!$sender->hasPermission("bless.cmd")){
                        $sender->sendMessage("§cYou do not have permission to use §d§lEC§r§c! Buy a §6§lRank§r §cto gain access to it!");                 


                    }
                }
            }
        }
return true;
    }
}
