<?php
    if(!$openid->mode){
        if(isset($_GET["steam_auth"])){
            $openid->identity="http://steamcommunity.com/openid/"; 
            redirect($openid->authUrl());
        }
        $sign_in="<a href='?steam_auth' calss='sign_in'><img src='http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_small.png' alt='steam login'></a>";
    }
    elseif($openid->mode=='cancel'){
        echo 'User has canceled authentication!';
    } 
    else{
    	$sign_in="Sign Out";
        if($openid->validate()){
                $id=$openid->identity;
                $ptn="/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn,$id,$matches);
                
                $this->session->set_userdata('steam_id', $matches[1]);

                $url="http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$_STEAMAPI&steamids=$matches[1]";
                $json_object=file_get_contents($url);
                $json_decoded=json_decode($json_object);
                foreach($json_decoded->response->players as $player){
                    $this->session->set_userdata("user", array(
                            "Player ID"=>$player->steamid,
                            "Player Name"=>$player->personaname,
                            "Profile URL"=>$player->profileurl,
                            "SmallAvatar"=>$player->avatar,
                            "MediumAvatar"=>$player->avatarmedium,
                            "LargeAvatar"=>$player->avatarfull
                         ));
                }
        }
    }
?>
<html>
<head>
    <meta content="" charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?=base_url()?>public/css/reset.css">
	<link rel="stylesheet" href="<?=base_url()?>public/css/font-awesome.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url()?>public/css/style.css">
	<script src="<?=base_url()?>public/js/jquery.min.js"></script>
	<script src="<?=base_url()?>public/js/jquery.nicescroll.js"></script>
	<script src="<?=base_url()?>public/js/main.js"></script>
</head>
<body>
	<section id="header" class="cf">
	    <div class="header cf">
		    <a href="<?=base_url()?>"><img src="public/images/logo.png" alt="steam" class="logo"></a>
		    <ul class="ul-menu">
		    	<li><a href="<?=base_url()?>">home</a></li>
		    	<li><a href="<?=base_url()?>about">about</a></li>
		    	<li><a href="<?=base_url()?>terms">terms</a></li>
		    	<li><a href="<?=base_url()?>contacts">contacts</a></li>
                <?php if($this->session->userdata("user")): ?>
                    <img src="<?=$this->session->userdata("user")["MediumAvatar"]?>" alt="">
                <?php endif ?>
		    </ul>
	    </div>
    </section>