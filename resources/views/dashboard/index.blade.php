@extends('layout.layout')

@section('content')
    <div class="w-full flex justify-between items-center bg-gray-800 text-white pe-10">
        <h1 class="text-3xl uppercase font-extralight mx-10 my-20">Welcome, {{ auth()->user()->name }}</h1>

        <div class="flex items-center justify-center">
            @auth
          <form action="{{url(route('logout'))}}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 uppercase">Logout</button>
          </form>
          @endauth
        </div>


    </div>
    <div class="w-full h-full flex items-center justify-center gap-20 px-10">
        <div class="w-1/2 h-100 bg-gray-300 flex justify-center items-center rounded-lg">
            {{-- <h1 class="text-3xl uppercase font-extralight ">DASHBOARD</h1>s --}}
        </div>
        <div class="w-1/2 h-100 bg-gray-300 flex justify-center items-center rounded-lg">
            {{-- <h1 class="text-3xl uppercase font-extralight ">DASHBOARD</h1>s --}}
        </div>
        {{-- <hr class="bg-gray-400 "> --}}
    </div>
@endsection
