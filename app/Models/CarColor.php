<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class carColor extends Model
{
    use HasFactory;

    protected $table = 'car_color';
    protected $fillable = [
        'id', 'color', 'desc'
    ];

    public function index($params, $pagination = true, $perpage)
    {
        if ($pagination) {
            $query  = DB::table($this->table)
                ->select($this->table . '.*')
                ->orderByDesc($this->table . '.id');

            if (!empty($params['keyword'])) {
                $query =  $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.color', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.desc', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->paginate($perpage)->withQueryString();
        } else {
            $query  = DB::table($this->table)
                ->select($this->table . '.*')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keyword'])) {
                $query =  $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.color', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->get();
        }
        return $list;
    }
    public function create($params)
    {
        $data  = array_merge($params['cols'], [
            // 'created_at' => date('Y-m-d H:i:s'),
            'status' => 1,

        ]);

        $query = DB::table($this->table)->insertGetId($data);
        return $query;
    }

    public function show($id)
    {
        if (!empty($id)) {
            $query = DB::table($this->table)
                ->where('id', '=', $id)
                ->first();
            return $query;
        }
    }

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