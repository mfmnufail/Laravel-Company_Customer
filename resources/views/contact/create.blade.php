@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')

    <h1>Contact Us</h1>

    @if( ! session()->has('message'))
        <form action="/contact"  method="POST">
            <div class="form-group" class="p-2">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Type your name here!"  value="{{ old('name') }}" class="form-control">
            </div>
            <div class="error"> {{$errors -> first('name')}}</div>

            <div class="email" class="p-5">
                <label for="email">E-mail</label>
                <input type="email" placeholder="Please enter a valid email address" name="email" value="{{old('email')  }} " class="form-control">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control" value="{{ old('message')  }}"></textarea>
                <div class="error"> {{$errors -> first('message')}}</div>
            </div>
            @csrf
            <div>
                <button class="btn btn-primary" type="submit" >Send Message</button>
            </div>
        </form>
    @endif





@endsection
