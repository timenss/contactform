<?php

return [
    'plugin' => [
        'name' => 'Contact Form',
        'description' => 'Плагин обратной связи через Telegram бота',
        'page_options_label' => 'Настройки Telegram бота',
        'page_options_description' => 'Управление настройками бота'
    ],
    //timen.contactform::lang.contactform.
    'contactform' => [
        'name' => 'Contact Form',
        'description' => 'Контактная форма с возможностью отправки уведомлений через Telegram бота',
        'prop_description' => 'Сообщение после отправки формы',
        'prop_title' => 'Сообщение',
        'prop_default' => 'Благодарим вас за отправку запроса',
        'prop_description_mask' => 'Маска для ввода номера телефона',
        'prop_title_mask' => 'Маска',
        'prop_default_mask' => '+7(999) 999-99-99',
        'message_success' => 'Настройки сохранены'

    ],
    //timen.contactform::lang.settings.
    'settings' => [
        'message_from_telegramapi' => 'Сообщение от Api: ',
        'message_error' => 'Ошибка, что-то не так',
        'message_success' => 'Настройки сохранены',
        'bot_token' => 'Токен API',
        'bot_token_comment' => 'пример: 5730956921:AAHRDIuxKw1-OFLA-lpisЗ01РуudрLdCR9g',
        'bot_users' => 'Список рассылки',
        'bot_users_promt' => 'Добавить пользователя Telegram',
        'bu_user' => 'ID пользователя Telegram',
        'domain' => 'Адрес вашего сайта',
        'domain_commentAbove' => 'для регистрации скрипта (с https://), пример, https://site.ru',
        'activebot' => 'Регистрация WebHook если активно',
        'activebot_commentAbove' => 'После активации уберите галочку'
    ],
    //timen.contactform::lang.telegram.
    'telegram' => [
        'message' => 'Уведомление с сайта: '
    ]
];
