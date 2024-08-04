@extends('content.book')
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
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900" >
<div
  class="flex-1 h-full max-w-3xl mx-auto overflow-auto bg-white rounded-lg shadow-xl dark:bg-gray-800"
  style="height: 800px;"
>
            <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            style="text-align: center; color:blue;"
            >
            update Book
            </h2>
  <div class="flex flex-col overflow-y-auto">
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2" style="margin: auto;">
      <div class="w-full" style="width:600px;">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <ul>
                <li style="color: red;">{{$error}}</li>
            </ul>
        @endforeach
       @endif
        <form action="{{route('book.update' , $book->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH') 
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group" style="margin-right: 10px;">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Title</span>
                        <input
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                         name="title" value="{{$book->title}}"
                        />
                          </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Author</span>
                        <input
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                          name="author" value="{{$book->author}}"
                        />
                      </label>
                </div>
            </div>
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Description</span>
              <textarea
              class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
              rows="2"
              placeholder="{{$book->des}}" name="des"
            ></textarea>
            </label>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Body</span>
                <textarea
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="5"
                placeholder="{{$book->body}}" name="body" 
              ></textarea>
              </label>

              <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">date</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="date" name="date" value="{{$book->date}}"
                  />

 
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Categorie</label>
            <select name="categorie" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>{{$book->categorie}}</option>
            @foreach ($cat as $item)
            <option>{{$item->name}}</option>
            @endforeach
            </select>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">pdf</span>
                <input style="margin-top: 10px;" name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            </label>
            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button type="submit"   class="block  px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: inline;">
              update
          </button>
          <a href="{{route('bookmanager')}}"><button type="button" class=" text-gray-900 px-4 py-2 mt-4 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Cancel</button></a>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('title' , 'create book')
    