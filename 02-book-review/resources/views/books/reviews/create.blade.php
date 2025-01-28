@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl">Add Review for {{ $book->title}}</h1>

    <form action="{{route('books.reviews.store', $book)}}" method="POST">
        @csrf
        <label for="review">Review</label>
        <textarea name="review" id="review"  class="input mb-4"></textarea>
        @error('review')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

        <label for="rating">Rating</label>
        <select name="rating" id="rating" class="input mb-4" >
            <option value="" selected disabled> Select a Rating</option>
            @for($i = 1; $i<=5; $i++)
                <option value="{{$i}}">{{$i}} Stars</option>
            @endfor
        </select>
        @error('rating')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn">Add review</button>
    </form>
@endsection
