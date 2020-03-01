<?php

namespace App\Http\Controllers\Dashboard\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\DataTables\ClientsDataTable;
class ClientController extends Controller
{
    public function index(ClientsDataTable $client)
    {
        return $client->render('dashboard.clients.index');
    }
    // public function index (Request $request)
    // {
    //     $clients = Client::when($request->search, function($q) use ($request){

    //         return $q->where('name', 'like', '%' . $request->search . '%')
    //             ->orWhere('phone', 'like', '%' . $request->search . '%')
    //             ->orWhere('address', 'like', '%' . $request->search . '%');

    //     })->latest()->paginate(50);
    //     return view('dashboard.clients.index',compact('clients'));
    // }

    public function create ()
    {
        $client = new Client();
        return view('dashboard.clients.form',compact('client'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'code' => 'required|unique:clients,code',
            'name' => 'required',
            'email' => 'nullable|email|unique:clients',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required'
        ]);
        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        Client::create($request_data);
        session()->flash('message', __('admin.updated_successfully'));
        return redirect()->route('dashboard.clients.index');

    }

    public function edit (Client $client)
    {
        return view('dashboard.clients.form',compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'code' => 'required|unique:clients,code,$client->id',
            'name' => 'required',
            'email' => 'nullable|email|unique:clients,$client->id',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required'

        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        $client->update($request_data);
        session()->flash('message', __('admin.updated_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of update

    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('message', __('admin.deleted_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of destroy
}
