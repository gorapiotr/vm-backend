<?php



namespace Modules\Book\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
        return [
            'name' => 'required|max:255',
            'isbn' => 'required|max:17|unique:books',
            'categories' => 'required',
            'categories.*' => 'required|exists:categories,id'
        ];
    }
}



?>
