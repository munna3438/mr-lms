@extends('layouts.admin.admin')
@section('style')
@endsection
@section('content')
<div class="">
    <h1 class="d_title">Update Issue Book</h1>
</div>
<div class="d_content_box">

    <form action="{{route('admin.store.book-issue')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="form_group">
                <label for="bookID" class="from_lable">Book ID<span class="text-red-400 ">*</span></label>
                <select name="bookID" class="form_input @error('bookID') is-invalid @enderror" id="bookID" aria-describedby="titleHelp">
                    <option value="">--Select Book--</option>
                    @foreach ($books as $book)
                        <option value="{{$book->id}}" @if (old('bookID',$book->id) == $book->id) selected @endif >{{$book->bookName}}({{$book->id}})</option>
                    @endforeach
                </select>
                @error('bookID')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="studentID" class="from_lable">Student ID <span class="text-red-400 ">*</span></label>
                <select name="studentID" class="form_input @error('studentID') is-invalid @enderror" id="studentID" aria-describedby="titleHelp">
                    <option value="">--Select Book--</option>
                    @foreach ($students as $student)
                        <option value="{{$student->id}}" @if (old('student',$student->id) == $student->id) selected @endif >{{$student->studentName }}({{$student->id}})</option>
                    @endforeach
                </select>
                @error('studentID')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="issueDate" class="from_lable">Issue Date<span class="text-red-400 ">*</span></label>
                <input disabled readonly type="date" name="issueDate" class="form_input bg-gray-200 @error('issueDate') is-invalid @enderror" id="issueDate" value="{{$bookIssue->issueDate}}" >
                @error('issueDate')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="returnDate" class="from_lable">Return Date<span class="text-red-400 ">*</span></label>
                <input type="date" name="returnDate" class="form_input @error('returnDate') is-invalid @enderror" id="returnDate" aria-describedby="titleHelp" value="{{old('returnDate',$bookIssue->returnDate)}}">
                @error('returnDate')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-right mt-6">
            <button type="submit" class="btn_primary px-10">Submit</button>
        </div>
    </form>
</div>
@endsection
@section('script')
@endsection
