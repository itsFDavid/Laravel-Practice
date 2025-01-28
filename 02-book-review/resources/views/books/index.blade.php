@extends('layouts.app')


@section('content')
    <h1 class="mb-10 text-2xl">Books</h1>
    @csrf
    <form action="{{route('books.index')}}" method="GET" class="mb-4 flex items-center space-x-2">
        <input type="text" name="title" class="input h-10" placeholder="Search by title" value="{{request('title')}}">
        <input type="hidden" name="filter" value="{{request('filter')}}">
        <button type="submit" class="btn h-10">Search</button>
        <a href="{{route('books.index')}}" class="btn h-10">Reset</a>
    </form>

    <div class="mb-4 filter-container flex">
        @php
            $filters = [
                '' => 'Latest',
                'pupular_last_month' => 'Popular last month',
                'popular_last_6months' => 'Popular last 6 months',
                'highest_rated_last_month' => 'Highest rated last month',
                'highest_rated_last_6months' => 'Highest rated last 6 months'
            ];
        @endphp

        @foreach ($filters as $key => $label)
            <a href="{{route('books.index', [...request()->query(),'filter' => $key])}}"
                class="{{ request('filter') === $key || (request('filter') === null && $key === '')
                    ? 'filter-item-active' : 'filter-item' }}">
                {{$label}}
            </a>

        @endforeach
    </div>
    @if($books->count())
        <nav class="mt-4 mb-4">
            {{ $books->appends(request()->query())->links() }}
        </nav>
    @endif
    <ul>
        @forelse($books as $book)
            <li class="mb-4">
                <div class="book-item">
                    <div class="flex flex-wrap items-center justify-between">
                        <div class="w-full flex-grow sm:w-auto">
                            <a href="{{route('books.show', $book)}}" class="book-title">{{$book->title}}</a>
                            <span class="book-author">{{$book->author}}</span>
                        </div>
                        <div>
                            <div class="book-rating">
                                <x-star-rating :rating="$book->reviews_avg_rating"/>
                            </div>
                            <div class="book-review-count">out of {{$book->reviews_count}} {{Str::plural('review', $book->reviews_count)}}</div>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li class="mb-4">
                <div class="empy-book-item">
                    <p class="empy-text">No book found</p>
                    <a href="{{route('books.index')}}" class="reset-link">Reset criteria</a>
                </div>
            </li>
        @endforelse
    </ul>

@endsection
