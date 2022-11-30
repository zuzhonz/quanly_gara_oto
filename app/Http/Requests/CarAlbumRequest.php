<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarAlbumRequest extends FormRequest
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
                            'image.*' => 'required|
                                        image|
                                        mimes:jpg,png,jpeg,webp|max:2040'
                        ];
                        break; 
                        // nếu là method chỉnh sửa bản ghi
                    case 'update':
                        $rules = [
                            'image.*' => 'image|mimes:jpg,png,jpeg,webp|max:2040'
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
            'required' => ':Image bắt buộc phải nhập', 
            'image' => ':Image phải là định dạng ảnh', 
            'mimes' => ':Image phải là định dạng jpg,png,jpeg,gif,svg'
        ];
    } 
}
