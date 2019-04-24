<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class UsersController extends Controller
{
    /**
     * Create a new user to get API_TOKEN
     * Method: POST
     * @param Request $request
     * @return JsonResponse
     */
    public function createUser(Request $request): JsonResponse
    {
        $id = null;
        //Check to see if user exists
        $user = User::where('email', $request->input('email'))->first();
        if (!empty($user)) {
            $id = $user->id;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        }

        if (empty($user)) {
            $user = new User($request->all());
            $user->save();
        }

        return response()->json([
            'user' => $user,
            'token' => $this->createAdminToken($user)
        ], 201);

    }


    /**
     * @param User $user
     * @return string
     */
    private function createAdminToken(User $user): string
    {
        return jwt($user);
    }
}
