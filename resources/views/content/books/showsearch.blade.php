@extends('content.book')


@section('content')
    {{-- <h3>this is Book Page</h3> --}}


    <main class="h-full pb-16 overflow-y-auto">

        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            @php
                use App\Models\Book;
                $books = Book::where('title', 'like', '%' . $data . '%')
                    ->orwhere('author', 'like', '%' . $data . '%')
                    ->get();
            @endphp

            @forelse ($books as $book)
                <a href="{{ route('book.show', $book->id) }}"
                    class="border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
                    style="max-width: 200px; max-height:350px; justify-content:center; margin:10px; font-family:sans-serif;">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
                        style="max-width: 200px; max-height:350px; justify-content:center; padding:10px; border-top-right-radius:20px; border-top-left-radius:20px; line-height:1.15;">
                        @if ($book->img)
                            <img class="rounded-t-lg items-center" src="{{ asset('images/' . $book->img) }}" alt="book image"
                                style="width: 160px; height:200px; border-radius:20px; margin:auto;" />
                        @else
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="200"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                    dy=".3em">Thumbnail</text>
                            </svg>
                        @endif
                        <div class="p-5  dark:hover:bg-gray-700 overflow-hidden" style="height: 100px;">
                            <h5 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-gray-400 text-center"
                                style="font-weight:800 margin-top:5px;">{{ $book->title }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center"
                                style="font-weight:600 margin-top:10px; color:#F65656;">{{ $book->author }}</p>
                        </div>
                        <div class="px-6 pt-4 pb-2 " style="text-align:center;">
                            <button
                                class="hover:bg-blue-700 text-white font-bold px-3 py-2 inline-flex items-center text-sm font-medium text-center rounded-lg hover:bg-blue-800">
                                <span style="margin: 3px; color:gray">Read more</span>
                                <svg class="rtl:rotate-180 ms-2" style="color:gray;" width="15%" height="10"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </a>


            @empty
                <br>
                <h4 style="text-align: center; color:red;">No Books Found!</h4>
            @endforelse


        </div>

    </main>

@endsection
@section('title', 'Book Page')
