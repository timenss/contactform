<?php namespace Timen\Contactform;

use Backend;
use System\Classes\PluginBase;

/**
 * contactform Plugin Information File
 */
class Plugin extends PluginBase
{
    public function registerSettings()
    {
        return [
            'location' => [
                'label'       => 'timen.contactform::lang.plugin.page_options_label',
                'description' => 'timen.contactform::lang.plugin.page_options_description',
                'category'    => 'system::lang.system.categories.system',
                'icon'        => 'icon-briefcase',
                'class'       => 'Timen\ContactForm\Models\Settings',
                'order'       => 500,
                'keywords'    => 'options telegram'
            ]
        ];
    }

    public function registerComponents()
    {
        return [
            'Timen\Contactform\Components\ContactForm' => 'contactForm',
        ];
    }
}
