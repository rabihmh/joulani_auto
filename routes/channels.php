<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
////    return (int)$user->id === (int)$id;
//    return true;
//}, ['guards' => 'admin']);
Broadcast::channel('App.Models.Admin.{id}', function ($admin, $id) {
    // Check if the authenticated user is an admin and their ID matches the channel ID
    return $admin instanceof Admin && $admin->id === (int)$id;
}, ['guards' => 'admin']);
// channel li ra7 ytem ersel 3leha  notification channel hiye esma App.Models.User....,l closure function wazifeta temel check
//if this user b7e2elo ye3mel listen la hay l channel, return true or false
