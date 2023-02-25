<?php namespace Timen\ContactForm\Classes;

use Backend\Classes\Controller;
use Timen\ContactForm\Models\Settings;
use Input;


class TelegramBot extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function send($chat_id, $text)
    {
        $ch = curl_init();
        $token = Settings::get('bot_token');
        $ch_post = [
            CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10
        ];
        $data = [
                'chat_id' => $chat_id,
                'parse_mode' => 'HTML',
                'text' => $text,
                'reply_markup' => '',
        ];

        curl_setopt_array($ch, $ch_post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        return curl_exec($ch);
    }

    public function sendNotify($info){
    	$users = Settings::get('bot_users');
        $data = [];
        foreach ($users as $key => $user) {
            $data[] = $this->send($user['bu_user'], $info);
        }
        return $data;
    }

	public function registerBotHook()
	{
		$token = Settings::instance()->get('bot_token');
		$url = Settings::instance()->get('domain')."/tgbot/".$token;
		$urlHook = "https://api.telegram.org/bot$token/setWebhook?url=$url";
        $ch = curl_init();
        $ch_post = [
            CURLOPT_URL => $urlHook,
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
        ];

        curl_setopt_array($ch, $ch_post);
        return curl_exec($ch);
	}

    public function sendFromURL()
    {
        $data = json_decode(Input::get('text'),true);
        $message = \Lang::get("timen.contactform::lang.telegram.message");
        $text = $message."\n";
        foreach ($data as $key => $value) {
            $text .= $key.": ".$value."\n";
        }
        return $this->sendNotify($text);
    }

    public function sendSelfData($info)
    {
        $data = json_encode($info);
        $token = Settings::instance()->get('bot_token');

        $url = Settings::instance()->get('domain')."/tgbot/$token?text=".$data;
        return file_get_contents($url);
    }

    public function sendSelfDataNull()
    {
        $token = Settings::instance()->get('bot_token');
        $url = Settings::instance()->get('domain')."/tgbot/$token";
        return file_get_contents($url);
    }

    public function Notify($text)
    {
        $this->sendSelfData($text);
    }
}
