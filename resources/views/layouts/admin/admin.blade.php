<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My First E-commerce Project</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

        <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @yield('style')
    </head>

    <body>
        <div class="h-screen flex">

            <div class="w-[300px] h-full bg_primary">
                <div class="admin_sidebar h-full">
                    <div class="overflow-y-auto relative">
                        <a href="{{ route('dashboard') }}" class="sidebar_logo">
                            <img class="h-full" src="{{asset('assets/image/lms-logo-white.png')}}" alt="logo">
                        </a>
                        <div class="sidebar_link_contanier">
                            <div class="accordion">
                                <div class="sidebar_link  dropdown_head {{request()->is('dashboard/books*') ? 'active' : '' }}">Books</div>
                                <div class="dropdown_inner mb-1 " style="{{request()->is('dashboard/books*') ? 'display:block':'none'}}">
                                    <a href="{{route('admin.add.books')}}" class="sidebar_link {{request()->is('dashboard/books/add') ? 'active' : '' }}">New Books</a>
                                    <a href="{{route('admin.list.books')}}" class="sidebar_link {{request()->is('dashboard/books/list') ? 'active' : '' }}">List Books</a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_link_contanier">
                            <div class="accordion">
                                <div class="sidebar_link  dropdown_head {{request()->is('dashboard/student*') ? 'active' : '' }}">Students</div>
                                <div class="dropdown_inner mb-1 " style="{{request()->is('dashboard/student*') ? 'display:block':'none'}}">
                                    <a href="{{route('admin.add.student')}}" class="sidebar_link {{request()->is('dashboard/student/add') ? 'active' : '' }}">New Student</a>
                                    <a href="{{route('admin.list.student')}}" class="sidebar_link {{request()->is('dashboard/student/list') ? 'active' : '' }}">List Students</a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_link_contanier">
                            <div class="accordion">
                                <div class="sidebar_link  dropdown_head {{request()->is('dashboard/book-issue*') ? 'active' : '' }}">Book Issue</div>
                                <div class="dropdown_inner mb-1 " style="{{request()->is('dashboard/book-issue*') ? 'display:block':'none'}}">
                                    <a href="{{route('admin.add.book-issue')}}" class="sidebar_link {{request()->is('dashboard/book-issue/add') ? 'active' : '' }}">New Issue</a>
                                    <a href="{{route('admin.list.book-issue')}}" class="sidebar_link {{request()->is('dashboard/book-issue/list') ? 'active' : '' }}">List Issues</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_setings">
                        {{-- <div class="accordion">
                            <div class="sidebar_link  dropdown_head">category</div>
                            <div class="dropdown_inner mb-1">
                                <a href="#" class="sidebar_link">New category</a>
                                <a href="#" class="sidebar_link">category List</a>
                            </div>
                        </div> --}}
                        <div class="sidebar_link ">Setting</div>
                    </div>
                </div>
            </div>
            <div class="w-[calc(100%-300px)] h-screen overflow-y-auto relative">
                <div class="sticky top-0 left-0 z-[100]">

                    @include('layouts.admin.header')
                </div>
                <div class="bg-[#F5F5F5] min-h-screen p-8">
                    @yield('content')
                </div>
                {{-- <div class="w-[calc(100%-300px)] fixed bottom-0 right-0"> --}}
                <div class="sticky bottom-0 left-0">
                    @include('layouts.admin.footer')
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
        <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/index.js') }}"></script>
        @yield('script')
        @livewireScripts
    </body>

</html>
