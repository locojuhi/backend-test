@extends('layouts.backoffice')
@section('page-header')
    Create Customers
@endsection
@section('content')
@include('alerts.alert')
@include('customers.form')

@endsection