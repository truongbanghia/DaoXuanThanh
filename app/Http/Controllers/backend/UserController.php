<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\users;
use App\Http\Requests\{AddUserRequest,EditUserRequest};

class UserController extends Controller
{
    function ListUser()
    {
        $data['users']=users::paginate(2);
        return view("backend.user.listuser",$data);   
    }
    function AddUser()
    {
        return view("backend.user.adduser");
    }
    function PostAddUser(AddUserRequest $r)
    {
        $user=new users;
        $user->email=$r->email;
        $user->password=bcrypt($r->password);
        $user->full=$r->full;
        $user->address=$r->address;
        $user->phone=$r->phone;
        $user->level=$r->level;
        $user->save();
        return redirect('admin/user')->with('thongbao','Đã thêm thành công');
    }
    function EditUser($id)
    {
        $data['user']=users::find($id);
        return view('backend.user.edituser',$data);
    }
    function PostEditUser(EditUserRequest $r,$id)
    {
        $user=users::find($id);
        $user->email=$r->email;
        if($r->password!="")
        {
            $user->password=bcrypt($r->password);
        }
        $user->full=$r->full;
        $user->address=$r->address;
        $user->phone=$r->phone;
        $user->level=$r->level;
        $user->save();  
    return redirect('admin/user')->with('thongbao','Đã sửa thành công');
    }
    function DelUser($id)
    {
        users::destroy($id);
        return redirect()->back()->with('thongbao',"Đã xóa thành công!");
    }
}
