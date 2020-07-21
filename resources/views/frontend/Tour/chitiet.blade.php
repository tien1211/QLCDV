@extends('frontend.layout.master')
@section('frontend_content')

<div class="roberto-rooms-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <!-- Single Room Details Area -->
                <div class="single-room-details-area mb-50">
                    <!-- Room Thumbnail Slides -->
                    <div class="room-thumbnail-slides mb-50">
                        <div id="room-thumbnail--slide" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/bg-img/48.jpg" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/bg-img/49.jpg" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/bg-img/50.jpg" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/bg-img/51.jpg" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/bg-img/52.jpg" class="d-block w-100" alt="">
                                </div>
                            </div>

                            <ol class="carousel-indicators">
                                <li data-target="#room-thumbnail--slide" data-slide-to="0" class="active">
                                    <img src="img/bg-img/48.jpg" class="d-block w-100" alt="">
                                </li>
                                <li data-target="#room-thumbnail--slide" data-slide-to="1">
                                    <img src="img/bg-img/49.jpg" class="d-block w-100" alt="">
                                </li>
                                <li data-target="#room-thumbnail--slide" data-slide-to="2">
                                    <img src="img/bg-img/50.jpg" class="d-block w-100" alt="">
                                </li>
                                <li data-target="#room-thumbnail--slide" data-slide-to="3">
                                    <img src="img/bg-img/51.jpg" class="d-block w-100" alt="">
                                </li>
                                <li data-target="#room-thumbnail--slide" data-slide-to="4">
                                    <img src="img/bg-img/52.jpg" class="d-block w-100" alt="">
                                </li>
                            </ol>
                        </div>
                    </div>

@endsection
