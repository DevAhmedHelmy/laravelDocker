<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Storage;
use App\DataTables\UsersDataTable;
class UserController extends Controller
{
    protected $user;
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
        // $this->middleware(['permission:read_users'])->only('index');
        // $this->middleware(['permission:create_users'])->only('create');
        // $this->middleware(['permission:update_users'])->only('edit');
        // $this->middleware(['permission:delete_users'])->only('destroy');

    }
    public function index(UsersDataTable $user)
    {

        return $user->render('dashboard.users.index');
    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index(Request $request)
    // {


    //     // if($request->search)
    //     // {
    //     //   $users = User::whereRoleIs('admin')->where(function($q) use ($request)
    //     //   {
    //     //     return $q->when($request->search , function($query) use ($request)
    //     //     {
    //     //       return $query->where('first_name','like','%' . $request->search .'%')
    //     //                ->orWhere('last_name','like','%' . $request->search .'%');
    //     //     });
    //     //   })->latest()->paginate(2);
    //     // }else{
    //     //   $users = $this->user->getAll();
    //     // }

    //     // // dd($users);
    //     // return view('admin.users.index',compact('users'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('dashboard.users.form',compact('user'));
    }

    public function store(CreateUserRequest $request)
    {
        // dd(request()->all());
        $data = $request->validated();
        // dd($data);
        $user = new User();
        // if($request->hasFile('file'))
        // {
        //     // dd('helll');
        //     $image = up()->uploadFile([
        //         'new_name' => '',
        //         'file' => 'user',
        //         'path' => 'users',
        //         'upload_type' =>'single',
        //         'delete_file' => ''
        //     ]);

        // }
        // dd($image);
        // $fileName = null;
        // if ($request->hasFile('image'))
        // {
        //   $file = $request->file('image');
        //   $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        //   $file->move(public_path('image/upload/users/'), $fileName);
        // }



        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);

        $user->birth_date = $data['birth_date'];
        $user->address =$data['address'];
        $user->jop_title = $data['jop_title'];
        $user->hiring_date = $data['hiring_date'];
        $user->gender = $data['gender'];
        $user->type = $data['type'];

        if($user->save())
        {
            $user->attachRole('admin');
            $user->syncPermissions($data['permissions']);
            session()->flash('message', __('site.added_successfully'));
            return redirect()->route('dashboard.users.index');
        }else {
            return back();
        }



    }

    public function show(User $user)
    {
      $user = $this->user->show($user);
      return view('admin.users.show',compact('user'));
    }

    public function edit(User $user)
    {
      $user = $this->user->edit($user);
    //   dd($user);
      return view('dashboard.users.form',compact('user'));
    }
    public function update(EditUserRequest $user,$id)
    {
        $user->persist($id);
        session()->flash('message', __('site.updated_successfully'));
        return redirect()->route('dashboard.users.index');
    }
    public function destroy(User $user)
    {
      if ($user->image != 'default.png') {

        Storage::disk('public_upload')->delete('/users/' . $user->image);

    }//end of if
      // $this->user->destroy($id);
      $user->delete();
      session()->flash('message', __('site.deleted_successfully'));
      return redirect()->route('dashboard.users.index');
    }


}
