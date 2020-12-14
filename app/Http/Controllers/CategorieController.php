<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategorieController extends Controller
{
    public function create(Request $request)
    { 
    	$categorie=new Categorie;
    	$categorie->name=$request->name;
    	$categorie->save();

    	return response()->json([
    		'status' => 200,
    		'categorie' =>$categorie->name
    	]);

    }

    public function delete($id)
    { 
        $categorie=Categorie::find($id);
        $categorie->delete();


        return response()->json([
            'status' => 200,
            'message' =>'Data Berhasil Dihapus'
        ]);
    }
}
