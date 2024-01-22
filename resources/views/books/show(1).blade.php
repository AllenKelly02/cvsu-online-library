@extends('layouts.subscribers.SubsApp')

@section('content')
<style>
.user-name {
color: #ff0000;
font-weight: bold;
}

.product-image {
max-width: 100px;
max-height: 100px;
}

.order-table {
width: 100%;
margin-top: 20px;
}

.verify-btn {
margin-top: 10px;
}
</style>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Dashboard</div>

<div class="card-body">
@if ($orders->isEmpty())
<p>No orders with the selected status.</p>
@else
<table class="table order-table">
<thead>
<tr>
<th>Order ID</th>
<th>User</th>
<th>Product Image</th>
<th>Quantity</th>
<th>Status</th>
<th>Select</th>
<th>Action</th>
<!-- Add more columns as needed -->
</tr>
</thead>
<tbody>
@foreach ($orders as $order)
<tr>
<td>{{ $order->id }}</td>
<td>{{ $order->user->name }}</td>
<td>
<img src="{{ asset('storage/' . $order->product->image) }}" alt="Product Image" class="product-image">
</td>
<td>{{ $order->quantity }}</td>
<td>{{ $order->status }}</td>
<td>
<div class="mb-3">
<select class="form-select verification-status" data-order-id="{{ $order->id }}">
<option value="On Process">Verify On Process</option>
<option value="For Delivery">Verify For Delivery</option>
<option value="Delivered">Verify Delivered</option>
</select>
<td><button class="btn btn-primary verify-btn" on
