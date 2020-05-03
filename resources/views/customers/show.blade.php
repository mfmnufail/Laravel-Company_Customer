@extends ('layouts.app')
@section('title', 'Details for '.$customer->name)

@section('content')



    <div class="row">
        <div class="col-12">
            <h1> Details for {{ $customer -> name }}</h1>
            <p><a href="/customer/{{ $customer -> id }}/edit">Edit</a></p>


        <form action="/customer/{{ $customer->id }}" method="POST">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name</strong> {{ $customer->name }}</p>
            <p><strong>E-mail</strong> {{ $customer->email }}</p>
            <p><strong>Company</strong> {{ $customer->company->name }}</p>
        </div>
    </div>

    @if($customer->image)
        <div class="row">
            <div class="col-12">
                <a href="{{ asset('storage/'.$customer->image) }}">
                    <img src="{{asset('storage/'.$customer->image)}}" alt="" >
                </a>
            </div>
        </div>
    @endif
    @endsection


