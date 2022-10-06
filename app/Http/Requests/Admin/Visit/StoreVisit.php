<?php

namespace App\Http\Requests\Admin\Visit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
class StoreVisit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.visit.create');
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
            'Full_Name' => ['required', 'string'],
            'First_Surname' => ['required','string'],
            'Second_Surname' => ['nullable','string'],
            'Married_Surname' => ['nullable','string'],
            'First_Name' => ['nullable','string'],
            'Second_Name' => ['nullable','string'],
            'Reason' => ['required', 'string'],
            'Observation' => ['nullable'],
            'Entry_Datetime' =>['nullable','date'],
            'Exit_Datetime' => ['nullable','date'],
            'state_id' => ['nullable'],
            'dependency' => ['nullable'],

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
            'Full_Name.required'=> 'Debe cargar Nombres',
            'First_Surname.required'=> 'Debe cargar Apellidos',
            'Reason.required' => 'Debe cargar motivo de la Visita',






            //'ruc' => 'Cargue RUC',
        ];
    }





    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }

   // public function getStateId()
   // {
   //     return $this->get('state')['id'];
   // }
    public function getDependencyId()
    {
        return $this->get('dependency')['id'];
    }



}
