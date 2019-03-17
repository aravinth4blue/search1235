<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Search Application</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    </head>
    <body>
    <div id="sucess"></div>
    <div id="error"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-8">

                <div class="form-group">
                Add topic
                <form>
                    <label for="topicName">Topic </label>
                    <input type="text" class="form-control" name="topic" id="topic">
                </div>
                <div class="form-group">
                    <select class="form-control" name="unmap-data" id="data">
                    @foreach ($datas as $data)
                            <option value ="{{$data->ID}}">{{$data->articles_source_name}}</option>
                    @endforeach

                        
                    </select>
                    </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="topic-add-btn">
                    Add
                    </button>
                </form>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-8">
                Search By topic
                <form>
                 <div class="form-group">
                    <select class="form-control" name="unmap-data" id="search-topic">
                    @foreach ($topics as $topic)
                            <option value ="{{$topic->id}}">{{$topic->name}}</option>
                    @endforeach

                        
                    </select>
                    </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="topic-search-btn">
                    Search
                    </button>
                </div>
                </form>
                
            </div>
        </div>
        <div class="row" id="topic-results">
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-8">

                <div class="form-group">
                Advanced Search By Date
                <form>
                    <label for="fromDate">From </label>
                    <input type="text" class="form-control" name="fromdte" id="from-date">
                    </div>
                    <div class="form-group">
                        <label for="toDate">To </label>
                        <input type="text" class="form-control" name="todte" id="to-date">
                    </div>
                    <div class="form-group">
                    <select class="form-control" name="url" id="domain">
                    @foreach ($domains as $domain)
                            <option>{{$domain->articles_source_name}}</option>
                    @endforeach

                        
                    </select>
                    </div>
                    <div class="form-group">
                    <button type="button" class="btn btn-primary" id="topic-advanced-btn">
                    Advanced Search
                    </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="topic-advanced-results">
        </div>
    </body>
    <script>
        $(document).ready(function() {
                $('#from-date').datepicker();
                $('#to-date').datepicker();
                $('#topic-add-btn').click(function(){
                    topic =$("#topic").val()
                    dataId = $("#data").val()
                $.ajax({
                    url: "/saveTopic",
                    type: 'POST',
                    data: {topic : topic,dataId : dataId},
                    dataType: 'json',
                    success: function (data) {
                        alert(data.status);
                        $("#sucess").html("Topic saved sucessfully")
                        
                }
                });
                });
                $("#topic-search-btn").click(function(){
                    topicId = $("#search-topic").val();
                    $.ajax({
                    url: "/getTopic",
                    type: 'POST',
                    data: {topicId : topicId},
                    dataType: 'html',
                    success: function (data) {
                        //alert(data.status);
                        $("#topic-results").html(data)
                        
                    }
                });

                });
                $("#topic-advanced-btn").click(function(){
                    alert("btn clicked")
                    frmdte = $("#from-date").val();
                    todte = $("#to-date").val();
                    alert(todte)
                    domain = $("#domain").val();
                    $.ajax({
                    url: "/getData",
                    type: 'POST',
                    data: {strDate : frmdte,endDate : todte,domain : domain},
                    dataType: 'html',
                    success: function (data) {
                        //alert(data.status);
                        $("#topic-advanced-results").html(data)
                        
                    }
                });

                });
        });
    </script>
</html>
