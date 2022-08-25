<?php

namespace App;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class UserService
{
    private function callApi($id)
    {
        $response = Http::get(config('services.vk_user.url').'friends.get', [
            'user_id' => $id,
            'access_token' => config('services.vk_user.token'),
            'v' => config('services.vk_user.version'),
            'fields' => 'id, first_name, last_name, photo_100'
        ]);

        return $response->json()['response']['items']
        ? $response->json()['response']['items']
        : null;
    }

    public function fetchFriends($id)
    {
        $friends = $this->callApi($id);

        event(new UserCreated($friends));
    }
}
