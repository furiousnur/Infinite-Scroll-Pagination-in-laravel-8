<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     <style>
        body {n kina diye asumne somossa nai
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Infinite Scroll Pagination</h2>
                </div>
                <div class="col-md-12" id="post-data">
                    @include('data')
                </div>
            </div>
        </div>
    </section>

    <div class="ajax-load text-center" style="display: none;">
        <p><img src="{{asset('loader/loader.gif')}}" alt=""> <br>Loading More Post</p>
    </div>

    <script>
        function loadMoreData(page){
            $.ajax({
                url: '?page=' + page,
                type: 'get',
                beforeSend: function (){
                    $(".ajax-load").show();
                }
            })
            .done(function (data){
                if (data.html == " "){
                    $('.ajax-load').html('No more records found');
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function (jqXHR,ajaxOptions,thrownError){
                alert('Server Not Responding..');
            })
        }

        var page = 1;
        $(window).scroll(function (){
           if ($(window).scrollTop() + $(window).height() >= $(document).height()){
               page++;
               loadMoreData(page);
           }
        });
    </script>
</body>
</html>
