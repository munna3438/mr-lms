@extends('layouts.admin.admin')
@section('style')
@endsection
@section('content')
<div class="">
    <h1 class="d_title">Update Student Information</h1>
</div>
<div class="d_content_box">

    <form action="{{route('admin.store.student',$student->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="form_group">
                <label for="studentName" class="from_lable">Student Name <span class="text-red-400 ">*</span></label>
                <input type="text" name="studentName" class="form_input @error('studentName') is-invalid @enderror" id="studentName" aria-describedby="titleHelp" placeholder="Enter Student Name" value="{{old('studentName',$student->studentName)}}">
                @error('studentName')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="studentEmail" class="from_lable">Student Email <span class="text-red-400 ">*</span></label>
                <input type="email" name="studentEmail" class="form_input @error('studentEmail') is-invalid @enderror" id="studentEmail" aria-describedby="titleHelp" placeholder="Enter Student Email" value="{{old('studentEmail',$student->studentEmail)}}">
                @error('studentEmail')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="studentPhone" class="from_lable">Student Phone <span class="text-red-400 ">*</span></label>
                <input type="text" name="studentPhone" class="form_input @error('studentPhone') is-invalid @enderror" id="studentPhone" aria-describedby="titleHelp" placeholder="Enter Student Phone" value="{{old('studentPhone',$student->studentPhone)}}">
                @error('studentPhone')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="studentGender" class="from_lable">Student Gender <span class="text-red-400 ">*</span></label>
                <input type="text" name="studentGender" class="form_input @error('studentGender') is-invalid @enderror" id="studentGender" aria-describedby="titleHelp" placeholder="Enter Student Gender" value="{{old('studentGender',$student->studentGender)}}">
                @error('studentGender')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="studentNID" class="from_lable">Student NID <span class="text-red-400 ">*</span></label>
                <input type="text" name="studentNID" class="form_input @error('studentNID') is-invalid @enderror" id="studentNID" aria-describedby="titleHelp" placeholder="Enter Student NID" value="{{old('studentNID',$student->studentNID)}}">
                @error('studentNID')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="form_group">
                <label for="studentAddress" class="from_lable" >Student Address</label>
                <textarea name="studentAddress" class="form_input @error('studentAddress') is-invalid @enderror"" rows="1" id="studentAddress" aria-describedby="descriptionHelp" placeholder="Enter Student Address">{{old('studentAddress',$student->studentAddress)}}</textarea>
                @error('studentAddress')
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
