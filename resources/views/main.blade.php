@extends('layouts.front')

@section('title')
    <title> Home </title>
@endsection

@section('content')
    <div role="main" class="main">
        <section style="height: 300px">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="font-weight-bold text-color-quaternary appear-animation animated fadeInUp appear-animation-visible"
                            data-appear-animation="fadeInUp" data-appear-animation-delay="0"><span
                                    class="text-color-primary">Get Up!</span> Challenge yourself today</h2>
                        <p class="appear-animation animated fadeInUp appear-animation-visible"
                           data-appear-animation="fadeInUp" data-appear-animation-delay="150">Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit. Ut sed sem ipsum. Proin efficitur dolor accumsan purus
                            varius tempus nec a nulla. Aliquam id vulputate massa, a rhoncus justo. Nunc luctus non
                            ipsum a cursus. Donec laoreet iaculis egestas. Nulla finibus sed ipsum a pretium. Mauris ut
                            nisl nec metus.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 center"></div>
                    <div class="col-md-6 center">
                        <form>
                            <div class="input-group input-group-lg">
                                <input class="form-control" placeholder="Search..." name="s" id="s" type="text">
                                <span class="input-group-btn">
											<button type="submit" class="btn btn-primary btn-lg"><i
                                                        class="fa fa-search"></i></button>
										</span>
                            </div>
                        </form>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-md-3 center"></div>
                </div><!-- /.row -->
            </div>
        </section>
    </div>
@endsection