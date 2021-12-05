@extends('layouts.category-layout')

@section('title', 'Markedia - Marketing Blog Template :: Search')
@section('page-title')
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Search: {{$s}}</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
@endsection
@section('content')

    <div class="page-wrapper">
        <div class="blog-custom-build">
            @if($posts->count())
                @foreach($posts as $post)
                    <div class="blog-box wow fadeIn">
                        <div class="post-media">
                            <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">
                                <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span></span>
                                </div>
                                <!-- end hover -->
                            </a>
                        </div>
                        <!-- end media -->
                        <div class="blog-meta big-meta text-center">


                            <h4><a href="{{ route('posts.single', ['slug' => $post->slug]) }}"
                                   title="">{{ $post->title }}</a></h4>
                            {!! $post->description !!}
                            <small><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}"
                                      title="">{{ $post->category->title }}</a></small>
                            <small>{{ $post->getPostDate() }}</small>
                            <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->

                    <hr class="invis">
                @endforeach
            @else
                По запросу ничего не найдено X.X
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">


                <ul class="pagination justify-content-center">
                    <li class="page-item">{{ $posts->appends(['s'=>request()->s])->links() }}</li>
                    <li class="page-item">

                    </li>
                </ul>
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->

@endsection
@include('layouts.footer')
