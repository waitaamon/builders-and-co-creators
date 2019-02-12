@extends('layouts.app')

@section('content')
    <div id="carausel-section" class="container-fluid">
        <carousel-component></carousel-component>
    </div>
    <section id="statement" class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="h2 text-center font-weight-bold mt-5 mb-5">WELCOME TO OUR WEBSITE</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="font-weight-bold text-black-50 text-center">This is where we share, learn and get inspired for anything built or created.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="featured" class="mt-5 mb-5 pt-5">
        <div class="container">
            <div class="row section-header">
                <div class="col">
                    <h5 class="h5 text-center text-black-50 text-uppercase">Featured Articles</h5>
                </div>
                <div class="col">
                    <h5 class="h5 text-center text-black-50 text-uppercase">Featured Videos</h5>
                </div>
            </div>
            <div class="row section-body">
                @php
                    $articles = [1,2,3,4];
                    $videos = [1,2,3,4,5,6,7,8,9];
                @endphp
                <div class="col-sm12 col-md-7">
                    @foreach( $articles as $article)
                        <div class="row">
                            <div class="col-12 mt-5">
                                @include('website.widgets.article_card')
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm12 col-md-1"></div>
                <div class="col-sm12 col-md-4">
                    <div class="row">
                        @foreach( $videos as $video)
                            @include('website.widgets.video_card')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('website.subscribe')

    @include('website.footer')


@endsection
<script>
    import SubscribeForm from "../js/app/website/SubscribeForm";
    export default {
        components: {SubscribeForm}
    }
</script>