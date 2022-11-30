<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarsRequest extends FormRequest
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
                            'name' => 'required | min:4 | unique:cars',
                            'price' => 'required|integer',
                            'desc' => 'required|min:30',
                            'car_branch_id' => 'required',
                            'car_color_id' => 'required',
                            'car_image' => 'image|mimes:jpg,png,jpeg,webp|max:2040',
                        ];
                        break;

                        // nếu là method chỉnh sửa bản ghi
                    case 'update':
                        $rules = [
                            'name' => 'required | min:4',
                            'price' => 'required|integer',
                            'desc' => 'required|min:30',
                            'car_branch_id' => 'required',
                            'car_color_id' => 'required',
                            'car_image' => 'image|mimes:jpg,png,jpeg,webp|max:2040',
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
            'name.required'=>'Tên xe không được trống!',
            'name.unique'=>'Tên xe đã tồn tại mời bạn nhập tên khác!',
            'name.min'=>'Nhập ít nhất :min ký tự!',
            'price.required'=>'Mức giá không được trống!',
            'price.integer'=>'Dữ liệu nhập vào phải là số nguyên!',
            'desc.required'=>'Mô tả không được trống!',
            'desc.min'=>'Nhập ít nhất :min ký tự!',
            'car_branch_id.required'=>'Loại xe không được trống!',
            'car_color_id.required'=>'Màu xe không được trống!',
            'car_image.image'=>'Ảnh không được trống!',
            'car_image.mimes'=>'Ảnh không đúng định dạng jpg,png,jpeg,webp!',
            'car_image.max'=>'Ảnh không được lớn hơn 2040M !',
        ];
    }
}
