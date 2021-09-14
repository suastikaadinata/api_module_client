<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    private $base_url = "http://127.0.0.1:8000/api/";

    public function index()
    {
        return view('login', [
            'status'    => 0,
            'message'   => ""
        ]);
    }

    public function login(Request $request)
    {
        $body = array(
            'email'     => $request->email,
            'password'  => $request->password,
        );

        $client = new Client();

        try {
            $url = $this->base_url . "login";
            $apiRequest = $client->post($url, ['form_params' => $body], [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            if ($apiRequest->getStatusCode() == 200) {
                $response = json_decode($apiRequest->getBody()->getContents(), true);
                Cookie::queue("token", $response['token']);
                return redirect('/home');
            }
        } catch (ClientException $e) {
            $errorCode = $e->getResponse()->getStatusCode();
            $errorResponse = json_decode($e->getResponse()->getBody()->getContents(), true);

            if ($errorCode == 400) {
                return view('login', [
                    'status'    => 1,
                    'message'   => $errorResponse['message']
                ]);
            }
        }
    }
}
