<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::findOrFail($id);
      $challenges = $user->challenges()->orderBy('id', 'desc')->paginate(3);
  		return view('user.userShow')->with(compact('user','challenges'));//solo mando al user despues puedo llamar a las cosas que tenga por la relacion en la vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);;
      return view('user.userEdit')->with(compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
            $user = User::find($id);
            if ($request->avatar) {
              // Necesito el archivo en una variable esta vez
                    $file = $request->avatar;

                    // Nombre final de la imagen
                    $finalName = strtolower(str_replace(" ", "_", $request->firstName));

                    // Armo un nombre único para este archivo
                    $name = $finalName . uniqid('_image_') . "." . $file->extension();
                    // Guardo el archivo en la carpeta
                    $file->storePubliclyAs("public/avatars", $name);
                    $user->avatar = $name;
            }

            $user->firstName = $request->firstName;
            $user->lastName = $request->lastName;
            $user->userName = $request->userName;
            $user->email = $request->email;
            $user->country = $request->country;
            $user->theme = $request->theme;
            $user->province = $request->province;
            // dd($user);
            $user->save();
            return redirect()->route("user.show",$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
