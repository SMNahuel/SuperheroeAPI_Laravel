<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /** 
     *   Agregar superhero a lista de usuarios
     *   @method POST 
     *   @param  User -> Email - Name - Nickname - Password
     *   @return JSON -> User - Statuscode
     */
    public function register(Request $request)
    {
        //Validar los datos
        $user = new User();
        // Asignamos cada valor de la request a un objeto user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nickname = $request->nickname;
        $user->rol = 1; //Usuario normal por defectp
        $user->photoUrl = 'https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg';
        $user->password = Hash::make($request->password); /* Hash del password */

        $user->save();

        Auth::login($user);
        return response()->json([$user], 200);
    }
    /** 
     * 
     *  @method POST
     *  @param  User -> Email - Password
     *  @return JSON -> User - StatusCode
     *      
     */
    public function login(Request $request)
    {
        /* Validamos datos */
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            return response()->json([$user], 200);
        }

        return response()->json([$credentials], 300);
    }
    /** 
     * 
     *  @method GET
     *  @param  User -> idUser
     *  @return JSON -> User - StatusCode
     *      
     */
    public function infoUser(Request $request)
    {
        $user = User::where('id', $request->idUser)->get();
        /* Ocultamos los datos que no necesitamos */
        $user->makeHidden(['password', 'created_at', 'updated_at']);
        return response()->json($user, 200);
    }
    /** 
     *   
     *  @method PUT
     *  @param  User -> Email - Nickname - Name - Photourl
     *  @return JSON -> User - StatusCode
     *      
     */
    public function updateUser(Request $request)
    {
        $user = User::find($request->idUser);
        if ($user) {
            $user->photoUrl = $request->photoUrl;
            $user->nickname = $request->nickname;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->save();

            return response()->json($user, 200);
        }
        return response()->json("No se encontro el usuario", 300);
    }

    /** 
     *   
     *  @method get
     *  @return JSON -> (User[] - StatusCode)
     *      
     */
    public function abmAllUser()
    {
        $user = User::all();
        return response()->json($user, 200);
    }
    /** 
     *   
     *  @method DELETE
     *  @param idUser
     *  @return JSON -> (String - StatusCode)
     *      
     */
    public function abmDeleteUser(Request $request)
    {
        $user = User::find($request->idUser);
        if ($user) {
            $user->delete();
            $allUser = User::all();
            return response()->json($allUser, 200);
        }
        return response()->json("No se encontro el usuario", 300);
    }
    /** 
     *   
     *  @method PUT
     *  @param idUser rol
     *  @return JSON -> (User - StatusCode)
     *  @return JSON -> (String - StatusCode)
     */
    public function abmUpdateRol(Request $request)
    {
        $user = User::find($request->idUser);
        if ($user) {
            $user->rol = $request->rol;
            $user->save();
            
            return response()->json($user, 200);
        }
        return response()->json("No se encontro el usuario", 300);
    }
}
