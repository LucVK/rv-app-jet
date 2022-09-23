<?php

namespace App\Actions\Rv;

use Illuminate\Support\Facades\Validator;

class ClubMemberActions 
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function create($input)
    {
        $validator = Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'department' => ['required', 'exists:teams,id'],
        ])->validate();
        
        echo 'Creating' . PHP_EOL;
    }
}
