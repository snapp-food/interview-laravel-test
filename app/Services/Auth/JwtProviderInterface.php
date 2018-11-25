<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 11/25/18
 * Time: 10:50 AM
 */

namespace App\Services\Auth;


interface JwtProviderInterface
{
    public function encode(array $payload) : string;
    public function decode(string $token) : ?array;
}
