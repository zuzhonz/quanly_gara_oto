<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $guarded = [];

    // hàm lấy tất cả bản ghi 
    // tham số lần lượt là 
    /**
     * $params : có thể  là dữ liệu cho việc tìm kiếm / search
     * $pagination : có phần trang hay không nếu true là phần trang cong false là không
     * $perpage : hiển thị bao nhiêu bản ghi trên 1 trang
     */
    public function index($params, $pagination = true, $perpage)
    {
        if ($pagination) {
            $query  = DB::table($this->table)
                ->where('status', '=', 1)
                ->select($this->table . '.*')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keyword'])) {
                $query =  $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.name', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.mo_ta', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->paginate($perpage)->withQueryString();
        } else {
            $query  = DB::table($this->table)
                ->where('status', '=', 1)
                ->select($this->table . '.*')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keyword'])) {
                $query =  $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.name', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->get();
        }
        return $list;
    }
    // hàm lấy 1 bản ghi theo id - chi tiết bản ghi
    public function show($id)
    {
        if (!empty($id)) {
            $query = DB::table($this->table)
                ->where('id', '=', $id)
                ->first();

                // $query  = DB::table($this->table)
                // ->where('car_id', '=', $car_id) 
                // ->get();
            return $query;
        }
    }


    // hàm thêm bản ghi
    public function create($params)
    {
        $data  = array_merge($params['cols']
        , [
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1,

        ]
    );

        $query = DB::table($this->table)->insertGetId($data);
        return $query;
    }

    // hàm xóa bản ghi theo id 
    public function remove($id)
    {
        if (!empty($id)) {
            $query = DB::table($this->table)->where('id', '=', $id);
            // $data = [
            //     'car_id' => 0
            // ];
            // $query = $query->update($data);
            $query = $query->delete();
            return $query;
        }
    }


    // hàm update bản ghi 
    public function saveupdate($params)
    {
        // dd($this->guarded);
        $data = array_merge($params['cols'], [
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $query =  DB::table($this->table)
            ->where('id', '=', $params['cols']['id'])
            ->update($data);
        return $query;
    } 
}
