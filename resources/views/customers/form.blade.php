<div class="form-group" class="p-2">
    <label for="">Name</label>
    <input type="text" name="name" placeholder="Type your name here!"  value="{{ old('name') ?? $customer -> name }}" class="form-control">
</div>
<div class="error"> {{$errors -> first('name')}}</div>

<div class="email" class="p-5">
    <label for="">E-mail</label>
    <input type="email" placeholder="Please enter a valid email address" name="email" value="{{old('email') ?? $customer->email }} " class="form-control">
</div>
<div class="error"> {{$errors -> first('email')}}</div>

<div class="form-group" class="p-5">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">

        @foreach($customer -> activeOptions() as $activeOptionKey => $activeOptionvalue)
        <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionvalue  }} >{{ $activeOptionvalue }}</option>
   @endforeach
    </select>
</div>

<div class="form-group" class="p-5">
    <label for="">Company</label>
    <select name="company_id" id="company_id" class="form-control">

        <option value='' disabled>Select your company</option>
        @foreach($companies as $company)

            <option value= {{$company->id}} {{ $customer->id == $customer-> company_id ? 'selected':'' }}>{{$company->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group d-flex flex-column "   >
    <label for="image">Profile Image</label>
    <input type="file" name="image" class="py-2">
</div>
<div class="error"> {{$errors -> first('image')}}</div>


@csrf
