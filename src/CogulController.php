<?php

namespace Milhouse1337\Cogul;

use App\Http\Controllers\Controller;

class CogulController extends Controller
{

    public function validateToken($token) {

        $valid_token = config('cogul.token');

        if ($token !== $valid_token) {
            return 'Invalid token.';
        }

        $cookie = cookie(config('cogul.cookie'), $valid_token, config('cogul.expiration'));

        return redirect(config('cogul.redirect'))->cookie($cookie);
    }

}
