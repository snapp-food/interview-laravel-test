<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 11/25/18
 * Time: 9:02 AM
 */

namespace App\Services\Auth;


use App\Model\User;
use Firebase\JWT\JWT;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

final class JwtGuard implements Guard
{
    use GuardHelpers;

    /**
     * @var Request
     */
    private $request;

    private $checked = false;

    /**
     * @var JwtProviderInterface
     */
    private $jwtProvider;

    /**
     * Create a new authentication guard.
     *
     * @param  \Illuminate\Contracts\Auth\UserProvider  $provider
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(UserProvider $provider, Request $request, JwtProviderInterface $jwtProvider)
    {
        $this->user = null;
        $this->request = $request;
        $this->provider = $provider;
        $this->jwtProvider = $jwtProvider;
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if ($this->checked) {
            return $this->user;
        }
        $this->checked = true;
        $email = $this->getEmailFromToken($this->request);

        if (empty($email)) {
            return null;
        }

        $user = $this->provider->retrieveByCredentials(
            ['email' => $email]
        );

        return $this->user = $user;
    }

    private function getEmailFromToken(Request $request)
    {
        $authorization = $request->header('Authorization');

        $bearerExploded = explode('Bearer ', $authorization);

        if ($bearerExploded[0] !== "") {
            return null;
        }

        if (!isset($bearerExploded[1])) {
            return null;
        }

        $payload = $this->jwtProvider->decode($bearerExploded[1]);

        if (is_null($payload)) {
            return null;
        }

        if (isset($payload['username'])) {
            return $payload['username'];
        }

        if (isset($payload['email'])) {
            return $payload['email'];
        }

        return null;
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        return true;
    }
}
