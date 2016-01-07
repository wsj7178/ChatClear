<?php

namespace ChatClear;

use pocketmine\plugin\PluginBase;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat as Color;
use pocketmine\Player;

class ChatClear extends PluginBase
{
	public function onEnable()
	{
		$this->getLogger()->alert("본 플러그인은 Light-EULA를 사용합니다.");
		$this->getLogger()->alert("이 플러그인을 사용시 Light-EULA라이센스에 동의하는 것으로 간주합니다.");
		$this->getLogger()->alert("라이센스->https://github.com/LightBlue7/Light-EULA/blob/master/LICENSE.md");
		$commandMap = $this->getServer()->getCommandMap();
		$command = new PluginCommand("ChatClear", $this);
		$command->setDescription("채팅을 청소합니다.");
		$command->setPermission("ChatClear.command.allow");
		$command->setUsage("/ChatClear");
		$commandMap->register("ChatClear", $command);
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		$this->ChatClear();
		
		return true;
	}
	public function ChatClear(){
		foreach($this->getServer()->getOnlinePlayers() as $player){
			
			$line = str_repeat("§f\n", 100);
			$player->sendMessage($line);
		}
	}
}
