<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signout(){
        return view('auth.signout');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',  // Исправлено: App\Models\User -> users
            'password'=>'required|min:6'
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0
        ]);
        
        // Создаём токен (он сохранится в БД автоматически)
        $token = $user->createToken('myToken')->plainTextToken;
        
        // Опционально: сохранить токен в сессии
        session(['api_token' => $token]);
        
        // Автоматически входим после регистрации
        Auth::login($user);
        
        return redirect()->to('/');
    }

    public function signin(){
        return view('auth.signin');
    }

    public function auth(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',  // Добавлено email валидация
            'password'=>'required|min:6'
        ]);
    
        if (Auth::attempt($credentials, $request->remember)){
            $request->session()->regenerate();
            
            // Создаём новый токен при входе
            $token = $request->user()->createToken('myToken')->plainTextToken;
            
            // Сохраняем токен в сессии если нужно
            session(['api_token' => $token]);
            
            return redirect()->intended('/');
            }
        
        return back()->withErrors([
            'email'=>'Предоставленные учетные данные не соответствуют нашим записям'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
    // Удаляем токены
    if ($request->user() && method_exists($request->user(), 'tokens')) {
        $request->user()->tokens()->delete();
    }
    
    // Очищаем всю сессию принудительно
    $request->session()->flush();
    $request->session()->regenerateToken();
    
    // Удаляем аутентификацию из сессии
    $request->session()->remove('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
    
    return redirect('/');
    }
}