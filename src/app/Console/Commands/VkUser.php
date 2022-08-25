<?php

namespace App\Console\Commands;

use App\UserService;
use Illuminate\Console\Command;

class VkUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vk:users {vk_id=208607626}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to fetch users from VK';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $vkId = $this->argument('vk_id');

        (new UserService)->fetchFriends($vkId);
    }
}
