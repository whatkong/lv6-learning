<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id){
//        $userModel = new User();
//        $data = $userModel->where();
        $data = User::findOrFail($id)->toArray();
        dump($data);
    }

    public function list(){

    }

    public function myArticles(){

        $articles = User::find(1)->articles()->get()->toArray();
        dump($articles);
    }

    public function bt(){
        $data = Article::find(174)->Author->name;
        dump($data);
    }
}
