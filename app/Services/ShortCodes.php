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
        'order_is_Canceled' => [
            ['code' => 'order_code', 'description' => 'order unique code'],
            ['code' => 'order_amount', 'description' => 'order total amount'],
            ['code' => 'order_shipping_method', 'description' => 'order shipping method'],
            ['code' => 'order_shipping_price', 'description' => 'order shipping price'],
            ['code' => 'order_number', 'description' => 'order number'],
            ['code' => 'order_currency', 'description' => 'order currency'],
            ['code' => 'order_created_at', 'description' => 'order create date'],
            ['code' => 'order_updated_at', 'description' => 'order updated date'],
        ],
        'order_is_completed' => [
            ['code' => 'order_code', 'description' => 'order unique code'],
            ['code' => 'order_amount', 'description' => 'order total amount'],
            ['code' => 'order_shipping_method', 'description' => 'order shipping method'],
            ['code' => 'order_shipping_price', 'description' => 'order shipping price'],
            ['code' => 'order_number', 'description' => 'order number'],
            ['code' => 'order_currency', 'description' => 'order currency'],
            ['code' => 'order_created_at', 'description' => 'order create date'],
            ['code' => 'order_updated_at', 'description' => 'order updated date'],
        ],
        'order_is_completely_collected' => [
            ['code' => 'order_code', 'description' => 'order unique code'],
            ['code' => 'order_amount', 'description' => 'order total amount'],
            ['code' => 'order_shipping_method', 'description' => 'order shipping method'],
            ['code' => 'order_shipping_price', 'description' => 'order shipping price'],
            ['code' => 'order_number', 'description' => 'order number'],
            ['code' => 'order_currency', 'description' => 'order currency'],
            ['code' => 'order_created_at', 'description' => 'order create date'],
            ['code' => 'order_updated_at', 'description' => 'order updated date'],
        ],
        'order_is_partially_collected' => [
            ['code' => 'order_code', 'description' => 'order unique code'],
            ['code' => 'order_amount', 'description' => 'order total amount'],
            ['code' => 'order_shipping_method', 'description' => 'order shipping method'],
            ['code' => 'order_shipping_price', 'description' => 'order shipping price'],
            ['code' => 'order_number', 'description' => 'order number'],
            ['code' => 'order_currency', 'description' => 'order currency'],
            ['code' => 'order_created_at', 'description' => 'order create date'],
            ['code' => 'order_updated_at', 'description' => 'order updated date'],
        ],
        'order_is_submitted' => [
            ['code' => 'order_code', 'description' => 'order unique code'],
            ['code' => 'order_amount', 'description' => 'order total amount'],
            ['code' => 'order_shipping_method', 'description' => 'order shipping method'],
            ['code' => 'order_shipping_price', 'description' => 'order shipping price'],
            ['code' => 'order_number', 'description' => 'order number'],
            ['code' => 'order_currency', 'description' => 'order currency'],
            ['code' => 'order_created_at', 'description' => 'order create date'],
            ['code' => 'order_updated_at', 'description' => 'order updated date'],
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

    function relatedShortcoder($content, $user = null,$job)
    {
        $external=$job->additional_data;
        foreach ($this->relatedShortcoders as $relatedShortcoders) {
            foreach ($relatedShortcoders as $shortcode) {
                if (function_exists($shortcode['code'])) {
                    $fn = $shortcode['code'];
                    $content = str_replace('[' . $shortcode['code'] . ']', $fn($user,$external),$content);

                }
            }
        }
        return $content;
    }

}