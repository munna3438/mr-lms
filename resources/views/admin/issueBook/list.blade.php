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
    <h1 class="d_title">Book Issues List</h1>
</div>
<div class="d_container_box">
    <div class="text-right block mb-4">
        <a href="{{route('admin.add.book-issue')}}" class="btn_primary inline-block">New Book Issue</a>
    </div>
    <div class="overflow-x-auto pb-3">
        <table class="">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Book</th>
                    <th>Student </th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookIssues as $key=>$bookIssue)
                    <tr>
                        <td>{{($bookIssues->currentPage() - 1) * $bookIssues->perPage() + $loop->iteration }}</td>
                        <td>
                            @foreach ($books as $book)
                                @if ($book->id == $bookIssue->bookID){{$book->bookName}}
                                @endif
                            @endforeach
                            ({{$bookIssue->bookID}})
                        </td>
                        <td>
                            @foreach ($students as $student)
                                @if ($student->id == $bookIssue->studentID){{$student->studentName}}
                                @endif
                            @endforeach
                            ({{$bookIssue->studentID}})
                        </td>
                        <td>{{date('d M, Y', strtotime($bookIssue->issueDate))}}</td>
                        <td>{{date('d M, Y', strtotime($bookIssue->returnDate))}}</td>
                        <td>
                            <div class="d_action_container">
                                <a href="{{route('admin.edit.book-issue', $bookIssue->id)}}"
                                    class="d_action_button  bg_secondary hover:bg_secondary_light">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="{{route("admin.delete.book-issue",$bookIssue->id)}}" onclick="return confirm('Are you sure delete catagory?')" class="d_action_button bg_primary hover:bg_primary_light" >

                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $bookIssues->links() }}
</div>

@endsection
@section('script')
@endsection
