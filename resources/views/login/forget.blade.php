@extends('layout.layout')

@section('content')
    <div>
        <h1>Send Recovery Link</h1>
        <form action="{{ route('send_recovery_link') }}" method="post">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
                <button type="submit">Send Recovery Link</button>
        </form>

    </div>
@endsection