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
        // return $users = DB::select('select * from users order by creat_at desc');
        // return DB::table($this->table)
        // ->select('*')
        // ->orderBy('creat_at','desc')
        // ->get();
        return Users::all();
    }

    public function searchUser($search){
        // return DB::select('SELECT * FROM '.$this->table.' WHERE fullname LIKE "%'.$search.'%"');
        return DB::table($this->table)
        ->select('*')
        ->where('fullname','like','%'.$search.'%')
        ->get();
    }

    public function addUser($data){
        // DB::insert('insert into users (fullname,email,creat_at) values (?,?,?)',$data);
        return DB::table($this->table)
        ->insert([
            'fullname'=> $data[0],
            'email'=>$data[1],
            'creat_at'=>$data[2]
        ]);
    }
    public function getDetail($id) {
        //return DB::select('select * from '.$this->table.' where id = ?',[$id]);
        return DB::table($this->table)
        ->where('id',$id)
        ->get();
        // return Users::find($id);

    }
    public function updateUser($data,$id) {

        $data[] = $id;

        // return DB::update('UPDATE '.$this->table.' SET fullname=?, email=?, update_at=? WHERE id = ?',$data);
        return DB::table($this->table)
        ->where('id',$id)
        ->update([
            'fullname'=>$data[0],
            'email'=>$data[1],
            'update_at'=>$data[2]
        ]);
    }

    public function deleteUser($id) {
        // return DB::delete('DELETE FROM '.$this->table.' WHERE id=?',[$id]);
        return DB::table($this->table)
        ->where('id',$id)
        ->delete();
    }



    //thực thi câu lệnh sql trả về trạng thái(true/false)
    public function statementUser($sql) {
        return DB::statement($sql);
    }

    //query builder
    public function learnQueryBuilder() {
        //lấy tất cả bản ghi của table
        $lists = DB::table($this->table)->get();

        //lấy 1 bản ghi đầu tiên của table (lấy thông tin chi tiết)
        $detail = DB::table($this->table)->first();

        //select cột trong bảng (đặt select trước get,first... và table sau DB)
        $lists = DB::table($this->table)->select('*')->get();

        //truy vấn theo điều kiện
        $lists = DB::table($this->table)
        ->select('*')
        ->where('id','=',3)
        // ->orWhere('id',5)
        ->where(function($query){
            $query->where('id','<',3);
            $query->orWhere('id'.'>',3);
        })
        // ->where('fullname','like','%an%')
        // ->whereBetween('id',[2,5]) // khoảng từ 2 đến 5
        // ->whereNotBetween('id',[2,5]) // nằm ngoài khoảng
        // ->whereIn('id',[2,5]) // ra 2 kết quả 2 và 5
        // ->whereIn('id',[2,5]) // trừ 2 và 5 in ra tất cả
        // ->whereNull('id') // trả ra bản ghi có giá trị null
        // ->whereNotNull('id') //ngược lại
        //truy vấn date
        //->whereDate('update_at','2022-06-29') //trả ra date
        // ->whereMonth('update_at','06') //trả ra tháng
        // ->whereYear('update_at','2022') //trả ra năm
        // ->whereDay('update_at','29') // trả ra ngày
        // ->whereColumn('creat_at','=','update-at') //trả ra 2 cột bằng nhau
        // ->whereColumn([
        //     ['creat_at','>','update-at'],
        //     ['creat_at','=','update-at']
        // ]) // kết hợp điều kiện and
        ->get();

        //nối bảng(join)

        //inner join
        $users = DB::table($this->table)
        ->select('users.*','table2.name')
        ->join('table2','users.id','=','table2.user_id' )
        ->get();

        //left join hiển thị tất cả các bảng user
        $users = DB::table($this->table)
        ->select('users.*','table2.name')
        ->leftJoin('table2','users.id','=','table2.user_id' )
        ->get();

        //right join hiển thị tất cả các bảng table2
        $users = DB::table($this->table)
        ->select('users.*','table2.name')
        ->rightJoin('table2','users.id','=','table2.user_id' )
        ->get();

        //sắp xếp orderBy
        //sắp xếp 1 cột
        $users = DB::table($this->table)
        ->select('*')
        ->orderBy('fullname','desc')->get();
        //sắp xếp nhiều cột
        $users = DB::table($this->table)
        ->select('*')
        ->orderBy('fullname','desc')
        ->orderBy('email','asc')
        ->get();
        //sắp xếp ngẫu nhiên
        $randomUsers = DB::table($this->table)
        ->select('*')
        ->inRandomOrder()->get();

        //nhóm groupBy having
        $users = DB::table($this->table)
        ->select(DB::raw('count(id) as email_count','email'))
        ->orderBy('fullname','desc')
        ->orderBy('email','asc')
        ->groupBy('email')->having('email_count','>=','2')
        ->get();

        //giới hạn limit,offset
        $users = DB::table($this->table)->offset(1)->limit(2)->get();
        //chạy từ vị trí 1(offset) và trả ra 2 bản ghi tiếp theo (limit)
        //hoặc
        $users = DB::table($this->table)->skip(10)->take(5)->get();

        //thêm dữ liệu(insert)
        $users = DB::table($this->table)
        ->insert(['email'=>'ton@gmail.com','fullname'=>'tonnnnn']);
        //thêm nhiều dữ liệu
        $users = DB::table($this->table)
        ->insert([
            ['email'=>'ton@gmail.com','fullname'=>'tonnnnn'],
            ['email'=>'ton444@gmail.com','fullname'=>'tonnn8n']
        ]);
        //lấy id sau khi insert
        $id = DB::getPdo()->lastInsertId();


        //debug câu lệnh sql
        //cách 1 ko nhìn thấy dữ liệu
        $sql = DB::table($this->table)->select('*')->toSql();
        //cách 2
        DB::enableQueryLog();
        $lists = DB::table($this->table)->select('*')->get();

    }
}
