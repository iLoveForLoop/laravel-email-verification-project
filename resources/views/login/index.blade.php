@extends('layout.layout')

@section('content')
    <div class="w-screen h-screen flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <ul class="">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Login
                        </button>
                        <a href="{{ url(route('forget')) }}" class="text-sm text-indigo-600 hover:text-indigo-700">Forgot
                            Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
