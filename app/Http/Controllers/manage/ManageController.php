<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Floor;
use App\Models\User;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {

        
        $latestUsers = User::latest()->limit(5)->get();

    

        return view('manage.index', [

            'numberOfUsers' => User::count(),
            'comment_count' => Comment::count(),
            'latestUsers' => $latestUsers,
            
        ]);
    }
}
