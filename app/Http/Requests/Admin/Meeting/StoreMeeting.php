<?php

namespace App\Http\Requests\Admin\Meeting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMeeting extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.meeting.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'CI' => ['required', 'integer'],
            'Names' => ['required', 'string'],
            'First_Names' => ['required', 'string'],
            'Reason' => ['nullable', 'string'],
            'Observation' => ['nullable'],
            'With_whom' => ['nullable'],
            'Meeting_Date' => ['required', 'date'],
            'Entry_Datetime' => ['nullable'],
            'Exit_Datetime' => ['nullable'],
            'state_id' => ['nullable'],

        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */

    public function messages()
    {
        return [

            'CI.required' => 'Debe cargar número de cédula',
            'Names.required'=> 'Debe cargar Nombres',
            'First_Names.required'=> 'Debe cargar Apellido',
            'Reason.required' => 'Debe cargar motivo de la Audiencia',
            'With_whom.required'=>'Debe cargar con quien es la Audiencia solicitada',
            'Meeting_Date.required'=>'Debe cargar Fecha prevista para la Audiencia',







            //'ruc' => 'Cargue RUC',
        ];
    }

    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
