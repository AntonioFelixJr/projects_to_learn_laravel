<?php

namespace App\Policies;

use App\User;
use App\Chamado;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChamadoPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->eAdmin())
        {
            return  true;
        }

    } 

    public function verChamado($user, Chamado $chamado)
    {
        return $user->id == $chamado->user_id;
    }
}
