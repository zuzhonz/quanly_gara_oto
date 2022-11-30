<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // lấy tất cả các bản ghi
    public function index($params, $pagination = true, $perpage)
    {
        if ($pagination) {
            $query  = DB::table($this->table)
                ->join('role', 'role.id', '=', $this->table . '.role_id')
                ->where($this->table .'.status', '=', 1)
                ->select('role.*',  $this->table . '.*')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keyword'])) {
                $query =  $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.name', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.role_id', 'like', '%' . $params['keyword']  . '%');
                });
            }
            $list = $query->paginate($perpage)->withQueryString();
        } else {
            $query  = DB::table($this->table)
                // ->join('role', 'role.id ', '=', $this->table . '.role_id')
                ->where($this->table .'.status', '=', 1)
                // ->select('role.*',  $this->table . '.*')
                ->orderByDesc($this->table . '.id');
            if (!empty($params['keyword'])) {
                $query =  $query->where(function ($q) use ($params) {
                    $q->orWhere($this->table . '.name', 'like', '%' . $params['keyword']  . '%');
                    $q->orWhere($this->table . '.role_id', 'like', '%' . $params['keyword']  . '%');
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
            return $query;
        }
    }


    // hàm thêm bản ghi
    public function create($params)
    {
        $data  = array_merge($params['cols'], [
            // 'created_at' => date('Y-m-d H:i:s'),
            'status' => 1,
            'password' => Hash::make($params['cols']['password'])

        ]);

        $query = DB::table($this->table)->insertGetId($data);
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
