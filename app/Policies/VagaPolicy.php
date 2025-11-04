<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vaga;

class VagaPolicy
{
    public function update(User $user, Vaga $vaga): bool
    {
        return $vaga->user_id === $user->id;
    }

    public function delete(User $user, Vaga $vaga): bool
    {
        return $vaga->user_id === $user->id;
    }
}
