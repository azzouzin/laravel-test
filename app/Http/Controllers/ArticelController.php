<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artical;
use Illuminate\Http\Request;

class ArticelController extends Controller
{
    //

    function createArtical(Request $request)
    {
        $artical = Artical::create($request->all());
        return request()->all();
    }

    function getArticlas()
    {
        return Artical::all();
    }

    function getArticle($id)
    {
        return Artical::find($id);
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
}
