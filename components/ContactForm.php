<?php
namespace Timen\Contactform\Components;
use Cms\Classes\ComponentBase;
use Timen\ContactForm\Classes\TelegramBot;
use Timen\ContactForm\Models\Settings;
use October\Rain\Exception\ValidationException;
use Input;
use Flash;
class ContactForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'timen.contactform::lang.contactform.name',
            'description' => 'timen.contactform::lang.contactform.description'
        ];
    }
   public function defineProperties()
    {
        return [
            'message' => [
                'description'       => 'timen.contactform::lang.contactform.prop_description',
                'title'             => 'timen.contactform::lang.contactform.prop_title',
                'default'           => \Lang::get("timen.contactform::lang.contactform.prop_default"),
                'type'              => 'string'
            ],
            'mask' => [
                'description'       => 'timen.contactform::lang.contactform.prop_description_mask',
                'title'             => 'timen.contactform::lang.contactform.prop_title_mask',
                'default'           => \Lang::get("timen.contactform::lang.contactform.prop_default_mask"),
                'type'              => 'string'
            ]
        ];

    }

    protected function validate(array $data) 
    {
        // Validate request
        $rules = [
            'name' => 'required|min:3|max:100',
            'phone' => 'required|min:6|max:17'
        ];

        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function onRun()
    {
        $this->addJs('/plugins/timen/contactform/assets/javascript/jquery.maskedinput.min.js');
    }

	public function onSendData()
    {

        $message = $this->property('message');

        $data = Input::only('name', 'phone');
        $this->validate($data);

        $bot = new TelegramBot();
        $bot->Notify($data);

        Flash::success( $message );

        return $data;
    }
 
}