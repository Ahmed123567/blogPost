<?php

namespace App\Http\Controllers\userInterface;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use App\Trait\helperTrait;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use helperTrait;

    public function index(){

       
        return view('userInterface.profile.index');
    }


       //////////////////////// image upload //////////////////////////

       public function image(Request $req){

        $data = $req->all();
        $imageName = $this->imageUpload($req);
  

        User::find($data['user_id'])->update([
            'image' => $imageName,
        ]);

        return redirect()->back();
    }

}
