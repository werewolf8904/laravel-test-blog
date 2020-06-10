@extends('layout')
@section('breadcrumbs_items')
    <li class="breadcrumb-item active" aria-current="page">@lang('Posts Categories')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 p-2">
            <a href="{{route('posts-category.create')}}" class="btn btn-primary">@lang('Create new category')</a>
        </div>
    </div>
    <div class="row">
        @foreach($postsCategories as $postsCategory)
            <div class="col-md-4">
                <div class="card p-1 category-item">
                    <div class="h3">{{$postsCategory->name}}</div>
                    <div>
                        <a href="{{route('posts-category.show',$postsCategory->id)}}" class="btn btn-info">@lang('Show')</a>
                        <a href="{{route('posts-category.edit',$postsCategory->id)}}" class="btn btn-secondary">@lang('Edit')</a>
                        <form action="{{ route('posts-category.destroy', $postsCategory->id) }}" method="POST"
                              onsubmit="return confirm('@lang('Are your shoure?')');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger" value="@lang('Delete')">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination-list">
        {{$postsCategories->links()}}
    </div>
@endsection
