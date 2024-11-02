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
    <h1 class="d_title">List Of Students</h1>
</div>
<div class="d_container_box">
    <div class="text-right block mb-4">
        <a href="{{route('admin.add.student')}}" class="btn_primary inline-block">Add New Student</a>
    </div>
    <div class="overflow-x-auto pb-3">
        <table class="">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Student Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>NID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $key=>$student)
                    <tr>
                        <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                        <td>{{$student->id}}</td>
                        <td>{{$student->studentName}}</td>
                        <td>{{$student->studentEmail}}</td>
                        <td class="text-nowrap">{{$student->studentPhone}}</td>
                        <td>{{$student->studentGender}}</td>
                        <td>{{$student->studentNID}}</td>
                        <td>
                            <div class="d_action_container">
                                <a href="{{route('admin.edit.student', $student->id)}}"
                                    class="d_action_button  bg_secondary hover:bg_secondary_light">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="{{route("admin.delete.student",$student->id)}}" onclick="return confirm('Are you sure delete catagory?')" class="d_action_button bg_primary hover:bg_primary_light" >

                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $students->links() }}
</div>

@endsection
@section('script')
@endsection
