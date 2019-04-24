<?php

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Firebase\JWT\JWT;


/**
 * Create a new token.
 * @param Model $model
 * @return string
 * Information on JWT - https://tools.ietf.org/html/rfc7519#section-4.1.5
 */
function jwt(Model $model)
{

    $payload = [
        'iss' => "shopify-simple-api",
        'sub' => $model->email,
        'iat' => time(),
        'exp' => strtotime(Carbon::now()->addDays(30)) // Expiration time Carbon::now()->addDays(15)
    ];

    return JWT::encode($payload, env('JWT_SECRET'));
}


