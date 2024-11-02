@extends('layouts.admin.admin')
@section('style')
@endsection
@section('content')
<div class="">
    <h1 class="d_title">Update Book Information</h1>
</div>
<div class="d_content_box">

    <form action="{{route('admin.store.books',$book->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="form_group">
                <label for="bookName" class="from_lable">Book Name <span class="text-red-400 ">*</span></label>
                <input type="text" name="bookName" class="form_input @error('bookName') is-invalid @enderror" id="bookName" aria-describedby="titleHelp" placeholder="Enter Book Name" value="{{old('bookName',$book->bookName)}}">
                @error('bookName')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="authorName" class="from_lable">Author Name<span class="text-red-400 ">*</span></label>
                <input type="text" name="authorName" class="form_input @error('authorName') is-invalid @enderror" id="authorName" aria-describedby="titleHelp" placeholder="Enter Book Author Name" value="{{old('authorName',$book->authorName)}}">
                @error('authorName')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="bookQuantity" class="from_lable">Quantity <span class="text-red-400 ">*</span></label>
                <input type="text" name="bookQuantity" class="form_input  @error('bookQuantity') is-invalid @enderror" id="bookQuantity" aria-describedby="titleHelp" placeholder="Enter Book Quantity" value="{{old('bookQuantity',$book->bookQuantity)}}">
                @error('bookQuantity')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="bookDescription" class="from_lable" >Description</label>
                <textarea name="bookDescription" class="form_input" rows="1" id="bookDescription" aria-describedby="descriptionHelp" placeholder="Write Something">{{old('bookDescription',$book->bookDescription)}}</textarea>

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
