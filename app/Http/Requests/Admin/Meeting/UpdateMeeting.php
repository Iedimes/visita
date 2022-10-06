<?php

namespace App\Http\Requests\Admin\Meeting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMeeting extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.meeting.edit', $this->meeting);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'CI' => ['sometimes', 'integer'],
            'Names' => ['sometimes', 'string'],
            'First_Names' => ['sometimes', 'string'],
            'Reason' => ['sometimes', 'string'],
            'Observation' => ['sometimes', 'string'],
            'With_whom' => ['sometimes', 'string'],
            'Meeting_Date' => ['nullable'],
            'Entry_Datetime' => ['nullable'],
            'Exit_Datetime' => ['nullable'],
            'state_id' => ['sometimes', 'integer'],

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
}
