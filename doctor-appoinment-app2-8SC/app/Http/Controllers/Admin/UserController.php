<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            session()->flash('swal', [
                'icon'  => 'success',
                'title' => 'Usuario creado correctamente',
                'text'  => 'El usuario ha sido registrado exitosamente.'
            ]);

            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            session()->flash('swal', [
                'icon'  => 'error',
                'title' => 'Error al crear usuario',
                'text'  => $e->getMessage(),
            ]);

            return back()->withInput();
        }
    }

    /**
     * Muestra los detalles de un usuario.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Actualiza los datos de un usuario.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        try {
            $data = [
                'name'  => $request->name,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);

            session()->flash('swal', [
                'icon'  => 'success',
                'title' => 'Usuario actualizado correctamente',
                'text'  => 'Los datos del usuario se actualizaron con éxito.'
            ]);

            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            session()->flash('swal', [
                'icon'  => 'error',
                'title' => 'Error al actualizar usuario',
                'text'  => $e->getMessage(),
            ]);

            return back()->withInput();
        }
    }

    /**
     * Elimina un usuario (excepto el propio).
     */
    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            session()->flash('swal', [
                'icon'  => 'error',
                'title' => 'Acción no permitida',
                'text'  => 'No puedes eliminar tu propia cuenta.',
            ]);

            return redirect()->route('admin.users.index');
        }

        try {
            $user->delete();

            session()->flash('swal', [
                'icon'  => 'success',
                'title' => 'Usuario eliminado correctamente',
                'text'  => 'El usuario ha sido eliminado con éxito.'
            ]);
        } catch (\Exception $e) {
            session()->flash('swal', [
                'icon'  => 'error',
                'title' => 'Error al eliminar usuario',
                'text'  => $e->getMessage(),
            ]);
        }

        return redirect()->route('admin.users.index');
    }
}
