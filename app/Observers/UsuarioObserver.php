<?php

namespace App\Observers;

use App\Usuario;
use App\Card;

class UsuarioObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(Usuario $user)
    {
        $user->card()->save(new Card);
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(Usuario $user)
    {
        //
    }
}
