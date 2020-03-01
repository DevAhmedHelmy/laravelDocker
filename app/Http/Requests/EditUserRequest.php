<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class EditUserRequest extends FormRequest
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
            'first_name'  => 'required',
            'last_name'  => 'required',
            'email'  => 'required|email',
            
        ];
    }

    public function persist($id)
    {
        $user = User::find($id);
        $fileName = $user->image;
        if (request()->hasFile('image'))
        {
          $file = request()->file('image');
          $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
          $file->move('./image/upload/users/', $fileName);
        }

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        if ((request('new_password') && request('password_confirmation')) && (request('new_password') === request('password_confirmation')))
        {
            $user->password=bcrypt(request('new_password'));
        }
        $user->image = $fileName;
        // event(new SomeEvent($user));
        $user->save();
        $user->syncPermissions(request('permissions'));
    }
}
