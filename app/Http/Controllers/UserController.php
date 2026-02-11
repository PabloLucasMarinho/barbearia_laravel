<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    Gate::authorize('viewAny', User::class);

    $search = $request->query('search');

    $users = User::query()->when($search, function ($query, $search) {
      $query->where('name', 'like', "%$search%");
    })
      ->orderBy('name')
      ->paginate(10)
      ->withQueryString();

    return view('users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    Gate::authorize('create', User::class);

    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request)
  {
    Gate::authorize('create', User::class);

    try {
      DB::transaction(function () use ($request) {
        $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
        ]);

        $user->details()->create([
          'user_uuid' => $user->uuid,
          'document' => $request->document,
          'date_of_birth' => $request->date_of_birth,
          'phone' => $request->phone,
          'address' => $request->address,
          'address_complement' => $request->address_complement,
          'neighborhood' => $request->neighborhood,
          'city' => $request->city,
          'salary' => $request->salary,
          'admission_date' => $request->admission_date,
        ]);
      });

      return redirect()
        ->route('users.index')
        ->with('success', 'Funcionário cadastrado com sucesso!.');

    } catch (Throwable $e) {
      Log::error('Erro ao criar usuário', [
        'exception' => $e,
      ]);

      return back()
        ->withInput()
        ->with('error', 'Erro ao cadastrar funcionário. Tente novamente.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, User $user)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    //
  }
}
