@extends('app')

@section('content')

<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Admin Dashboard
      </h2>


      <!-- Responsive cards -->
      <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
      >
        Library Panel
      </h4>
      <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total clients
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
            <?php
            $pointer = 0;
            foreach ($users as $user) {
              $pointer++;
            }
          ?>
          {{$pointer}}
            </p>
          </div>
        </div>


        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total Book
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              <?php
                $pointer = 0;
                foreach ($data as $book) {
                  $pointer++;
                }
              ?>
              {{$pointer}}
            </p>
          </div>
        </div>



        <!-- Card -->
        <a href="{{route('bookmanager')}}">

          <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
          >
            <img width="22" height="22" src="https://img.icons8.com/3d-fluency/94/book.png" alt="book"/>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Book Manager
            </p>
          </div>
        </div> 
        </a>


            <!-- Card -->
            <a href="{{route('user.index')}}">

              <div
              class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
              <div
                class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
              >
              <img width="22" height="22" src="https://img.icons8.com/ultraviolet/40/user-male-circle.png" alt="user-male-circle"/></div>
              <div>
                <p
                  class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                  Users Manager
                </p>
              </div>
            </div> 
            </a>
  


      </div>

      <!-- Cards with title -->
      <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
      >
        Library Managment Information
      </h4>
      <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div
          class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            About Me 
          </h4>
          <p class="text-gray-600 dark:text-gray-400">
            my name is mahmoud atro, I am Web Developer and I studing  Computer Science in sham university .
          </p>
        </div>
        <div
          class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs"
        >
          <h4 class="mb-4 font-semibold">
            Library Information
          </h4>
          <p>
           this library  management system was created by Mahmoud Atro for his final project in computer science degree.Library Name : Al Manara Library</p>
          </p>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('title' , 'Dashboard Library')
    
