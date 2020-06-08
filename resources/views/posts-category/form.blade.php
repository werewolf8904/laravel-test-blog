@extends('layout')
@section('content')

    <div class="card">
        <div class="card-header">
            @if($postsCategory->exists)
                {{$postsCategory->name}}
            @else
                @lang('Create posts category')
            @endif

        </div>
        <div class="card-body">
            <form action="{{ $postsCategory->exists?route("posts-category.update",$postsCategory->id):route("posts-category.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($postsCategory->exists?'PATCH':'POST')


                        @include('_partials.inputs.input', [ 'name' => 'name','model'=>$postsCategory,'required'=>true])
                        @include('_partials.inputs.textarea', [ 'name' => 'description','model'=>$postsCategory])

                    <input class="btn btn-danger" type="submit" value="{{ $postsCategory->exists? __('Save'):__('Create') }}">
            </form>
        </div>
    </div>
@endsection
