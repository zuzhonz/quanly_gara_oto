<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employees extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $guarded = [];

    public function services(){
        return $this->belongsToMany(Services::class);
    }

    public function index ($params, $pagination = true, $perpage) {
        if ($pagination) {
            $query = DB::table($this->table)
                ->where('status', '=', 1)
                ->select($this->table . '.*')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keyword'])) {
                $query = $query->where(function ($q) use ($params){
                    $q->orWhere($this->table . '.name', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.email', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.phone', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.CCCD', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.birthday', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.address', 'like', '%' . $params['keyword']  . '%');
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
                    $q->orWhere($this->table . '.email', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.phone', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.CCCD', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.birthday', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.address', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->get();
        }
        return $list;
    }

    // h??m l???y 1 b???n ghi theo id - chi ti???t b???n ghi
    public function show($id)
    {
        if (!empty($id)) {
            $query = DB::table($this->table)
                ->where('id', '=', $id)
                ->first();
            return $query;
        }
    }


    // h??m th??m b???n ghi
    public function create($params)
    {
        $data  = array_merge($params['cols'], [
            // 'created_at' => date('Y-m-d H:i:s'),
            'status' => 1,

        ]);

        $query = DB::table($this->table)->insertGetId($data);
        return $query;
    }

    // h??m x??a b???n ghi theo id 
    public function remove($id)
    {
        if (!empty($id)) {
            $query = DB::table($this->table)->where('id', '=', $id);
            $data = [
                'status' => 0
            ];
            $query = $query->update($data);
            return $query;
        }
    }


    // h??m update b???n ghi 
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
