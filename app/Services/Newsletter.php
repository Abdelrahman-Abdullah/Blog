<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email ,  string $listId = null)
    {
        // this equal to ==> $listId = $listId ?? config('services.mailchimp.subscribers_list_id')
        $listId ??= config('services.mailchimp.subscribers_list_id');

        return $this->client()->lists->addListMember($listId, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);

    }

    public function client(): ApiClient
    {

        $client = new ApiClient();
      return  $client->setConfig([
            'apiKey' => env('MAILCHIMP_KEY'),
            'server' => 'us21'
        ]);
    }
}
