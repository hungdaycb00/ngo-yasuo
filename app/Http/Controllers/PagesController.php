<?php

namespace App\Http\Controllers;

use App\Category_post;
use App\Events;
use App\list_post;
use Illuminate\Http\Request;
use App\member;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Session;

class PagesController extends Controller
{

    public function home(){
        return view('pages.home');
    }
    public function login(){
        return view('pages.login_user');
    }
    public function showProfile(){
        $data = member::where('member_id', Session::get('user_id'))->get();
        return view('pages.user_profile',['list_member' => $data]);
    }
    public function editProfile($id){
        $data = member::where('member_id', $id)->get();
        return view('pages.edit_profile_member',['list_member' => $data]);
    }
    public function updateProfile(Request $request, $id){
        $data = array();
        $data['email'] = $request->email;
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['address'] = $request->address;
        member::where('member_id', $id)->update($data);
        Session::put('message', 'Update profile success!');
        return Redirect::to('profile');
    }
    public function logOut(){
        Session::put('username', null);
        Session::put('member_id', null);
        Session::put('message', null);
        return Redirect::to('login');
    }
    public function loginCheck(Request $request){
        $username = $request->username;
        $password = $request->password;
        $result = member::where('username',$username)->where('password',$password)->first();
        if(!$result){
            Session::put('message',' Invalid login or password. Please try again. !!!');
            return Redirect::to('login');
        }
        else{
            Session::put('username', $result->lastname);
            Session::put('user_id', $result->member_id);
            return Redirect::to('pages/home');
        }
    }
    public function register(){
        return view('pages.registration_user');
    }
    public function registerSuccess(){
        return view('pages.registration_success');
    }
    public function saveRegister(Request $request){
        $data = new member();
        $name = $request->username;
        $email = $request->email;
        $data->username = $name;
        $data->email = $email;
        $data->password = $request->password;
        $data->confirm_password = $request->confirm_password;
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->address = $request->address;

        $result_name = member::where('username',$name)->first();
        $result_email = member::where('email',$email)->first();
        if($result_name) {
            Session::put('message', 'The username is already! Please try another username.');
            return Redirect::to('register');
        } elseif ($result_email){
            Session::put('message', 'The email is already! Please try another email.');
            return Redirect::to('register');
        }
        if($data){
            $data->save();
            return Redirect::to('register/success');
        }

    }

    //pages
    public function aboutUs(){
        return view('pages.about_us');
    }
    public function contact(){
        return view('pages.contact');
    }
    function __construct()
    {
        $category =  Category_post::all();
        $post = list_post::all()->sortByDesc('created_at');
        $events = Events::all()->sortByDesc('created_at')
            ->take(3);
        view()->share('cate',$category);
        view()->share('post',$post);
        view()->share('events',$events);
    }

    public function showChildren(){
        $post = list_post::all()->where('category_id', 3)->where('post_status',1)->sortByDesc('created_at');
        return view('pages.children',['children'=>$post]);
    }
    public function showEducation(){
        $post = list_post::all()->where('category_id', 1)->where('post_status',1)->sortByDesc('created_at');
        return view('pages.education',['children'=>$post]);
    }
    public function showHealth(){
        $post = list_post::all()->where('category_id', 2)->where('post_status',1)->sortByDesc('created_at');
        return view('pages.health_care',['children'=>$post]);
    }
    public function showOther(){
        $post = list_post::all()->where('category_id', 4)->where('post_status',1)->sortByDesc('created_at');
        return view('pages.other',['children'=>$post]);
    }
    public function news(){
        return view('pages.news');
    }
    public function blogDetail($id){
        $data = list_post::where('post_id', $id)->get();
        return view('pages.blog_detail',['data' => $data]);
    }
}
