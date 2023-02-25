<?php namespace Timen\ContactForm\Models;
use Model;
use Backend\Classes\Controller;
use Timen\ContactForm\Classes\TelegramBot;
use Flash;

/**
 * Settings
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];
    // A unique code
    public $settingsCode = 'timen_status_settings';
    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    public function afterSave()
    {
        $bot = new TelegramBot();
        $is_hook = $this->get('activebot');
        
        if($is_hook){
            $data = $bot->registerBotHook();
            $data = json_decode($data,true);
            if($data['ok'] == true){
                $message = \Lang::get('timen.contactform::lang.settings.message_from_telegramapi');
                Flash::success($message.$data['description']);    
            }else{
                Flash::error(\Lang::get("timen.contactform::lang.settings.message_error"));
            }
            
        }else{
            Flash::success(\Lang::get('timen.contactform::lang.contactform.message_success'));
        }

    }

    function afterRegister()
    {
        $settings = Settings::instance();
        $settings->activebot = false;
        $settings->save();
    }
}