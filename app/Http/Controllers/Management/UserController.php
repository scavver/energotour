<?php
namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\User;

class UserController extends Controller
{
    // Список всех пользователей
    public function index()
    {
        $users = User::paginate(15);

        return view('management.users.index', ['users' => $users]);
    }

    // Страница добавления нового пользователя
    public function create()
    {
        return view('management.users.create');
    }

    // Сохранение пользователя
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $request['password'] = bcrypt($request['password']);

        $user = User::create($request->all());

        return redirect(route('users.index'))->with('success', 'Новый пользователь добавлен.');
    }

    // Страница редактирования пользователя
    public function edit($id)
    {
        $users = User::all()->where('id', $id);

        return view('management.users.edit', ['users' => $users]);
    }

    // Обновление пользователя
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $request['password'] = bcrypt($request['password']);

        $user = User::find($id);

        $user->update($request->all());

        return redirect(route('users.index'))->with('success', 'Пользователь обновлен.');
    }

    // Удаление пользователя
    public function destroy($id)
    {
        $user = User::find($id);

        if($user->id !== 1)
        {
            $user->delete();
            return redirect(route('users.index'))->with('success', 'Пользователь удален.');
        }
        else
        {
            return redirect(route('users.index'))->with('warning', 'Невозможно удалить всех пользователей.');
        }
    }
}
