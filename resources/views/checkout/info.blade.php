@extends('layouts.main')

@section('content')
    <checkout-info 
        transaction="{{ $transaction }}" 
        transaction_details="{{ $transaction->transaction_details }}"></checkout-info>
@endsection