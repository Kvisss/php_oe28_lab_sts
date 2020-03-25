@extends('admin.layouts.master')

@section('title', 'List Subject')

@section('content-header')
    {{ __('messages.list_course')}}
@stop
@section('content')
    <table id="example" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{ __('messages.number') }}</th>
            <th>{{ __('messages.title_subject') }}</th>
            <th>{{ __('messages.course') }}</th>
            <th>{{ __('messages.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $key => $value)
            <tr>
                <td>{{$key +1}}</td>
                <td>{{$value->title}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->created_at}}</td>
                <td>
                    <a href="{{route('subjects.edit', $value->subject_id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <form class="" action="{{route('courses.destroy', $value->subject_id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
