<?php
// php artisan make:request ProductRequest tạo form request validate
namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Str;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // có đồng ý cho phép truy cập vào req này hay k
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // chứa các rule cần validate
    public function rules()
    {
        return [
            'product_name' => 'required | min:6',
            'product_price' => 'required | integer'
        ];
    }

    //thay đổi nội dung thông báo
    public function messages() {
        return [
            'required' => ' :attribute bắt buộc phải nhập',
            'min' => ' :attribute không được nhỏ hơn :min ký tự',
            'required' => ' :attribute bắt buộc phải nhập',
            'integer' => ' :attribute phải là số',
            'uppercase' => ':attribute phải viết hoa'
        ];
    }
    //thay đổi tên trường
    public function attributes()
    {
        return [
            'product_name' => 'Tên sản phẩm',
            'product_price' => ' Giá sản phẩm'
        ];
    }

    //
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count()>0) {
                $validator->errors()->add('msg', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
            }
        });
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'create_at' => date('Y-m-d H:i:s'),
        ]);
    }

    //đổi tên khi false
    protected function failedAuthorization()
    {
        throw new AuthorizationException('Không có quyền truy cập');
    }
}
