<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuruRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nip' =>['required', 'numeric', Rule::unique('guru', 'nip')->ignore($this->guru)],
            'nama_guru' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => ['required', Rule::unique('guru', 'email')->ignore($this->guru)],
            'no_hp' => ['required', 'numeric', Rule::unique('guru', 'no_hp')->ignore($this->guru)],
            'pelajaran_id' => 'required',
            'password' => $this->method() === 'POST' ? 'required|confirmed' : '',
        ];
    }
}
