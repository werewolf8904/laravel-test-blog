<div class="card comment-form">
    <div class="card-header">
        @lang('Post comment')
    </div>
    <div class="card-body">
        <form action="{{route('add-comment',[$type,$id]) }}" method="POST" enctype="multipart/form-data" data-ajax="1">
            @csrf
            <div class="form-group">
                <label for="comment-author"> @lang('Your name and surname') *</label>
                <input type="text" id="comment-author" name="author" class="form-control" required
                       value="">
                <span class="label__error text-danger"></span>
            </div>
            <div class="form-group">
                <label for="comment-content">@lang('Comment text')*</label>
                <textarea id="comment-content" name="content" class="form-control" required></textarea>
                <span class="label__error text-danger"></span>
            </div>
            <input class="btn btn-danger" type="submit" value="@lang('Post comment')">
        </form>
    </div>
</div>
