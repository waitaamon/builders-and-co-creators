@extends('layouts.app')

@section('content')
    <!-- featured
    ================================================== -->
    <section class="s-featured">
        <div class="row">
            <div class="col-md-12">
                <image-slider></image-slider>
            </div>
        </div>
    </section>
    <!-- end s-featured -->
    <section class="s-content">
        <div class="row entries-wrap wide">
            <div class="col text-center">
                <a href="{{ route('register') }}" class="btn btn-primary btn-outline-primary text-uppercase">Create Account</a>
            </div>
        </div>
    </section>
    <!-- s-content
   ================================================== -->
    <section class="s-content">
        <div class="row entries-wrap wide">
            <div class="entries">

                @forelse($posts as $post)

                    <article class="col-block">
                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="#" class="item-entry__thumb-link">
                                    @php
                                        $items = $post->media;
                                    @endphp
                                    <img src="{{ $items[0]->getFullUrl() }}"
                                         srcset="{{ $items[0]->getFullUrl() }} 1x, {{ $items[0]->getFullUrl() }} 2x"
                                         alt="">
                                </a>
                            </div>

                            <div class="item-entry__text">
                                <div class="item-entry__cat">
                                    <a href="#">{{ $post->topics[0]->title }}</a>
                                </div>

                                <h1 class="item-entry__title"><a href="">{{ $post->title }}</a></h1>
                                <p>{!! substr($post->body, 0, 200) !!} ...</p>

                                <div class="item-entry__date">
                                    <a href="#">{{ $post->publish_date }}</a>
                                    &n
                                    <a href="#">{{ $post->user->name }}</a>
                                </div>
                            </div>
                        </div> <!-- item-entry -->

                    </article> <!-- end article -->
                @empty
                    <p class="text-center">No posts!!</p>
                @endforelse

            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->

    </section>
    <!-- end s-content -->

    <!-- s-extra
    ================================================== -->
    <section class="s-extra">
        <div class="row">
            <div class="col-seven md-eight tab-full popular">
                <h3>Videos</h3>

            </div> <!-- end popular -->

            <div class="col-four md-four tab-full end">
                <div class="row">

                </div>
            </div>
        </div> <!-- end row -->

    </section>
    <!-- end s-extra -->
@endsection