<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function create($coin)
    {
        return view('alerts.create', [
            'coin' => $coin
        ]);
    }

    public function index()
    {
        $alerts = Alert::all();

        return view('alerts.index', [
            'alerts' => $alerts
        ]);
    }

    public function store(Request $request)
    {
        $alert = new Alert();
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
        dd($alert);
    }

}
