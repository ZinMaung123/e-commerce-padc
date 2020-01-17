@extends('layouts.main')

@section('content')
    
    @foreach($products as $product)
        <product-list-item 
            image_url="{{$product->image_url}}" 
            detail_url="{{route('product.show',$product->id)}}">
                <template slot="name">{{$product->name}}</template>
                <template slot="description">{{$product->description}}</template>
        </product-list-item>                    
    @endforeach

@endsection