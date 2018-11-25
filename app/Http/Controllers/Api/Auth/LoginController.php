<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\JwtProviderInterface;
use Firebase\JWT\JWT;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        login as protected doLogin;
    }

    /**
     * @var JwtProviderInterface
     */
    private $jwtProvider;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JwtProviderInterface $jwtProvider)
    {
        $this->middleware('guest');
        $this->jwtProvider = $jwtProvider;
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        try {
            return $this->doLogin($request);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'error' => $exception->getMessage(),
            ], 400);
        }
    }

    protected function sendLoginResponse(Request $request)
    {
        $token = $this->jwtProvider->encode([
            'email' => Auth::user()->email,
        ]);

        return response()->json([
            'status' => true,
            'data' => [
                'token' => $token
            ]
        ]);
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json([
            'status' => false,
            'error' => trans('auth.failed'),
        ], 400);
    }
}
