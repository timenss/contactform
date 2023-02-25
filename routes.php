<?php
use Backend\Classes\Controller;
use Timen\ContactForm\Models\Settings;
use Timen\ContactForm\Classes\TelegramBot;

Route::get('/tgbot/{token}', array(function($token){

	if (Settings::instance()->get('bot_token') != $token) {
		\Log::error('Undefined token '.$token);
		App::abort(403, 'Unauthorized action.');
		return;
	}

	$active = Settings::instance()->get('activebot');
	$bot = new TelegramBot();
	if($active){
		$bot->registerBotHook();
	}else{
		$bot->sendFromURL();
	}

}));
