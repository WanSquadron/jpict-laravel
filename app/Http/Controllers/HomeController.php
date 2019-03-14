<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        echo "hai";
        //return view('home');
    }

    public function AccessDenied()
    {
        return view('errors.access-denied');
    }

    public function Avatar($id = null)
    {
        if ($id != null)
        {
            $user = User::find($id);
            $avatarType = $user->avatarType;
            $avatar = $user->avatar;
            if (strlen($avatarType) != 0)
            {
                header("Cache-Control: no-cache, must-revalidate");
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Content-Type: $avatarType");
                echo $avatar;
            }
            else
            {
                header("Cache-Control: no-cache, must-revalidate");
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Content-Type: image/jpg");
                echo file_get_contents(public_path()."/avatar/default.jpg");
            }
        }
        else
        {
            $avatarType = Auth::user()->avatarType;
            $avatar = Auth::user()->avatar;
            if (strlen($avatarType) != 0)
            {
                header("Cache-Control: no-cache, must-revalidate");
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Content-Type: $avatarType");
                echo $avatar;
            }
            else
            {
                header("Cache-Control: no-cache, must-revalidate");
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Content-Type: image/jpg");
                echo file_get_contents(public_path()."/avatar/default.jpg");
            }
        }
    }

    public function UploadAvatar(Request $r)
    {
        $FileType = strtolower($_FILES['file']['type']);
        $tmpName = $_FILES['file']['tmp_name']; 
        $isUploadedFile = is_uploaded_file($_FILES['file']['tmp_name']);
        if ($isUploadedFile == true)
        {
            $user = Auth::User();
            $user->avatarType = $FileType;
            $user->avatar = file_get_contents($tmpName);
            $user->save();
            
            $newPathfile = public_path() . "/avatar/".$newFilename;
        // dalam folder public/upload/
        // create folder upload dalam folder public

        $isMove = move_uploaded_file($tmpName, $newPathfile);
        if ($isMove) {
            echo "OK";
        } else {
            echo "Ralat semasa muat naik avatar anda. Sila cuba lagi !";
        }
        }
        else
        {
            echo "KO";
        }
    }

}
