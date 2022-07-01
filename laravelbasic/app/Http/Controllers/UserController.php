<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();

    }
    public function index(Request $request) {
        $title = 'Danh sách người dùng';

        // dd($this->users->learnQueryBuilder());


        if(!empty($search = $request->search)){
            $userList = $this->users->searchUser($search);

        }else{
            $userList = $this->users -> getAllUsers();

        }
        return view('clients.user.lists', compact('title','userList'));
    }


    public function add() {
        $title = 'Thêm người dùng';

        return view('clients.user.add', compact('title'));

    }

    public function postAdd(Request $request) {
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users',

        ],[
            'fullname.required' => "Họ và tên bắt buộc phải nhập",
            'fullname.min' => "Họ và tên phải từ :min ký tự trở lên",
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống'

        ]);
        $dataInsert = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s'),

        ];
        $this->users->addUser($dataInsert);

        return redirect()->route('users.index')->with('msg','Thêm người dùng thành công');
    }
    public function getEdit(Request $request,$id=0) {
        $title = 'Cập nhật người dùng';

        if (!empty($id)){
            $userDetail = $this->users->getDetail($id);
            // $userDetail = null;
            if (!empty($userDetail[0])){
                $request->session()->put('id',$id);
                $userDetail =$userDetail[0];
            } else{
                return redirect()->route('users.index')->with('msg','Người dùng không tồn tại');
            }
        }else {
            return redirect()->route('users.index')->with('msg','Liên kết không tồn tại');
        }
        return view('clients.user.edit',compact('title','userDetail'));
    }
    public function postEdit(Request $request) {
        $id=session('id');
        if (empty($id)){
            return back()->with('msg','Liên kết không tồn tại');
        }
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$id,

        ],[
            'fullname.required' => "Họ và tên bắt buộc phải nhập",
            'fullname.min' => "Họ và tên phải từ :min ký tự trở lên",
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống'

        ]);

        $dataUpdate = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s'),
        ];

        $this->users->updateUser($dataUpdate,$id);

        // return redirect()->route('users.index')->with('msg','Cập nhật người dùng thành công');
        return back() ->with('msg','Cập nhật người dùng thành công');
    }

    public function delete($id=0) {
        if (!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])){
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus){
                    $msg = ' Xóa người dùng thành công';
                } else{
                    $msg = 'Bạn không thể xóa người dùng lúc này. Vui lòng kiểm tra lại.';
                }
            } else {
                $msg= 'Người dùng không tồn tại';
            }
        }else {
            $msg = 'Liên kết không tồn tại';
        }
        return redirect()->route('users.index')->with('msg',$msg);
    }


}
