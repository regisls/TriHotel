<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        //
    }

    public function login(Request $request)
    {
        $user = User::where('Email', $request->input('Email'))
            ->first();

        if (!empty($user))
        {
            if (Hash::check($request->input('Password'), $user->Password))
            {
                $apiKey = bin2hex(random_bytes(20));

                User::where('Email', $request->input('Email'))
                    ->update([
                        'ApiKey' => $apiKey
                    ]);

                return response()->json($user);
            }
        }

        return response()->json([
            'error' => true, 
            'message' => 'Usuário ou senha inválidos'
        ], 401);
    }

    public function logout(Request $request)
    {
        $user = User::where('ApiKey', $request->input('ApiKey'))
            ->first();

        if (!empty($user))
        {
            User::where('ApiKey', $request->input('ApiKey'))
                ->update([
                    'ApiKey' => null
                ]);

            return response()->json([
                'error' => false, 
                'message' => 'Logout realizado com sucesso'
            ], 200);
        }

        return response()->json([
            'error' => false, 
            'message' => 'Usuário não encontrado'
        ], 401);
    }

    public function changePassword(Request $request)
    {
        $user = User::where('ApiKey', $request->input('ApiKey'))
            ->first();

        if (!empty($user))
        {
            if (Hash::check($request->input('OldPassword'), $user->Password))
            {
                User::where('ApiKey', $request->input('ApiKey'))
                    ->update([
                        'Password' => Hash::make($request->input('NewPassword'))
                    ]);

                return response()->json([
                    'error' => false, 
                    'message' => 'Senha alterada com sucesso'
                ], 200);
            }
        }

        return response()->json([
            'error' => true, 
            'message' => 'Usuário não encontrado'
        ], 401);
    }

    public function register(Request $request)
    {
        $user = User::where('Email', $request->input('Email'))
            ->first();

        if (empty($user))
        {
            $user = User::create([
                'Name' => $request->input('Name'),
                'Email' => $request->input('Email'),
                'Password' => Hash::make($request->input('Password'))
            ]);

            $apiKey = bin2hex(random_bytes(20));

            User::where('Email', $request->input('Email'))
                ->update([
                    'ApiKey' => $apiKey
                ]);

            return response()->json($user);
        }

        return response()->json([
            'error' => true, 
            'message' => 'Usuário já cadastrado'
        ], 401);
    }
}