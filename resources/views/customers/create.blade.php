@extends ('layouts.app')
@section ('title','Add new customer')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers List</h1>

        </div>
    </div>

    <ul>

        <li class="row">
            <div class="col-12">
                <form action="/customer" method="POST" enctype="multipart/form-data" >

                    @include('customers/form')
                    <br>
                    <div >
                        <button class="btn btn-success" type="submit" >Add Customers</button>
                    </div>

                    @csrf
                </form>
            </div>
        </li>
    @endsection
