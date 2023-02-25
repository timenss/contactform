<?php

return [
    'plugin' => [
        'name' => 'Contact Form',
        'description' => 'Plugin Contact form with notification in Telegram Bot',
        'page_options_label' => 'Options Telegram Bot',
        'page_options_description' => 'Manage Telegram options'
    ],
    //timen.contactform::lang.contactform.
    'contactform' => [
        'name' => 'Contact Form',
        'description' => 'Contact form with notification in Telegram Bot',
        'prop_description' => 'Message after sending form',
        'prop_title' => 'Message',
        'prop_default' => 'Thank you for submitting your inquiry',
        'prop_description_mask' => 'Mask for input phone',
        'prop_title_mask' => 'Mask',
        'prop_default_mask' => '+7(999) 999-99-99',
        'message_success' => 'Options saved!'

    ],
    //timen.contactform::lang.settings.
    'settings' => [
        'message_from_telegramapi' => 'Message from Api: ',
        'message_error' => 'Error, something wrong',
        'message_success' => 'Options saved!',
        'bot_token' => 'API Bot Token',
        'bot_token_comment' => 'example: 5730956921:AAHRDIuxKw1-OFLA-lpisЗ01РуudрLdCR9g',
        'bot_users' => 'List users',
        'bot_users_promt' => 'Add user',
        'bu_user' => 'ID user Telegram',
        'domain' => 'Address your site',
        'domain_commentAbove' => 'for registration script (with https://), example, https://site.ru',
        'activebot' => 'Registration WebHook if checked',
        'activebot_commentAbove' => 'After save unchecked this and save'
    ],
    //timen.contactform::lang.telegram.
    'telegram' => [
        'message' => 'Notify from site: '
    ]
];
