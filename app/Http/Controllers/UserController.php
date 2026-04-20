<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Просмотр списка пользователей (всем зарегистрированным)
    public function index()
    {
        if (auth()->check()) {
            $users = User::all();
            return view('users.index', compact('users'));
        } else {
            abort(403); // доступ запрещен
        }
    }

    // Просмотр отдельного пользователя (всем зарегистрированным)
    public function show($id)
    {
        if (auth()->check()) {
            $user = User::findOrFail($id);
            return view('users.show', compact('user'));
        } else {
            abort(403);
        }
    }

    // Форма для создания нового пользователя (всем зарегистрированным)
    public function create()
    {
        if (auth()->check()) {
            return view('users.create');
        } else {
            abort(403);
        }
    }

    // Обработка создания нового пользователя
    public function store(Request $request)
    {
        if (auth()->check()) {
            // Валидация входных данных
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            // Создание пользователя
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'role' => 'user', // по умолчанию роль пользователь
            ]);

            return redirect()->route('users.index')->with('success', 'Пользователь создан.');
        } else {
            abort(403);
        }
    }

    // Форма для редактирования пользователя (только для админов)
    public function edit($id)
    {
        $currentUser = auth()->user();
        if ($currentUser && $currentUser->role === 'admin') {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user'));
        } else {
            abort(403);
        }
    }

    // Обновление пользователя (только для админов)
    public function update(Request $request, $id)
    {
        $currentUser = auth()->user();
        if ($currentUser && $currentUser->role === 'admin') {
            $user = User::findOrFail($id);

            // Валидация входных данных
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'required|string|in:user,admin',
            ]);

            // Обновление данных пользователя
            $user->update($validated);

            return redirect()->route('users.show', $user->id)->with('success', 'Пользователь обновлен.');
        } else {
            abort(403);
        }
    }

    // Удаление пользователя (только для админов)
    public function destroy($id)
    {
        $currentUser = auth()->user();
        if ($currentUser && $currentUser->role === 'admin') {
            User::destroy($id);
            return redirect()->route('users.index')->with('success', 'Пользователь удален.');
        } else {
            abort(403);
        }
    }
}
