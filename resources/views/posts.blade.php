@extends('layouts.master')

@section('title')
    <title>Posts</title>
@endsection

@section('main-content')
    <section class="section-sm mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <aside class="col-lg-4 @@sidebar">
                    <!-- Search -->
                    {{-- <div class="widget">
                        <h4 class="widget-title"><span>Search</span></h4>
                        <form action="#!" class="widget-search">
                            <input class="mb-3" id="search-query" name="s" type="search"
                                placeholder="Type &amp; Hit Enter...">
                            <i class="ti-search"></i>
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </form>
                    </div> --}}

                    <!-- categories -->
                    <div class="widget widget-categories">
                        <h4 class="widget-title"><span>Categories</span></h4>
                        <ul class="list-unstyled widget-list">
                            @foreach ($categories as $category)
                                <x-category-list name="{{ $category->name }}" slug="{{ $category->slug }}"
                                    total="{{ $category->posts->count() }}" />
                            @endforeach
                        </ul>
                    </div><!-- tags -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Tags</span></h4>
                        <ul class="list-inline widget-list-inline widget-card">
                            <li class="list-inline-item"><a href="tags.html">programming</a></li>
                            <li class="list-inline-item"><a href="tags.html">server</a></li>
                            <li class="list-inline-item"><a href="tags.html">database</a></li>
                            <li class="list-inline-item"><a href="tags.html">web server</a></li>
                            <li class="list-inline-item"><a href="tags.html">dns</a></li>
                            <li class="list-inline-item"><a href="tags.html">backend</a></li>
                            <li class="list-inline-item"><a href="tags.html">frontend</a></li>
                            <li class="list-inline-item"><a href="tags.html">laravel</a></li>
                            <li class="list-inline-item"><a href="tags.html">php</a></li>
                            <li class="list-inline-item"><a href="tags.html">python</a></li>
                            <li class="list-inline-item"><a href="tags.html">javascript</a></li>
                            <li class="list-inline-item"><a href="tags.html">vertical scale</a></li>
                            <li class="list-inline-item"><a href="tags.html">horizontal scale</a></li>
                            <li class="list-inline-item"><a href="tags.html">load balancer</a></li>
                            <li class="list-inline-item"><a href="tags.html">nginx</a></li>
                            <li class="list-inline-item"><a href="tags.html">apache</a></li>
                            <li class="list-inline-item"><a href="tags.html">virtual host</a></li>
                        </ul>
                    </div><!-- recent post -->
                    <div class="widget">
                        <h4 class="widget-title">Recent Post</h4>

                        <!-- post-item -->
                        <article class="widget-card">
                            <div class="d-flex">
                                <img class="card-img-sm" src="{{ url('assets/img/post/post-10.jpg') }}">
                                <div class="ml-3">
                                    <h5><a class="post-title" href="post/elements/">Elements That You Can Use In This
                                            Template.</a></h5>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>15 jan, 2020
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>

                        <article class="widget-card">
                            <div class="d-flex">
                                <img class="card-img-sm" src="{{ url('assets/img/post/post-3.jpg') }}">
                                <div class="ml-3">
                                    <h5><a class="post-title" href="post-details.html">Advice From a Twenty Something</a>
                                    </h5>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>14 jan, 2020
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>

                        <article class="widget-card">
                            <div class="d-flex">
                                <img class="card-img-sm" src="{{ url('assets/img/post/post-7.jpg') }}">
                                <div class="ml-3">
                                    <h5><a class="post-title" href="post-details.html">Advice From a Twenty Something</a>
                                    </h5>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>14 jan, 2020
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Social -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Social Links</span></h4>
                        <ul class="list-inline widget-social">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                        </ul>
                    </div>
                </aside>
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <h2 class="h5 section-title">
                        {{
                            request()->filled('search') ? 'Posts by : '. request('search') . '' : 'All Posts'
                        }}
                        ({{ $posts->count() }})
                    </h2>
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-6 col-sm-6">
                                <x-vertical-post-card title="{{ $post->title }}" slug="{{ $post->slug }}"
                                    excerpt="{{ $post->excerpt }}" author="{{ $post->author->name }}"
                                    username="{{ $post->author->username }}"
                                    readDuration="{{ $post->readDuration() }}"
                                    publishedDate="{{ $post->published_at->diffForHumans() }}"
                                    categoryName="{{ $post->category->name }}" categorySlug="{{ $post->category->slug }}" views="{{ $post->views }}"
                                    likes="{{ $post->likes }}" />
                            </div>
                        @endforeach

                    </div>

                    <ul class="pagination justify-content-center">
                        <li class="page-item page-item active ">
                            <a href="#!" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#!" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#!" class="page-link">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
