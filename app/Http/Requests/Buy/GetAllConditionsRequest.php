<?php

namespace App\Http\Requests\Buy;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Condition;

class GetAllConditionsRequest extends FormRequest
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
        return [
            //
        ];
    }

    public function process()
    {
        $conditions = Condition::select('id','name')->get();

        return ['conditions' => $conditions];
    }
}
