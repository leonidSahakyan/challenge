<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the token list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::with('accessTokens')->get();

        $data = [];
        foreach($users as $user){
            $userData = [
                'email' => $user->email,
            ];

            foreach($user->accessTokens as $token) {
                $userData['tokens'][] = $token->id;
            }

            $data[] = $userData;
        }

        return response()->json($data);
    }
}
