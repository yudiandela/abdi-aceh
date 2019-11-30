<?php

namespace App\Http\Controllers\Api;

use App\Mail\SendPasswordAfterRegister;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class RegisterController extends Controller
{
    /**
     * Masukkan data dari inputan User
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Validasi inputan User
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        // Passing variable
        $name     = $request->name;
        $email    = $request->email;
        $password = $request->password;

        // cek apakah ada data password
        if (!$password) {
            // jika tidak ada
            // buatkan password random
            $password = Str::random(10);
        } else {
            // Validasi inputan User
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }

        // kirim email beserta password ke user
        Mail::to($request->email)->send(new SendPasswordAfterRegister($name, $email, $password));

        // masukkan data user ke dalam database
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($password),
        ]);

        // Kembalikan data user berupa json
        return new UserResource($user);
    }
}
