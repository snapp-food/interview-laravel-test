<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 11/25/18
 * Time: 10:50 AM
 */

namespace App\Services\Auth;


use Carbon\Carbon;
use Firebase\JWT\JWT;

final class JwtProvider implements JwtProviderInterface
{
    /**
     * @var string
     */
    private $secret;

    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    public function encode(array $payload) : string
    {
        $exp = new \DateTime('+1 day');
        $token = JWT::encode(array_merge($payload, [
            'exp' => $exp->getTimestamp()
        ]), $this->secret);

        return $token;
    }

    public function decode(string $token) : ?array
    {
        try {
            $payload = JWT::decode($token, $this->secret, ['HS256']);

            return (array) $payload;
        } catch (\UnexpectedValueException $exception) {
            return null;
        }
    }
}
