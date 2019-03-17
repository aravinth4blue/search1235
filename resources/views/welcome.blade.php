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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-8">

                <div class="form-group">
                Add topic
                <form>
                    <label for="topicName">Topic </label>
                    <input type="text" class="form-control" name="topic-add" id="topic">
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
                    <label for="topicName">Topic </label>
                    <input type="text" class="form-control" name="topic-name" id="search-topic">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="topic-search-btn">
                    Search
                    </button>
                </div>
                </form>
                
            </div>
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
    </body>
    <script>
        $(document).ready(function() {
                $('#from-date').datepicker();
                $('#to-date').datepicker();
        });
    </script>
</html>
