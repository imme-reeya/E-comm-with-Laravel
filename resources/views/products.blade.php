@extends('layouts.default')

@section('title', 'E-comm Homepage')

@section('content')
    <main class="container" style="max-width: 900px;">
        <section>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card  p-1 shadow-sm">
                            <img src="{{ $product->image }}" width="100%" alt="{{ $product->title }}">
                            <div>
                                <a href="{{ route('products.details', $product->slug) }}">{{ $product->title }}</a> |
                                <span>NPR. {{ $product->price }}</span>
                            </div>
                        </div> <!-- Closing card div -->
                    </div>
                @endforeach
            </div> <!-- Closing row div -->
            <div>
                {{-- //make change oh AppServiceProvider.php file to use ui of bootstrap --}}
                {{ $products->links() }}
            </div>
        </section>
    </main>
@endsection
