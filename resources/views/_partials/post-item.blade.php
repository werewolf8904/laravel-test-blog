<div class="col-md-4">
    <div class="card p-1 post-item">
        <div class="h3">{{$post->name}}</div>
        <div>
            <a href="{{route('post.show',$post->id)}}" class="btn btn-info">@lang('Show')</a>
            <a href="{{route('post.edit',$post->id)}}" class="btn btn-secondary">@lang('Edit')</a>
            <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                  onsubmit="return confirm('@lang('Are your shoure?')');" style="display: inline-block;">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-xs btn-danger" value="@lang('Delete')">
            </form>
        </div>
    </div>
</div>
