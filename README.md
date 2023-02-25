# Contact Form plugin

This plugin for October CMS allows you to implement a contact form with the ability to send notifications to the Telegram bot.

Form component written including Bootstrap styles.

## Warning
For the bot to work, the site must have a secure https connection.

#### Preparation
* For the plugin to work, you need to create a bot with BotFather in Telegram.
* Next, go to the plugin settings and set the token
* To register a WebHook, you need to enter the site address with https:// and check the "Registration WebHook if checked" box.
* Click save settings. If the notification says "Webhook is already set", then the script is active.
* After that uncheck "Registration WebHook if checked" and click save settings.
* After that, the feedback form will fully work.

#### Use with third party plugins
Just create Telegram Bot and pass post data:
```php
    $bot = new TelegramBot();
    $bot->Notify($data);
```