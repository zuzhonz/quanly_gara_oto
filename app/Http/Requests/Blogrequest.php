<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Blogrequest extends FormRequest
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
                            "title" => "required|min:10",
                            "content" => "required",
                            "image" => "required|image|mimes:jpg,png,jpeg,gif,svg"
                        ];
                        break;
                        // nếu là method chỉnh sửa bản ghi
                    case 'update':
                        $rules = [
                            "title" => "min:10",
                            "content" => "min:20",
                            'image' => 'image|mimes:jpg,png,jpeg,gif,svg',
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
            'title.required' => "Không để trống tiêu đề !",
            'title.min' => "Nhập số ký tự lớn hơn 10 ký tự !",
            // 'title.regex' => "Không nhập ký tự đặc biệt vào tiêu đề !",

            'content.required' => 'Nhập nội dung bài viết !',
            'content.min' => 'Nhập nội dung lớn hơn 20 từ !',

            'image.required' => ' Chọn ảnh bài viết !',
            'image.image' => ' bạn chọn không phải là ảnh !',
            'image.mimes' => ' bạn chọn không đúng định dạng ảnh !'
        ];
    }
}