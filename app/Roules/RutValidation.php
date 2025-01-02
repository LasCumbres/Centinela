<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RutValidation implements Rule
{
    public function passes($attribute, $value)
    {
        $rut = preg_replace('/[^k0-9]/i', '', $value);
        $dv = strtoupper(substr($rut, -1));
        $numeros = substr($rut, 0, -1);
        $suma = 0;
        $factor = 2;

        for ($i = strlen($numeros) - 1; $i >= 0; $i--) {
            $suma += $numeros[$i] * $factor;
            $factor = $factor == 7 ? 2 : $factor + 1;
        }

        $dv_calculado = 11 - ($suma % 11);

        if ($dv_calculado == 11) $dv_calculado = '0';
        if ($dv_calculado == 10) $dv_calculado = 'K';

        return $dv == $dv_calculado;
    }

    public function message()
    {
        return 'El RUT ingresado no es válido.';
    }
}
