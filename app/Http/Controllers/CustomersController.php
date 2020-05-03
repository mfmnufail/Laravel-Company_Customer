<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index()
    {
        $customers = Customer::with('company')->paginate(5);



        return view('customers.index', compact('customers'));

    }


    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create', compact('companies','customer'));
    }


    public function store()
    {

        $this-> authorize('create', Customer::class);

        $customer = Customer::create($this->validationRequest());

        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));


       return redirect('customer');

    }

    public function show(Customer $customer)
    {

        return view('customers.show',compact('customer'));
    }

    public  function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit',compact('customer','companies'));
    }

    public function update(Customer $customer)
    {
        $data =

        $customer -> update($this->validationRequest());
        $this->storeImage($customer);

        return redirect('customer/'.$customer-> id);


    }

    public function destroy(Customer $customer)
    {
        $this-> authorize('delete', Customer::class);

        $customer -> delete();
        return redirect('customer');

    }

    public function validationRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'email|required',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000',

        ]);


    }

    private function storeImage($customer)
    {
        if(request()->has('image')){

                $customer->update([
                    'image' => request()->image->store('uploads','public'),
                ]);

                $image = Image::make(public_path('storage/'.$customer->image))->fit(300,450);
                $image->save();

        }
    }


}

