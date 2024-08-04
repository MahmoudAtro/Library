@extends('content.book')


@section('content')
{{-- <h3>this is Book Page</h3> --}}


<main class="h-full pb-16 overflow-y-auto">

  @if (session('notfound'))
  <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert" style="width: 700px">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
      <p>{{session('notfound')}}</p>
    </div>
  @endif

<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
 

  @forelse ($books as $book)

    <a href="{{route('book.show' , $book->id)}}" class="border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
    style="max-width: 200px; max-height:350px; justify-content:center; margin:10px; font-family:sans-serif;">
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
      style="max-width: 200px; max-height:350px; justify-content:center; padding:10px; border-top-right-radius:20px; border-top-left-radius:20px; line-height:1.15;">
        @if ($book->img)
        <img class="rounded-t-lg items-center" src="{{asset('images/'.$book->img)}}" alt="book image" style="width: 160px; height:200px; border-radius:20px; margin:auto;" />
        @else
        <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        @endif
      <div class="p-5  dark:hover:bg-gray-700 overflow-hidden" style="height: 100px;">
              <h5 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-gray-400 text-center" style="font-weight:800 margin-top:5px;">{{$book->title}}</h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center" style="font-weight:600 margin-top:10px; color:#F65656;">{{$book->author}}</p>
        </div>
          <div class="px-6 pt-4 pb-2 " style="text-align:center;">
              <button class="hover:bg-blue-700 text-white font-bold px-3 py-2 inline-flex items-center text-sm font-medium text-center rounded-lg hover:bg-blue-800">
                <span style="margin: 3px; color:gray">Read more</span>
                <svg class="rtl:rotate-180 ms-2" style="color:gray;" width="15%" height="10"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
              </svg>
              </button>
          </div> 
       </div></a>


@empty
      <h4 style="text-align: center; color:red;">No Books Found!</h4>
@endforelse





</div>

</main>
    
@endsection
@section('title' , 'Book Page')
    


