<?php namespace Timen\ContactForm\Controllers;

use Backend\Classes\Controller;
use Timen\ContactForm\Models\Settings;


class TelegramBot extends Controller
{

    public function __construct()
    {
        parent::__construct();
        header('Content-Type: text/html; charset=utf-8');
        $this->startBot(file_get_contents('php://input'));
    }

    private function startBot($data)
    {
        $data = json_decode($data, true);

        //$path = __DIR__."/messages.json";
        //file_put_contents($path, json_encode($data));

        if (!empty($data['message']['text'])) {
            $chat_id = $data['message']['chat']['id'];
            $text = trim($data['message']['text']);
            $user = $data['message']['from']['id'];
            switch ($text) {
                case '/start':
                    $text_return = "Привет 😊";
                    $this->send($chat_id, $text_return);
                    break;

                case '/about':
                    $text_return = "Привет 😊, я бот, который управляет турникетами)";
                    $this->send($chat_id, $text_return);
                    break;

                case '/open1':
                    if ($this->isAuth($user)) {
                        $this->send($chat_id, $this->Open(1));
                    }else{
                        $this->send($chat_id, "У вас нет прав для выполнения этой операции 🤷‍♂️");
                    }
                    break;

            }

        }
    }

    public function send($chat_id, $text)
    {
        $ch = curl_init();
        $ch_post = [
            CURLOPT_URL => 'https://api.telegram.org/bot' . Settings::get('bot_token') . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => [
                'chat_id' => $chat_id,
                'parse_mode' => 'HTML',
                'text' => $text,
                'reply_markup' => '',
            ]
        ];

        curl_setopt_array($ch, $ch_post);
        curl_exec($ch);
    }

    public function sendNotify($info){
    	$users = Settings::get('bot_users');
    	return $users;
        foreach ($users as $key => $user) {
            $this->send($user, $info);
        }
    }

	public function registerBotHook()
	{
		$token = Settings::instance()->bot_token;
		$url = Settings::instance()->domain."/api/v1/tgbot";
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
}
