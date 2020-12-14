<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Resources\User as UserResource;

class RoleController extends Controller
{
    public function create(Request $request){
        $role=new Role;
        $role->name=$request->name;
        $role->save();

        return response()->json([
            'status' => 200,
            'news'   => $role->name,
        ]);
    }
}
