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
          @foreach ($user as $user)
        <form action="{{route('profile.update' , $user->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
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
            
<input style="margin-top: 10px;" name="img" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">


        @if ($errors->any())
        <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <ul>
                <li style="color: red;">{{$error}}</li>
            </ul>
        @endforeach
        </div>
    @endif
          <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Name</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               name="name" value="{{$user->name}}" 
              />

            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Email</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
               value="{{$user->email}}" name="email"  disabled
              />
            </label>

            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Country</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 name="country" value="{{$user->country}}" 
              />

              <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Address</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                     name="address" value="{{$user->address}}" 
                  />

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button type="submit"   class="block  px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: inline;">
              update
          </button>
          <a href="/profile"><button type="button" class=" text-gray-900 px-4 py-2 mt-4 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Cancel</button></a>
        </form>
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>

    
@endsection    


@section('title' , 'myprofile')
    
