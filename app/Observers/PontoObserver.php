<?php

namespace App\Observers;

use App\Point;
use App\Card;

class PontoObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(Point $ponto)
    {
        $card = $ponto->card;
        if ($card->pontos->count() == 10)
        {
            $card->full = true;
            $card->save();
            $user = $card->usuario;
            $user->card()->save(new Card);
        }
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
}
