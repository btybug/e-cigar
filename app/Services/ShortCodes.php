<?php namespace App\Services;

/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/18/2018
 * Time: 1:01 PM
 */
class ShortCodes
{
    public $relatedShortcoders = [
        'confirm_email' => [
            'confirmation_link' => ['code' => 'confirmation_link', 'description' => 'url witch will confirm user email']
        ],
        'reset_password' => [
            'reset_password_link' => ['code' => 'reset_password_link', 'description' => 'url witch will take user to change password page']
        ],
        'ticket' => [

        ],
        'order' => [

        ],
    ];
    public $mailShortcodes = [
        'app_name' => ['code' => 'app_name', 'description' => 'your site name '],
        'app_url' => ['code' => 'app_name', 'description' => 'your site url '],
        'app_blog_url' => ['code' => 'app_blog_url', 'description' => 'your site blog url '],
        'receiver_name' => ['code' => 'receiver_name', 'description' => 'email receiver user name'],
        'receiver_last_name' => ['code' => 'receiver_last_name', 'description' => 'email receiver user last name'],
        'receiver_last_phone' => ['code' => 'receiver_last_phone', 'description' => 'email receiver user last name'],
    ];


    function MailShortcoder($content, $user = null)
    {
        foreach ($this->mailShortcodes as $shortcode) {
            if (function_exists($shortcode['code'])) {
                $fn = $shortcode['code'];
                $content = str_replace('[' . $shortcode['code'] . ']', $fn($user),$content);
            }
        }
        return $content;
    }

    function relatedShortcoder($content, $user = null)
    {
        foreach ($this->relatedShortcoders as $relatedShortcoders) {
            foreach ($relatedShortcoders as $shortcode) {
                if (function_exists($shortcode['code'])) {
                    $fn = $shortcode['code'];
                    $content = str_replace('[' . $shortcode['code'] . ']', $fn($user),$content);

                }
            }
        }
        return $content;
    }

}