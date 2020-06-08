@extends('layout')
@section('content')

    <div class="card">
        <div class="card-header">
            @if($post->exists)
                {{$post->name}}
            @else
                @lang('Create post')
            @endif

        </div>
        <div class="card-body">
            <form action="{{ $post->exists?route("post.update",$post->id):route("post.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($post->exists?'PATCH':'POST')


                @include('_partials.inputs.input', [ 'name' => 'name','model'=>$post,'required'=>true])
                @include('_partials.inputs.textarea', [ 'name' => 'content','model'=>$post,'required'=>true])
                @include('_partials.inputs.file', [ 'name' => 'file','model'=>$post])
                @include('_partials.inputs.select', [ 'name' => 'posts_category_id','model'=>$post,'array'=>$categories,'required'=>true])

                <input class="btn btn-danger" type="submit" value="{{ $post->exists? __('Save'):__('Create') }}">
            </form>
        </div>
    </div>
@endsection
