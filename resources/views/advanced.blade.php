<div class="list-group">
<div class ="row">
@foreach ($filters as $filter)
<a href ={{$filter->articles_url}} class ="list-group-item list-group-item-action flex-column align-items-start" target="_blank">
    <div class="col-3"><img src ={{$filter->articles_url_to_image}} width="150" height="150"></img></div>
    <div class="col-3">{{$filter->articles_title}}</div>
    <div class="col-2">{{$filter->articles_source_name}}</div>
    <div class="col-2">{{$filter->articles_author}}</div>
    <div class="col-2">{{date("F j, Y",strtotime($filter->articles_published_at))}}</div>
</a>
@endforeach
</div>
</div>
{{ $filters->links() }}
