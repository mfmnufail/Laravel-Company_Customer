@extends ('layouts.app')
@section('title','Customers List')

@section('content')

    @can('create', \App\Customer::class)
        <div>
            <a href="customer/create">Add new customer</a>
        </div>

        @endcan
    <hr>


    <div class="row">
        <div class="col-2">
            <h6 for="">Customer ID</h6>
        </div>
        <div class="col-4">
            <h6 for="">Customer and E-mail</h6>
        </div>
        <div class="col-4">
            <h6 for="">Company</h6>
        </div>
        <div class="col-2">
            <h6 for="">Status</h6>
        </div>
    </div>

    @foreach($customers as $customer)



            <div class="row">

                <div class="col-2">
                    {{ $customer->id }}
                </div>
                <div class="col-4">
                   @can('view', $customer)
                        <a href="customer/{{ $customer -> id }}">
                            {{ $customer-> name }}
                        </a> <span class="text-muted"> ({{ $customer -> email }})</span>
                       @endcan

                    @cannot('view', $customer)
                           {{ $customer-> name }}<span class="text-muted"> ({{ $customer -> email }})</span>

                       @endcannot
                </div>
                <div class="col-4">
                    {{ $customer-> company -> name }}
                </div>
                <div class="col-2">
                    {{ $customer -> active }}
                </div>
        </div>
        @endforeach

    <div class="row">
        <div class="col-12 pt-4 d-flex justify-content-center" class="position-sticky"  >
            {{ $customers->links() }}
        </div>
    </div>



{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                @foreach($companies as $company)--}}
{{--                    <h3>{{ $company->name }}</h3>--}}

{{--                    <ul>--}}
{{--                        @foreach($company-> customers as $customer)--}}
{{--                            <li>{{ $customer->name }}</li>--}}
{{--                            @endforeach--}}
{{--                    </ul>--}}
{{--                    @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}







    @endsection
