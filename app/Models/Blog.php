<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = [
        'id', 'user_id', 'conten', 'image', 'status'
    ];

    public function index($params, $pagination = true, $perpage)
    {
        if ($pagination) {
            $query  = DB::table($this->table)
                ->select($this->table . '.*', 'users.name as auth_name')
                ->join('users', $this->table . '.users_id', '=', 'users.id')
                ->orderByDesc($this->table . '.id');

            if (!empty($params['keyword'])) {
                $query =  $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.title', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->paginate($perpage)->withQueryString();
        } else {
            $query  = DB::table($this->table)
                ->select($this->table . '.*')
                ->join('users', $this->table . '.users_id', '=', 'users.id')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keyword'])) {
                $query =  $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.title', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->get();
        }
        return $list;
    }

    public function create($params)
    {
        $data  = array_merge($params['cols'], [
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

    public function show_auth_blog($id)
    {
        if (!empty($id)) {
            $query = DB::table($this->table)
                ->where('users_id', '=', $id)
                ->get();
        }
        return $query;
    }

    public function remove($id)
    {
        if (!empty($id)) {
            $query = DB::table($this->table)->where('id', '=', $id);
            $query = $query->delete($id);
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