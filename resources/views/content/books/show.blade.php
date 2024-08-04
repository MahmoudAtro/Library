@extends('content.book')
@section('title', 'book-show')

@section('content')
    
<br>
<p class="text-lg font-medium text-gray-900 dark:text-white text-center" style="margin-top: 20px; font-size:30px;">{{$book->title}}</p>
<br>
<a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
    style="max-width: 1200px;">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{asset('images/'.$book->img)}}" alt="book img" style="width: 200px; height:100%;">
    <div class="flex flex-col justify-between p-4 leading-normal"  style="float: right;">
        <div class="relative" style="width: 700px; margin: 20px 20%; border:solid 2px green;">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-gray" style="margin: auto;">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center" style="color: blue;">
                    Book Information
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" style="color: green;">
                    Author name:
                </th>
                <td class="px-6 py-4" style="font-weight: bold;">
                    {{$book->author}}
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" style="color: green;">
                    Date Book:
                </th>
                <td class="px-6 py-4" style="font-weight: bold;">
                    {{$book->date}}
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" style="color: green;">
                    Class Book:
                </th>
                <td class="px-6 py-4 " style="font-weight: bold;">
                    {{$book->categorie}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
    </div>
</a>

<a href="{{route('readbook' , $book->id)}}" target="_blank" style="width:240px;  margin:10px auto;"><button class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block; width:240px;">
    قراءة الكتاب
</button></a>

<a href="{{route('uploadpdf' , $book->id)}}" style="width:240px;  margin: auto;"><button class="px-4 py-2  text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block; width:240px;">
    تحميل الكتاب
</button></a>

<div style="margin: auto; display:flex;">
<p style="color: rgb(87, 110, 40); font-weight:bold;">Categorie:</p>
<kbd style="display: inline-block; width:50px; margin-bottom:5px; padding:3px;" class="dark:text-gray-400 px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">{{$book->categorie}}</kbd>
</div>
<button type="button" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
    <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
    <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
    </svg>
    Extra small
    </button>


@endsection