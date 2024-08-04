@extends('app')
@section('content')

<link
href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
rel="stylesheet"
/>
<link rel="stylesheet" href="/css/tailwind.output.css" />
<script
src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
defer
></script>
<script src="../assets/js/init-alpine.js"></script>
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900" style="height: 200px !important;">
<div
  class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
>
  <div class="flex flex-col overflow-y-auto">
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2" style="margin: auto;">
      <div class="w-full">
        @if (session('msg'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            {{session('msg')}}
        </div>
        @endif
          @foreach ($user as $user)
          @if (!$user->img)
                        <img
                class="object-cover w-15 h-15 rounded-full"
                src="{{Avatar::create(Auth::user()->name)->toBase64();}}"
                alt="profile photo"
                aria-hidden="true"
                style="margin:auto; padding:10px;"
              />
          @else
          <img
          class="object-cover w-9 h-9 rounded-full"
          style="width: 50%; margin:auto;"
          src="{{asset('images/'.$user->img)}}"
          alt="profile photo"
          aria-hidden="true"
          style="margin:auto; padding:10px;"
        />              
          @endif
     
          <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Name</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               name="name" value="{{$user->name}}" disabled
              />

            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Email</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
             name="email" value="{{$user->email}}" disabled
              />
            </label>

            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Country</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 name="country" value="{{$user->country}}" disabled
              />

              <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Address</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                     name="address" value="{{$user->address}}" disabled
                  />
                  <a href="{{route('profile-setting')}}"><button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block;">
                    update account
                </button></a>
                  @endforeach

            <!-- You should use a button here, as the anchor is only used for the example  -->

      </div>
    </div>
  </div>
</div>
</div>

    
@endsection    


@section('title' , 'myprofile')
    
