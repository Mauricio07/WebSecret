<?php

namespace inbloom\Http\Controllers\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use inbloom\Http\Requests;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\User\User;
use inbloom\Model\User\User_Password;

class LoginController extends Controller
{
    //ingreso de usuario
    public function getLoginSucess(Request $request){

      //obtiene la información de la base
      $user_=$request->get('nameUser');
      $pass_=$request->get('passwordUser');

      $usuarioIng=DB::selectOne('exec asp_loginUsers ?,?',array($user_,$pass_));
      if (isset($usuarioIng)){
        $request->session()->set('UsuarioIngresa',$user_);
        return redirect('home');
      }else{
        return redirect('/')->with('messageLogin','User o password incorrect');
      }
    }

    //inicio de Session
    public function getHome(){
      return view('logins.main');
    }

    //ingreso modulo de productos
    public function getProducts(){
      return view('products.main');
    }
}
