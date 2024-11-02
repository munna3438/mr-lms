@extends('layouts.admin.admin')
@section('style')
@endsection
@section('content')
@if (session('success'))
<div class="alert_container">
    <p class=text-lg">{{session('success')}}</p>
    <button type="button" class="hide_area "><i class="fa-solid fa-x"></i></button>
</div>
@endif
<div class="">
    <h1 class="d_title">List Of Books</h1>
</div>
<div class="d_container_box">
    <div class="text-right block mb-4">
        <a href="{{route('admin.add.books')}}" class="btn_primary inline-block">Add New Book</a>
    </div>
    <div class="overflow-x-auto pb-3">
        <table class="">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Book Id</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $key=>$book)
                    <tr>
                        <td>{{ ($books->currentPage() - 1) * $books->perPage() + $loop->iteration }}</td>
                        <td>{{$book->id}}</td>
                        <td>{{$book->bookName}}</td>
                        <td>{{$book->authorName}}</td>
                        <td>{{$book->bookQuantity}}</td>
                        <td>
                            <div class="d_action_container">
                                <a href="{{route('admin.edit.books', $book->id)}}"
                                    class="d_action_button  bg_secondary hover:bg_secondary_light">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="{{route("admin.delete.books",$book->id)}}" onclick="return confirm('Are you sure delete catagory?')" class="d_action_button bg_primary hover:bg_primary_light" >

                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $books->links() }}
</div>

@endsection
@section('script')
@endsection
