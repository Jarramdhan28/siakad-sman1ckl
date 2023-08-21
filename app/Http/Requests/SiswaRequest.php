<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiswaRequest extends FormRequest
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
            'nis' => ['required', 'numeric', Rule::unique('siswa')->ignore($this->siswa)],
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => ['required', Rule::unique('siswa')->ignore($this->siswa)],
            'no_hp' => ['required', 'numeric', Rule::unique('siswa')->ignore($this->siswa)],
            'kelas_id' => 'required',
            'password' => $this->method() === 'POST' ? 'required|confirmed' : '',
        ];
    }
}
