<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    /**
     * @var Model|Builder|object|null
     */
    protected $client;

    public function __construct()
    {
        $this->client = DB::table('oauth_clients')->where('password_client', 1)->first();
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|max:100',
        ]);
        $email = $request->get('email');
        $password = $request->get('password');
        $request->request->add([
            'username' => $email,
            'password' => $password,
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => '*'
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        $response = Route::dispatch($proxy);
        return response()->json(json_decode($response->getContent(), true));
    }
}
