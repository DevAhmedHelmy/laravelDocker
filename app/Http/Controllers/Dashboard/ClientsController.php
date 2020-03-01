<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
class ClientsController extends Controller
{
    public function index (Request $request)
    {
        $clients = Client::when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);
        return view('admin.clients.index',compact('clients'));
    }

    public function create ()
    {
        return view('admin.clients.create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',
        ]);
        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        Client::create($request_data);
        session()->flash('message', __('site.updated_successfully'));
        return redirect()->route('dashboard.clients.index');
        
    }

    public function edit (Client $client)
    {
        return view('admin.clients.edit',compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        $client->update($request_data);
        session()->flash('message', __('site.updated_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of update

    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('message', __('site.deleted_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of destroy
}
