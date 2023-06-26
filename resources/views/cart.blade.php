<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
<h1>Shopping Cart</h1>
    <div id="cart-items">
        <div class="row">
        @foreach($items as $item)
                <div>{{ $items }}</div>
        @endforeach
        </div>
    </div>

    <h2>Add Product</h2>
    <form id="add-form">
        <input type="text" name="product_name" placeholder="Nombre del producto">
        <input type="number" name="quantity" placeholder="Cantidad">
        <button type="submit">Add to the cart</button>
    </form>

    <h2>Actualizar producto</h2>
    <form id="update-form">
        <input type="hidden" name="product_id" value="">
        <input type="number" name="new_quantity" placeholder="Nueva cantidad">
        <button type="submit">Update</button>
    </form>

    <h2>Eliminar producto</h2>
    <form id="delete-form">
        <input type="hidden" name="product_id" value="">
        <button type="submit">Delete</button>
    </form>

@include('include.jsScript')
</body>
</html>
