@extends ('layouts.app')
@section ('title','Edit customer details'.$customer -> name)

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit customer {{ $customer -> name }}</h1>

        </div>
    </div>

    <ul>

        <li class="row">
            <div class="col-12">
                <form action="/customer/{{ $customer -> id }}" method="POST"  enctype="multipart/form-data">
                    @method('PATCH')

                    @include('customers/form')

                    <br>
                    <div >
                        <button class="btn btn-primary" type="submit" >Save Customers</button>
                    </div>


                </form>
            </div>
        </li>
@endsection
