<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $clients = Client::all();

    return view('clients.clients', compact('clients'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('clients.new-client');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreClientRequest $request)
  {
    Client::create([
      'name' => $request->name,
      'document' => $request->document,
      'date_of_birth' => $request->date_of_birth,
      'phone' => $request->phone
    ]);

    return redirect()
      ->route('clients.clients')
      ->with('success', 'Cliente cadastrado com sucesso!');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(StoreClientRequest $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $client = Client::findOrFail($id);

    $client->delete();

    return redirect()->route('clients.clients');
  }
}
