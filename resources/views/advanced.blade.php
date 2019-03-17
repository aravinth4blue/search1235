

@foreach ($filters as $data)
    <div class="col-3"><img src ={{$data->articles_url_to_image}} width="100" height="40"></img></div>
    <div class="col-3">{{$data->articles_title}}</div>
    <div class="col-2">{{$data->articles_source_name}}</div>
    <div class="col-2">{{$data->articles_author}}</div>
    <div class="col-2">{{date("F j, Y",strtotime($data->articles_published_at))}}</div>
@endforeach
