<div class="comments">
    <div class="row">
        @foreach($comments as $comment)
            <div class="col-12">
                <div class="card p-2">
                    <div class="comments__author">
                        <span>@lang('Author') : {{$comment->author}}</span>
                    </div>
                    <div class="comments__date">
                        <span>@lang('Posted') : {{$comment->created_at}}</span>
                    </div>
                    <span class="comments__text-header">@lang('Comment text')</span>
                    <div class="comments__text">
                        {{$comment->content}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{$comments->links()}}
</div>
