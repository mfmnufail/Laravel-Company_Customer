@component('mail::message')

    #Thank you for your message

    <h3>Name</h3> {{ $data['name'] }}
    <h3>Email</h3> {{ $data['email'] }}

    <h3>Message</h3> {{ $data['message'] }}
@endcomponent
