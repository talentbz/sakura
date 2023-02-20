<div class="row">
    @foreach($video as $row)
    <div class="col-xs-12 col-sm-6 col-md-3 video-list">
        {!! $row->url !!}
    </div>
    @endforeach
    <div class="pagination-wrapper">
        {!! $video->links() !!}
    </div>
</div>
