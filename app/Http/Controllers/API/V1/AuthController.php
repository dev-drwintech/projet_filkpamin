<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(): \Illuminate\Http\JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'These credentials do not match our records.'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->only('name', 'email', 'password');
        $validator = Validator::make($input, [
            'name' => 'required|regex:/(^([a-zA-z ]+)(\d+)?$)/u|min:5',
            'email' => 'required|email|min:5|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $grav_url = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($request->email)));

        try {
            $user = User::create([
                'name' => trim($request->input('name')),
                'email' => strtolower(trim($request->input('email'))),
                'password' => Hash::make($request->input('password')),
                'avatar' => $grav_url,
            ]);

            return response()->json([
                'data' => $user
            ], 201);
        } catch (\PDOException $e) {
            return response()->json([
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function me(): \Illuminate\Http\JsonResponse
    {
        return response()->json(auth('api')->user(), 200);
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function refresh(): \Illuminate\Http\JsonResponse
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token): \Illuminate\Http\JsonResponse
    {
        $user = auth('api')->user();
        $user->update([
            'last_login_at' => now(),
            'last_login_ip' => request()->ip()
        ]);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'data' => auth('api')->user()
        ], 200);
    }

    public function forgotPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->only('email');
        $validator = Validator::make($input, [
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $response = Password::sendResetLink($input);

        $message = $response == Password::RESET_LINK_SENT ? 'Mail envoyé avec succès' : GLOBAL_SOMETHING_WANTS_TO_WRONG;

        return response()->json($message, 200);
    }

    public function passwordReset(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->only('email', 'token', 'password', 'password_confirmation');
        $validator = Validator::make($input, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $response = Password::reset($input, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });
        $message = $response == Password::PASSWORD_RESET ? 'Mot de passe réintialisé avec succès' : GLOBAL_SOMETHING_WANTS_TO_WRONG;
        return response()->json($message, 200);
    }

    public function fromUser($user)
    {
        return response()->json([
            'access_token' => JWTAuth::fromUser($user),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'data' => $user
        ], 200);
    }

    public function google(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->only('id_token');

        $validator = Validator::make($input, [
            'id_token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $id_token = $request->id_token;

        try {
            $response = Http::get('https://oauth2.googleapis.com/tokeninfo?id_token=' . $id_token);

            $data = json_decode($response->body());

            $user = User::where('email', '=', $data->email)->first();

            if (!$user) {
                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->provider_id = $data->sub;
                $user->avatar = $data->picture;
                $user->save();
            }

            if ($user) {
                $user->provider_id = $data->sub;
                $user->avatar = $data->picture;
                $user->save();
            }
            return $this->fromUser($user);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Not found or id_token expired!', 'errors' => $exception->getMessage()], 400);
        }
    }

    public function github(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->only('id_token');

        $validator = Validator::make($input, [
            'id_token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $id_token = $request->id_token;

        try {
            $response = Http::withHeaders([
                'Authorization' => 'token ' . $id_token
            ])->get('https://api.github.com/user');

            $responseEmails = Http::withHeaders([
                'Authorization' => 'token ' . $id_token
            ])->get('https://api.github.com/user/emails');

            $data = json_decode($response->body());
            $emails = json_decode($responseEmails->body());

            //            return response()->json([$data, $emails], 200);

            foreach ($emails as $email) {
                if ($email->primary == true) {
                    $em = $email->email;
                }
            }
            $user = User::where('email', '=', $em)->first();

            if (!$user) {
                $user = new User();
                $user->name = isset($data->name) ? $data->name : $data->login;
                $user->email = $em;
                $user->provider_id = (string)$data->id;
                $user->avatar = $data->avatar_url;
                $user->save();
            }

            if ($user) {
                $user->provider_id = (string)$data->id;
                $user->avatar = $data->avatar_url;
                $user->save();
            }
            return $this->fromUser($user);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Not found or id_token expired!', 'errors' => $exception->getMessage()], 400);
        }
    }

    public function facebook(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->only('id', 'id_token');

        $validator = Validator::make($input, [
            'id' => 'required',
            'id_token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $id = $request->id;
        $id_token = $request->id_token;

        try {
            $response = Http::get('https://graph.facebook.com/' . $id . '?fields=id,name,email,picture.type(large)&access_token=' . $id_token);

            $data = json_decode($response->body());

            $user = User::where('email', '=', $data->email)->first();

            if (!$user) {
                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->provider_id = $data->id;
                $user->avatar = $data->picture->data->url;
                $user->save();
            }

            if ($user) {
                $user->provider_id = $data->id;
                $user->avatar = $data->picture->data->url;
                $user->save();
            }
            return $this->fromUser($user);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Not found or id_token expired!', 'errors' => $exception->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->only('name', 'provider_id', 'avatar', 'old_password', 'password', 'password_confirmation', 'fcm_token'), [
            'name' => 'sometimes|regex:/(^([a-zA-z ]+)(\d+)?$)/u|min:5',
            'provider_id' => 'sometimes|min:8',
            'avatar' => 'sometimes|max:255',
            'old_password' => 'sometimes|min:8',
            'password' => 'sometimes|min:8|confirmed',
            'fcm_token' => 'sometimes'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'La mise à jour de vos information a échoué.',
                'error' => $validator->errors()
            ], 400);
        }

        if ($request->hasAny(['old_password', 'password'])) {
            $credentials = [
                'email' => auth()->user()->email,
                'password' => $request['old_password']
            ];
            if (auth()->attempt($credentials)) {
                $request->merge(['password' => bcrypt($request['password'])]);
            } else {
                return response()->json([
                    'message' => 'L\'ancien mot de passe est incorrect.'
                ], 201);
            }
        }

        try {
            if (auth()->user()->id == $id) {
                $user->update($request->only('name', 'password', 'provider_id', 'avatar', 'fcm_token'));
                return response()->json([
                    'message' => 'Vos informations ont été mis à jour avec succès.',
                    'data' => $user
                ], 201);
            }

            return response()->json([
                'message' => 'Vous n\'avez pas la permission de mettre à jour !'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour de l\'utilisateur.',
                'data' => $e->getMessage()
            ], 500);
        }
    }
}
