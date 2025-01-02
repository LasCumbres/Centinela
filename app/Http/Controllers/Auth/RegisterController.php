<?php

protected function create(array $data)
{
    return User::create([
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']), // Aquí se encripta la contraseña
    ]);
}
