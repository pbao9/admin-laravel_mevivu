<?php

namespace App\Api\V1\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return match($this->method()) {
            'GET' => $this->methodGet(),
            'POST' => $this->methodPost(),
            'PUT' => $this->methodPut(),
            'PATCH' => $this->methodPatch(),
            'DELETE' => $this->methodDelete(),
            'OPTIONS' => $this->methodOptions(),
            default => $this->methodGet()
        };
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodGet()
    {
        return [

        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPut()
    {
        return [
            
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPatch()
    {
        return [
            
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodDelete()
    {
        return [
            
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodOptions()
    {
        return [
            
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        
        // $errors = collect($errors)->flatten(1);
 
        // $errors = $errors->implode('; ');
        
        throw new HttpResponseException(
            response()->json([
                'status' => 400,
                'message' => __('Vui lòng kiểm tra lại các trường field'),
                'message_validate' => $errors
            ], 400)
        );
    }
}
