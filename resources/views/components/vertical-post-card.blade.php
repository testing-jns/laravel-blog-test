
    <article class="card mb-4 p-3">
        <div class="post-slider slider-sm">
            <img src="{{ url('assets/img/post/post-1.jpg') }}" class="card-img-top" alt="post-thumb">
            <img src="{{ url('assets/img/post/post-1.jpg') }}" class="card-img-top" alt="post-thumb">
        </div>
        <div class="card-body" style="">
            <h3 class="h4 mb-3"><a class="post-title" href="{{ route('post', ['post' => $slug]) }}">{{ $title }}</a></h3>  
            <div class="card-meta mb-2">
                <a href="{{ route('author', ['author' => $username]) }}" class="card-meta-author">
                    <img src="{{ url('assets/img/kate-stone.jpg') }}" alt="{{ $categoryName }}" loading="lazy">
                    <span>{{ $author }}</span>
                </a>
            </div>
            <ul class="card-meta list-inline">
                <li class="list-inline-item">
                    <i class="ti-timer"></i>{{ $readDuration }} Min To Read
                </li>
                <li class="list-inline-item">
                    <i class="ti-calendar"></i>
                    {{ $publishedDate }}
                </li>
                <li class="list-inline-item">
                    <a href="{{ route('category', ['category' => $categorySlug]) }}" class="card-meta-author">
                    {{ $categoryName }}
                    </a>
                </li>
                <li class="list-inline-item">
                    <i class="ti-eye"></i>
                    {{ $views }}
                </li>
                <li class="list-inline-item">
                    <i class="ti-heart"></i>
                    {{ $likes }}
                </li>
            </ul>
            <div class="card-meta mb-2">
                <ul class="card-meta-tag list-inline">
                    <li class="list-inline-item"><a href="tags.html">Wow</a></li>
                    <li class="list-inline-item"><a href="tags.html">Tasty</a></li>
                </ul>
            </div>
            <p>{{ $excerpt }}</p>
            <a href="{{ route('post', ['post' => $slug]) }}" class="btn btn-outline-primary">Read More</a>
        </div>
    </article>
