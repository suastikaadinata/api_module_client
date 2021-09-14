<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cookie;

class InventoryController extends Controller
{
    private $base_url = "http://127.0.0.1:8000/api/";

    public function index()
    {
        $client = new Client();

        try {
            $url = $this->base_url . "inventory";
            $apiRequest = $client->get($url, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . Cookie::get('token')
                ],
            ]);

            if ($apiRequest->getStatusCode() == 200) {
                $response = json_decode($apiRequest->getBody()->getContents(), true);
                return view('home', ['inventory' => $response['data']]);
            }
        } catch (ClientException $e) {
            $errorCode = $e->getResponse()->getStatusCode();
            $errorResponse = json_decode($e->getResponse()->getBody()->getContents(), true);
            var_dump([
                'code'      => $errorCode,
                'message'   => $errorResponse
            ]);
        }
    }

    public function add()
    {
        return view('add');
    }

    public function addInventory(Request $request)
    {
        $body = array(
            array(
                'name'      => 'nama',
                'contents'   => $request->nama
            ),
            array(
                'name'      => 'tgl_pembelian',
                'contents'   => date("Y-m-d", strtotime($request->tanggal))
            ),
            array(
                'name'      => 'no_bukti',
                'contents'   => $request->no_bukti
            ),
            array(
                'name'      => 'harga',
                'contents'   => $request->harga
            ),
            array(
                'name'      => 'foto',
                'contents'   => fopen($request->foto, 'r')
            ),
        );

        $client = new Client();

        try {
            $url = $this->base_url . "inventory";
            $apiRequest = $client->post($url, [
                'multipart' => $body,
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . Cookie::get('token')
                ]
            ]);

            if ($apiRequest->getStatusCode() == 200) {
                return redirect('/home');
            }
        } catch (RequestException $e) {
            $errorResponse = $e->getResponse()->getBody()->getContents();
            var_dump($errorResponse);
        }
    }
}
