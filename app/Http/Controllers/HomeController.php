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
            $avatar = $user->avatar;

            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

            if ($avatar == '' || $avatar == 'default.jpg')
            {
                header("Content-Type: image/jpg");
                echo file_get_contents(public_path()."/avatar/default.jpg");
            }
            else
            {
                $extensionFile = pathinfo($avatar, PATHINFO_EXTENSION);
                header("Content-Type: image/" . $extensionFile);
                echo file_get_contents(public_path()."/avatar/".$avatar);
            }
        }
        else
        {
            $avatar = Auth::User()->avatar;

            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

            if ($avatar == '' || $avatar == 'default.jpg')
            {
                header("Content-Type: image/jpg");
                echo file_get_contents(public_path()."/avatar/default.jpg");
            }
            else
            {
                $extensionFile = pathinfo($avatar, PATHINFO_EXTENSION);
                header("Content-Type: image/" . $extensionFile);
                echo file_get_contents(public_path()."/avatar/".$avatar);
            }
        }
    }

    public function UploadAvatar(Request $r)
    {
        $FileType = strtolower($_FILES['file']['type']);
        $tmpName = $_FILES['file']['tmp_name']; 
        $isUploadedFile = is_uploaded_file($_FILES['file']['tmp_name']);
        $extensionFile = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        $name = Auth::User()->kodsekolah;
        $newFilename = $name.'.'.$extensionFile;
        if ($isUploadedFile == true)
        {
            $user = Auth::User();
            $user->avatar = $newFilename;
            $user->save();

            $newPathfile = public_path() . "/avatar/".$newFilename;
            $isMove = move_uploaded_file($tmpName, $newPathfile);
            if ($isMove)
            {
                 echo "OK";
            }
            else
            {
                echo "Ralat! Sila cuba lagi.";
            }
        }
        else
        {   
            echo "KO";
        }
    }

    public function DeleteAvatar()
    {
        $name = Auth::User()->avatar;
        $user = Auth::User();
        $user->avatar = '';
        $user->save();

        

        if (file_exists(public_path().'/avatar/'.$name)) {
            unlink(public_path().'/avatar/'.$name);
        }
    }
       

}
