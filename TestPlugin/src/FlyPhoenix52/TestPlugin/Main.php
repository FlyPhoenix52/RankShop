<?php

namespace FlyPhoenix52\TestPlugin;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use onebone\economyapi\EconomyAPI;

class Main extends PluginBase {

	public function onCommand(CommandSender $sender, Command $cmd, String $Label, Array $args) : bool {

		switch($cmd->getName()){
			case "rankshop":
			 if($sender instanceof Player){
			 	$this->rankUI($sender);
			 } else {
			 	$sender->sendMessage("What?");
			 }
			break;
		}
		return true;
	}

	public function rankUI($player){
		$form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function(Player $player, int $data =
			null){

			if($data === null){
				return true;
			}
			$papi = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
			$money = EconomyAPI::getInstance()->myMoney($player);
			switch($data){
				case 0:
				 if($money >= 3000){
				 	$papi->getGroup($player, $papi->getGroup("VIP"));
				 	$sender->addTitle("Purchase!!!!", "You have been purchase VIP rank yay");
				 	$sender->sendMessage("Purchase complete UwU enjoy your rank yay");
				 } else {
				 	$sender->sendMessage("Not enough money you need 3000 uwu");
				 }
				break;

				case 1:
				 if($money >= 6000){
				 	$papi->getGroup($player, $papi->getGroup("MVP"));
				 	$sender->addTitle("Purchase!!!!", "You have been purchase MVP rank yay");
				 	$sender->sendMessage("Purchase complete UwU enjoy your rank yay");
				 } else {
				 	$sender->sendMessage("Not enough money you need 6000 uwu");
				 }
				break;

				case 2:
				 if($money >= 9000){
				 	$papi->getGroup($player, $papi->getGroup("UWU"));
				 	$sender->addTitle("Purchase!!!!", "You have been purchase UWU rank yay");
				 	$sender->sendMessage("Purchase complete UwU enjoy your rank yay");
				 } else {
				 	$sender->sendMessage("Not enough money you need 9000 uwu");
				 }
				break;
			}
		});
		$form->setTitle("RankShop");
		$form->addButton("VIP RANK");
		$form->addButton("MVP RANK");
		$form->addButton("UWU RANK");
		$form->sendToPlayer($player);
		return $form;
	}
}
