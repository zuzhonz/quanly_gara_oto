<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cars extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $guarded = [];

    public function index($params, $pagination = true, $perpage)
    {
        if ($pagination) {
            $query = DB::table($this->table)
                ->where('status', '=', 1)
                ->select($this->table . '.*')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keyword'])) {
                $query = $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.name', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.price', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.style', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.desc', 'like', '%' . $params['keyword']  . '%');
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
                    $q->orWhere($this->table . '.price', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.style', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.desc', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->get();
        }
        return $list;
    }

    // hàm lấy 1 bản ghi theo id - chi tiết bản ghi
    public function show($id)
    {

        $query  = DB::table($this->table)
            ->where('status', '=', 1)
            ->select($this->table . '.*')->find($id);
        return $query;
    }



    // hàm thêm bản ghi
    public function create($params)
    {
        $data  = array_merge($params['cols'], [
            // 'created_at' => date('Y-m-d H:i:s'),
            'status' => 1,

        ]);

        $query = DB::table($this->table)->insertGetId($data);
        return $query;
    }

    public function search_branch($params, $pagination = true, $perpage, $branch)
    {
        if ($pagination) {
            $query = DB::table($this->table)
                ->where('car_branch_id', '=', $branch)
                ->where('status', '=', 1)
                ->select($this->table . '.*')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keyword'])) {
                $query = $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.name', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.price', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.style', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.desc', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->paginate($perpage)->withQueryString();
        } else {
            $query  = DB::table($this->table)
                ->where('car_branch_id', '=', $branch)
                ->where('status', '=', 1)
                ->select($this->table . '.*')
                ->orderByDesc($this->table . '.id');
            $list = $query->get();
        }
        return $list;
    }

    public function filter_car($params, $pagination = true, $perpage)
    {
        if ($pagination) {
            $query = DB::table($this->table)
                ->where($this->table . '.status', '=', 1)
                ->join('car_branch', $this->table . '.car_branch_id', '=', 'car_branch.id')
                ->join('car_color', $this->table . '.car_color_id', '=', 'car_color.id')
                ->select("car_branch.name", 'car_color.color', $this->table . '.*')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keywords'])) {
                $query = $query->where(function ($q) use ($params) {
                    $q->orWhere('car_branch.name', 'like', '%' . $params['keywords']['branch'] . '%');
                    $q->orWhere('origin', 'like', '%' . $params['keywords']['origin'] . '%');
                    $q->orWhere('engine', 'like', '%' . $params['keywords']['engine'] . '%');
                    $q->orWhere('mileage', 'like', '%' . $params['keywords']['mileage'] . '%');
                    $q->orWhere('price', '<=', $params['keywords']['price']);
                });
            }
            $list = $query->paginate($perpage)->withQueryString();
        } else {
            $query  = DB::table($this->table)
                ->where($this->table . '.status', '=', 1)
                ->join('car_branch', $this->table . '.car_branch_id', '=', 'car_branch.id')
                ->join('car_color', $this->table . '.car_color_id', '=', 'car_color.id')
                ->select("car_branch.name", 'car_color.color', $this->table . '.*')
                ->orderByDesc($this->table . '.id');
            $list = $query->get();
        }
        return $list;
    }

    public function origin()
    {
        $query  = DB::table($this->table)
            ->select('origin')->distinct()->where('origin')->get();
        return $query;
    }

    public function engine()
    {
        $query  = DB::table($this->table)
            ->select('engine')->distinct()->get();
        return $query;
    }
    public function mileage()
    {
        $query  = DB::table($this->table)
            ->select('mileage')->distinct()->get();
        return $query;
    }


    // hàm xóa bản ghi theo id 
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