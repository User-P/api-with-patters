<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreIssuerRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         */
        public function authorize(): bool
        {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
         */
        public function rules()
        {
            return [
                'business_name' => 'required|string|max:255|unique:issuers,business_name',
                'rfc' => 'required|string|max:13|unique:issuers,rfc',
                'postal_code' => 'required|string|max:10',
                'regime_id' => 'nullable|exists:tax_regimes,id',
                'cer' => 'nullable|file|mimes:cer',
                'key' => 'nullable|file|mimes:key',
                'password_certificate' => 'nullable|string|min:8',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|string|unique:users,username',
                'phone' => 'nullable|string|max:15|unique:users,phone',
                'password_account' => 'required|string|min:8',
                'curp' => 'nullable|string|max:18|unique:issuer_details,curp',
                'name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'second_last_name' => 'nullable|string|max:100',
                'birth_date' => 'nullable|date',
                'entity_birth' => 'nullable|string|max:100',
                'gender_id' => 'nullable|exists:genders,id',
                'bank_id' => 'nullable|exists:banks,id',
                'clabe' => 'nullable|string|size:18|unique:issuer_details,clabe',
                'account_number' => 'nullable|string|max:20|unique:issuer_details,account_number',
            ];
        }

    }
