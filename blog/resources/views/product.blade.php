<!-- product-list.blade.php -->

@extends('layout.app')

@section('content')
<html>
<head>
    <title>Product Page</title>
    <style>
        /* CSS for Product Page */
        .product-page {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
        }
        
        .product-card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .product-image {
            width: 30%;
            height: auto;
            margin-bottom: 10px;
        }
        
        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .product-description {
            font-size: 14px;
            color: #777;
        }
        
        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
        
        /* CSS for Pagination */
        .pagination {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .pagination li {
            display: inline-block;
            margin: 0 5px;
        }
        
        .pagination li a {
            display: block;
            padding: 8px 12px;
            background-color: #f9f9f9;
            color: #333;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }
        
        .pagination li.active a {
            background-color: #333;
            color: #fff;
        }
        
        .pagination li a:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
<a href="/add" class="btn btn-primary">Create Product</a>

    <div class="product-page">
        @foreach ($products as $product)
            <div class="product-card">
                <img class="product-image" src="{{ $product->image }}" alt="Product Image">
                <h3 class="product-title">{{ $product->name }}</h3>
                <p class="product-description">{{ $product->description }}</p>
                <p class="product-price">{{ $product->price }}</p>
            </div>
        @endforeach
    </div>

    <!-- Display pagination links -->
    <div class="pagination">
     <!-- Displaying the products -->
@foreach ($products as $product)
    <!-- Display product details -->
@endforeach

<!-- Display pagination links with page numbers -->
@if ($products->lastPage() > 1)
    <ul class="pagination">
        @php
            $currentPage = $products->currentPage();
            $lastPage = $products->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
        @endphp

        <!-- Previous Page Link -->
        @if ($currentPage > 1)
            <li><a href="{{ $products->previousPageUrl() }}" rel="prev">Previous</a></li>
        @endif

        <!-- Page numbers -->
        @for ($page = $startPage; $page <= $endPage; $page++)
            <li class="{{ ($page == $currentPage) ? 'active' : '' }}">
                <a href="{{ $products->url($page) }}">{{ $page }}</a>
            </li>
        @endfor

        <!-- Next Page Link -->
        @if ($currentPage < $lastPage)
            <li><a href="{{ $products->nextPageUrl() }}" rel="next">Next</a></li>
        @endif
    </ul>
@endif

    </div>
</body>
</html>
@endsection
