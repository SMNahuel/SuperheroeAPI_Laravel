<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Superheroe;
use Illuminate\Http\Request;

class SuperheroeController extends Controller
{
    /** 
     *   Retorna todos los superheroe
     *   @method GET 
     *   @return JSON -> Superheroe
     */
    public function index()
    {
        return Superheroe::all();
    }
    /** 
     *  Traemos los superheroes del usuario 
     *  @method GET
     *  @param Object -> idUser
     *  @return (Superhero[], StatusCode)
     * 
     */
    public function getMySuperheroe(Request $request)
    {
        $user = User::find($request->idUser);
        if ($user) {
            $superhero = $user->superheroe()->get();
            return response()->json($superhero, 200);
        }
        return response()->json("No se encontro el usuario", 300);
    }

    /** 
     * 
     *  @method POST
     *  @param Object -> idUser - idSuperhero
     *  @return (Superhero[], StatusCode)
     * 
     */
    public function addSuperheroe(Request $request)
    {
        $user = User::find($request->idUser);
        if ($user) {
            $user->superheroe()->attach($request->idSuperhero);
            $userSuperhero = $user->superheroe()->get();
            return response()->json($userSuperhero, 200);
        }
        return response()->json("No se encontro el usuario", 300);
    }

    /** 
     * 
     *  @method PUT
     *  @param  Object -> idUser - idSuperhero
     *  @return (Superhero[], StatusCode)
     * 
     */
    public function deleteSuperheroeByUser(Request $request)
    {
        $user = User::find($request->idUser);
        if($user){

            $user->superheroe()->detach($request->idSuperhero);
            
            $userSuperhero = $user->superheroe()->get();
            
            return response()->json($userSuperhero, 200);
        }
        return response()->json("No se encontro el usuario", 300);
    }

    /** 
     * 
     *  @method DELETE
     *  @param  Object -> idSuperheroe
     *  @return (String, StatusCode)
     * 
     */
    public function abmDeleteSuperheroe(Request $request)
    {
        $superhero = Superheroe::find($request->idSuperhero);

        if ($superhero) {
            $superhero->delete();
            return response()->json("Superheroe eliminado", 200);
        }
        return response()->json("No se encontro el superheroe", 300);
    }
    /** 
     * 
     *  @method PUT
     *  @param  Object -> idSuperheroe, Superheroe
     *  @return (String, StatusCode)
     * 
     */
    public function abmUpdateSuperheroe(Request $request)
    {
        $superhero = Superheroe::find($request->idSuperhero);
        if ($superhero) {
            $superhero->name = $request->name;
            $superhero->slug = $request->slug;
            $superhero->intelligence = $request->intelligence;
            $superhero->strength = $request->strength;
            $superhero->speed = $request->speed;
            $superhero->durability = $request->durability;
            $superhero->power = $request->power;
            $superhero->combat = $request->combat;

            $superhero->save();

            return response()->json($superhero, 200);
        }
        return response()->json("No se encontro el superheroe", 300);
    }
}
