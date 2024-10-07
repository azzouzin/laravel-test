<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artical;
use App\Models\User;
use Illuminate\Http\Request;

class ArticelController extends Controller
{
    //

    // function createArtical(Request $request)
    // {
    //     $artical = Artical::create($request->all());
    //     return $artical;
    // }

    function getArticlas()
    {
        return Artical::all();
    }

    function getArticle($id)
    {
        return response()->json(Artical::find($id));
    }

    function deleteArticlas($id)
    {
        return Artical::destroy($id);
    }

    function updateArticlas(Request $request, $id)
    {
        $artical = Artical::find($id);
        $artical->update($request->all());
        return $request->all();
    }
    function getUserArticals($id)
    {
        // Get the user by ID
        $user = User::find($id);

        // Get all posts associated with the user
        $posts = $user->posts;

        return $posts;
    }


    public function createArtical(Request $request, $userId)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Find the user by ID
        $user = User::findOrFail($userId);

        // Create a new post for the user
        $post = $user->posts()->create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        // Return the newly created post with a 201 status
        return response()->json($post, 201);
    }
}
