@extends('layouts.master')

@section('scripts')
    <script>
        $(document).ready(function () {
            var msgContainer = $('.message-container');
            var picContainer = $('#meshos-pictures');
            var pageContainer = $('html,body');

            msgContainer.hide();
            picContainer.hide();

            var counter = 5;
            var pictures = [
                {
                    picture : 'images/mesho1.png',
                    message : 'This was a great day, seeing you for the first time.'
                },
                {
                    picture : 'images/mesho2.jpg',
                    message : 'Hahahahaha this was fun.'
                },
                {
                    picture : 'images/mesho3.jpg',
                    message : 'I like your big eyes eish they are too cute neh hahahahaha.'
                },
                {
                    picture : 'images/mesho4.jpg',
                    message : 'This is my favorite picture of you'
                },
                {
                    picture : 'images/mesho5.jpg',
                    message : 'Happy People :)'
                }
            ];
            var interval = setInterval(function(){

            $('.countdown > .actual-count').html(counter);
            counter--;


                if(counter == 0){
                    clearInterval(interval);
                    var countdown = $('.countdown');
                    countdown.addClass('animated rotateOut').delay(1000).queue(function () {
                        msgContainer.show();
                        pageContainer.animate({
                            scrollTop: msgContainer.offset().top
                        },700);

                        $('.happy').hide().delay(2000).queue(function () {
                            pageContainer.animate({
                                scrollTop: msgContainer.offset().top
                            },700);

                            $(this).show().animateCss('tada');
                        });

                        setTimeout(function () {
                            picContainer.show().animateCss('slideUp');
                            pageContainer.animate({
                                scrollTop: picContainer.offset().top
                            },500);

                            var index = 0;

                            var slideShow = setInterval(function () {
                                $('#m-pics-container').append("<div class='m-pic-wrapper"+index+" animated fadeIn'> <img src='"+ pictures[index].picture +"' class='img-fluid img-thumbnail shadow w3-margin' style='height:550px'><p  class='w3-padding-large w3-xlarge m-pic-caption"+index+" animated fadeIn'>"+ pictures[index].message +"</p> </div>");
                                pageContainer.animate({
                                    scrollTop: $(".m-pic-caption"+index).offset().top
                                },2000);

                                index++;

                                if(index == pictures.length) {
                                    clearInterval(slideShow);

                                    setTimeout(function () {
                                        var byeContainer = "<div class='d-flex flex-column bye-wrapper ' style='height:650px'><div class='align-self-center w3-jumbo bye animated wobble'>Stay Awesome <br> <i class='fa fa-birthday-cake fa-2x'></i> <br> <span class='w3-xxlarge'><i class='fa fa-copyright'></i> Weddie</span> </div> </div>";
                                        picContainer.append(byeContainer);

                                        pageContainer.animate({
                                            scrollTop: $('.bye').offset().top
                                        },1000);
                                    }, 2000);

                                }
                            }, 3000);




                        },5000)


                    });
                }
            },1000);
        });

    </script>
@endsection

@section('content')
    <div class="container w3-padding-large">
        <div class="countdown w3-center d-flex flex-column justify-content-around">
            <div class="w3-xxlarge p-2">In</div>
            <div class="actual-count" style="font-size:250px">T-minus</div>
            <div><i class="fa fa-circle-o-notch fa-spin fa-5x"></i></div>
        </div>

        <div class="message-container">
            <div class="w3-center">
                <h1>Hello Dear!</h1>
                <i class="fa fa-smile-o fa-5x w3-text-blue" style="font-size:200px;"></i>
            </div>

            <div class="w3-center">
                <span class="w3-xxlarge">I'd Like to wish you a </span>
                <br>
                <div style="display: inline-block;font-size:90px" class="w3-dark-gray w3-padding-large shadow w3-margin happy"><i class="fa fa-bullhorn"></i> Happy Birthday! <i class="fa fa-thumbs-o-up"></i></div>
            </div>
        </div>
    </div>

    <div id="meshos-pictures" class="w3-blue-gray w3-center w3-padding-large">
        <div class="w3-text-white w3-xxxlarge">The birthday girl in Pictures...</div>
        <div class="div-divider">

        </div>

        <div class="d-flex justify-content-center">
            <div id="m-pics-container" class="col-9">
            </div>
        </div>
    </div>
@endsection
