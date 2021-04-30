<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlertController extends Controller
{
    public function create($coin)
    {
        $url = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&symbols=" . $coin;

        $response = Http::get($url);

        $coin = $response->json();

        return view('alerts.create', [
            'coin' => $coin[0]
        ]);
    }

    public function index()
    {
        return view('alerts.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'symbol' => 'string|required',
            'name' => 'string|required',
            'price' => 'numeric|required',
            'movement' => 'size:1|in:+,-|required'
        ]);

        $alert = new Alert();
        $alert->user_id = auth()->id();
        $alert->name = $request->get('name');
        $alert->symbol = strtoupper($request->get('symbol'));
        $alert->price = $request->get('price');
        $alert->movement = $request->get('movement');
        $alert->save();

        return redirect()->route('dashboard');
    }

    public function delete(Alert $alert)
    {
        $alert->delete();

        return redirect()->back();
    }

    public function edit(Alert $alert)
    {
        return view('alerts.edit', [
            'alert' => $alert
        ]);
    }

    public function update(Alert $alert, Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'price' => 'numeric|required',
            'movement' => 'size:1|in:+,-|required'
        ]);

        $alert->name = $request->get('name');
        $alert->price = $request->get('price');
        $alert->movement = $request->get('movement');
        $alert->save();

        return redirect()->route('alerts.index');
    }

}
