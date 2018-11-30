<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Session;



class CustomerController extends Controller
{
    public function index()
    {
//        $customers = Customer::all();
//        return view('list',compact('customers'));
        $customers = Customer::paginate(5);

//        $cities = City::all();

        return view('list', compact('customers'));
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        Session::flash('success', 'Xóa khách hàng thành công');
        return redirect()->route('customers.index');
    }

    public function create()
    {
        return view('create');
    }

    public function store(request $request)
    {
        $customer = new Customer();
        $customer->code_customer = $request->input('code_customer');
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->address      = $request->input('address');
        $customer->phone_number      = $request->input('phone_number');
        $customer->save();
        Session::flash('success', 'Tạo mới khách hàng thành công');
        return redirect()->route('customers.index');
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('edit', compact('customer'));
    }

    public function update(CustomerRequest $request,$id){
        $customer = Customer::findOrFail($id);
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->save();
        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('customers.index');
    }


    public function search(Request $request)

    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        else{
        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')->get();
        return view('list', compact('customers'));}
    }
}
