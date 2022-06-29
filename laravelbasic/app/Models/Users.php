<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers() {
        return $users = DB::select('select * from users order by creat_at desc');
    }

    public function searchUser($search){
        return DB::select('SELECT * FROM '.$this->table.' WHERE fullname LIKE "%'.$search.'%"');
    }

    public function addUser($data){
        DB::insert('insert into users (fullname,email,creat_at) values (?,?,?)',$data);
    }
    public function getDetail($id) {
        return DB::select('select * from '.$this->table.' where id = ?',[$id]);
    }
    public function updateUser($data,$id) {

        $data[] = $id;

        return DB::update('UPDATE '.$this->table.' SET fullname=?, email=?, update_at=? WHERE id = ?',$data);
    }

    public function deleteUser($id) {
        return DB::delete('DELETE FROM '.$this->table.' WHERE id=?',[$id]);
    }

    //thực thi câu lệnh sql trả về trạng thái(true/false)
    public function statementUser($sql) {
        return DB::statement($sql);
    }
}
