<?php
namespace App\Http\Controllers;
use \App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
       /** $user = User::findorFail($user); /** Aca llamamos a la clase User, para guardarlo en una variable $user */
       $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
       return view ('profiles.index', compact('user', 'follows'));
        /** return view('profiles.index',['user' => $user,]); */
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view ('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {   $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',
        ]);

        if (request('image')){
            $imagePath= request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000); //METODO QUE OBLIGA A LA IMAGEN A TENER UNA MEDIDA ESPECIFICA
            $image -> save();

            $imageArray= ['image'=> $imagePath];
        }


        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []

        ));/** array_merge toma cualquier array y las junta */

        return redirect("/profile/{$user->id}");
    }
}
