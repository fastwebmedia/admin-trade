<?php namespace FWM\Admin\Http\Requests;

class FileRequest extends Request {

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
			'file' => ''
		];
	}

    /**
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }

	/**
	 * @param array $errors
	 * @return mixed
	 */
	public function response(array $errors)
	{
		return response($errors, 400);
	}

}
