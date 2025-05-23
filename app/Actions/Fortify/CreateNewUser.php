<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\Rule;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Log::info('Registration attempt', ['input' => array_except($input, ['password', 'password_confirmation'])]);
        
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'usertype' => ['required', 'string', 'in:normal,partner'],
            'partner_company' => ['required_if:usertype,partner', 'nullable', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
        ]);
        
        if ($validator->fails()) {
            Log::warning('Registration validation failed', ['errors' => $validator->errors()->toArray()]);
        }
        
        $validator->validate();
        
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'usertype' => $input['usertype'],
            'password' => Hash::make($input['password']),
            'partner_company' => $input['partner_company'] ?? null,
            'country' => $input['country'],
            'city' => $input['city'],
            'phone' => $input['phone'],
        ]);
        
        Log::info('User registered successfully', ['user_id' => $user->id, 'email' => $user->email]);
        
        return $user;
    }
}







