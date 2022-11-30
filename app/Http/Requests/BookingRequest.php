<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
        // dd($ActionCurrent);
        switch ($this->method()) {
            case 'POST':
                switch ($ActionCurrent) {
                        // nếu là method thêm mới bản ghi
                    case 'store':
                        $rules = [
                            'name' => 'required | min:4',
                            'booking_time_id' => 'required',
                            'services_id' => 'required',
                            'car_id' => 'required',
                            'email' => ["regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/"],
                            'email' => 'required|min:5|max:50|email',
                            'phone'=>["required","min:10","max:11", "regex:/^(84|0[2|3|5|7|8|9])+([0-9]{8,9})$\b/"],
                            'birthday' => 'required',
                        ];
                        break;
                    
                        case 'add_booking':
                            $rules = [
                                'name' => 'required | min:4',
                                'booking_time_id' => 'required',
                                'services_id' => 'required',
                                'email' => ["regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/"],
                                'email' => 'required|min:5|max:50|email',
                                'phone'=>["required","min:10","max:11", "regex:/^(84|0[2|3|5|7|8|9])+([0-9]{8,9})$\b/"],
                                'birthday' => 'required',
                            ];
                            break;

                        case 'add_booking':
                            $rules = [
                                'name' => 'required | min:4 | unique:services',
                                'booking_time_id' => 'required',
                                'services_id' => 'required',
                                'car_id' => 'required',
                                'email' => ["regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/"],
                                'email' => 'required|min:5|max:50|email',
                                'phone'=>["required","min:10","max:11", "regex:/^(84|0[2|3|5|7|8|9])+([0-9]{8,9})$\b/"],
                                'birthday' => 'required',
                            ];
                            break;

                        // nếu là method chỉnh sửa bản ghi
                    case 'update':
                        $rules = [
                            'name' => 'required | min:4',
                            'booking_time_id' => 'required',
                            'services_id' => 'required',
                            'car_id' => 'required',
                            'email' => ["regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/"],
                            'email' => 'required|min:5|max:50|email',
                            'phone'=>["required","min:10","max:11", "regex:/^(84|0[2|3|5|7|8|9])+([0-9]{8,9})$\b/"],
                            'birthday' => 'required',
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
            'name.required' => 'Tên nhân viên không được trống!',
            'name.unique' => 'Tên nhân viên đã tồn tại mời bạn nhập tên khác!',
            'name.min' => 'Nhập ít nhất :min ký tự!',
            'booking_time_id.required'=>'Thời gian không được trống!',
            'services_id.required'=>'Dịch vụ không được trống!',
            'car_id.required'=>'Xe không được trống!',
            'email.required'=>'Email không được trống!',
            'email.min'=>'Email tối thiểu 5 ký tự!',
            'email.max'=>'Email tối đa 50 ký tự!',
            'email.email'=>'Email không đúng định dạng!',
            'email.regex'=>'Email không đúng định dạng!',
            'phone.required'=>'SĐT không được trống!',
            'phone.min'=>'SĐT tối thiểu 10 ký tự số!',
            'phone.max'=>'SĐT tối đa 11 ký tự số!',
            'phone.regex'=>"Số điện thoại không đúng định dạng!",
            'birthday.required'=>'Ngày sinh không được để trống!',
        ];
    }
}
