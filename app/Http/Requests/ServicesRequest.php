<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $ActionCurrent  = $this->route()->getActionMethod(); // trả về method đang hoạt động 

        switch ($this->method()) {
            case 'POST':
                switch ($ActionCurrent) {
                        // nếu là method thêm mới bản ghi
                    case 'store':
                        $rules = [
                            'name' => 'required | min:4 | unique:services',
                            'regulations' => 'required|min:30',
                        ];
                        break;

                        // nếu là method chỉnh sửa bản ghi
                    case 'update':
                        $rules = [
                            'name' => 'required | min:4',
                            'regulations' => 'required|min:30',
                        ];
                        break;

                    default:
                        # code...
                        break;
                }
                break;

            default:
                # code...
                break;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên dịch vụ không được trống!',
            'name.unique'=>'Tên dịch vụ đã tồn tại mời bạn nhập tên khác!',
            'name.min'=>'Nhập ít nhất :min ký tự!',
            'regulations.required'=>'Quy định không được trống!',
            'regulations.min'=>'Nhập ít nhất :min ký tự!'
        ];
    }
}
