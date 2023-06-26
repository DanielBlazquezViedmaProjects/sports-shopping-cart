<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
<h1>Shopping Cart</h1>
    <div id="cart-items">
        <div class="row" style="display: flex">
        @foreach($items as $item)
                <div class="p-5">{{ $item->name }}</div>
        @endforeach
        </div>
    </div>

    <h2>Add Product</h2>
    <form id="add-form">
        <input type="text" name="product_name" placeholder="Product Name">
        <input type="number" name="quantity" placeholder="Quantity">
        <button type="submit">Add to the cart</button>
    </form>

    <h2>Update Product</h2>
    <form id="update-form">
        <input type="hidden" name="product_id" value="">
        <input type="number" name="new_quantity" placeholder="New Quantity">
        <button type="submit">Update</button>
    </form>

    <h2>Delete Product</h2>
    <form id="delete-form">
        <input type="hidden" name="product_id" value="">
        <button type="submit">Delete</button>
    </form>

@include('include.jsScript')
</body>
</html>
