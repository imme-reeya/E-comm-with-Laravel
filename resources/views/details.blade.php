@extends('layouts.default')

@section('title', 'E-comm Homepage')

@section('content')
    <main class="container" style="max-width: 900px">
        <section>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <img src="{{ $products->image }}" width="60%">
            <h2>{{ $products->title }}</h2>
            <p>{{ $products->description }}</p>
            <p><b>Price:</b>{{ $products->price }}</p>
            <a href="{{ route('carts.add', $products->id) }}" class="btn btn-success">Addto cart</a>
        </section>
    </main>
@endsection
