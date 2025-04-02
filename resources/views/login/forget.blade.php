@extends('layout.layout')

@section('content')
    <div class="flex flex-col items-center justify-center w-screen h-screen bg-gray-300">

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul class="">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="flex flex-col justify-center items-center bg-gray-100 gap-5 p-5 rounded-lg"
            action="{{ route('send_recovery_link') }}" method="post">
            @csrf
            <h1>Send Recovery Link</h1>
            <div>
                <label for="email">Email</label>
                <input
                    class="mt-1  w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    type="email" id="email" name="email" required>
            </div>
            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">Send Recovery Link</button>
        </form>

    </div>
@endsection
