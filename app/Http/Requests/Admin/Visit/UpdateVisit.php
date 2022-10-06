<?php

namespace App\Http\Requests\Admin\Visit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateVisit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
  //  public function authorize(): bool
   // {
   //     return Gate::allows('admin.visit.edit', $this->visit);
   // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'CI' => ['sometimes', 'integer'],
            'Full_Name' => ['sometimes', 'string'],
            'First_Surname' => ['sometimes', 'string'],
            'Second_Surname' => ['sometimes', 'string'],
            'Married_Surname' => ['sometimes', 'string'],
            'First_Name' => ['sometimes', 'string'],
            'Second_Name' => ['sometimes', 'string'],
            'Reason' => ['sometimes', 'string'],
            'Observation' => ['sometimes', 'string'],
            'Entry_Datetime' => ['sometimes', 'date'],
            'Exit_Datetime' => ['sometimes', 'date'],
            'state' => ['sometimes'],
            'dependency' => ['sometimes'],

        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }

    //public function getStateId()
    //{
    //    return $this->get('state')['id'];
   // }
   // public function getDependencyId()
  //  {
   //     return $this->get('dependency')['id'];
    //}


}
