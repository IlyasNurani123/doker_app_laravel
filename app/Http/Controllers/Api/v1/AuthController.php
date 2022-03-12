<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    protected $authService;
    /**
     * __construct
     *
     * @param  mixed $authService
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * signup
     *
     * @param  mixed $request
     * @return void
     */
    public function signup(Request $request){

        return $this->authService->signup($request);
    }

    /**
     * sigin
     *
     * @param  mixed $request
     * @return void
     */
    public function signin(Request $request){

        $response = $this->authService->signin($request);
        if($response['status']==false){
            return sendApiError($response['message'],null);
        }

        return sendApiSuccess($response['message'],$response['data']);
    }
}
