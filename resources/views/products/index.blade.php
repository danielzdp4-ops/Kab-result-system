<!DOCTYPE html>
<html>
<head>
<title>Inventory System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
<h2 class="text-center mb-4">📦 My Inventory System - Kampala</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card mb-4">
<div class="card-header bg-primary text-white">Add New Product</div>
<div class="card-body">
<form method="POST" action="{{ route('products.store') }}">
@csrf
<div class="row">
<div class="col-md-3"><input name="name" class="form-control" placeholder="Product Name *" required></div>
<div class="col-md-2"><input name="sku" class="form-control" placeholder="SKU"></div>
<div class="col-md-1"><input name="quantity" type="number" class="form-control" placeholder="Qty *" required></div>
<div class="col-md-2"><input name="buying_price" type="number" step="0.01" class="form-control" placeholder="Buy Price *" required></div>
<div class="col-md-2"><input name="selling_price" type="number" step="0.01" class="form-control" placeholder="Sell Price *" required></div>
<div class="col-md-2"><input name="category" class="form-control" placeholder="Category"></div>
</div>
<div class="mt-2"><input name="description" class="form-control" placeholder="Description (optional)"></div>
<button class="btn btn-primary mt-3 w-100">+ Add Product</button>
</form>
</div>
</div>

<div class="card">
<div class="card-header">Stock List - Total Products: {{ $products->count() }} | Total Value: UGX {{ number_format($products->sum(fn($p)=> $p->quantity * $p->buying_price)) }}</div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead><tr><th>Name</th><th>SKU</th><th>Qty</th><th>Buy</th><th>Sell</th><th>Profit</th><th>Category</th><th>Action</th></tr></thead>
<tbody>
@forelse($products as $p)
<tr class="{{ $p->quantity <= 5 ? 'table-danger' : '' }}">
<td>{{ $p->name }}</td>
<td>{{ $p->sku }}</td>
<td>{{ $p->quantity }} @if($p->quantity <=5) <span class="badge bg-danger">Low!</span> @endif</td>
<td>{{ $p->buying_price }}</td>
<td>{{ $p->selling_price }}</td>
<td class="text-success">+{{ $p->selling_price - $p->buying_price }}</td>
<td>{{ $p->category }}</td>
<td>
<form action="{{ route('products.destroy', $p) }}" method="POST" onsubmit="return confirm('Delete?')">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">X</button>
</form>
</td>
</tr>
@empty
<tr><td colspan="8" class="text-center">No products yet. Add one above!</td></tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>