<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserAdded
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        foreach ($event->friends as $key => $friend) {
            $url = $friend['photo_100'];
            $contents = file_get_contents($url);
            $name = "avatar_$key";
            Storage::put($name, $contents);

            $user = new User();

            $user = User::updateOrCreate(['id' => $friend['id']], ['first_name' => $friend['first_name'], 'last_name' => $friend['last_name'], 'photo_100' => $friend['photo_100']]);

            $user->addMedia(storage_path("app/avatar_$key"))
            ->toMediaCollection('images');
        }
    }
}
