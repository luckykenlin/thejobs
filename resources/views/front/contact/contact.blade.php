@extends('layouts.front')
@section('title')
    <title> Contact - us </title>
@endsection
@section('header')
    <!-- Site header -->
    <header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
        <div class="container no-shadow">
            <h1 class="text-center">Contact us</h1>
            <p class="lead text-center">Say hi, drop a letter, and follow us in social media websites.</p>
        </div>
    </header>
    <!-- END Site header -->
@endsection
@section('content')
    <!-- Main container -->
    <main>

        <section>
            <div class="container">

                <div id="contact-map" style="height: 500px">
                </div>

                <br><br>

                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <h4>Contact form</h4>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control input-lg" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <h4>Information</h4>
                        <div class="highlighted-block">
                            <dl class="icon-holder">
                                <dt><i class="fa fa-map-marker"></i></dt>
                                <dd>3652 Seventh Avenue, Los Angeles, CA</dd>

                                <dt><i class="fa fa-phone"></i></dt>
                                <dd>(+1) 987 654 3210</dd>

                                <dt><i class="fa fa-fax"></i></dt>
                                <dd>(+1) 123 456 7890</dd>

                                <dt><i class="fa fa-envelope"></i></dt>
                                <dd>hi@yoursite.com</dd>
                            </dl>
                        </div>

                        <br>

                        <ul class="social-icons size-sm text-center">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>

                    </div>
                </div>

            </div>
        </section>


    </main>
    <!-- END Main container -->



    <script>
        function initMap() {
            var uluru = {lat: 40.720, lng: -73.990};
            var map = new google.maps.Map(document.getElementById('contact-map'), {
                zoom: 12,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVAwncBuc339f-5WDK6homl44ZSypdEk4&callback=initMap">
@endsection