$(document).ready(function() {

    getCartItems();

    $('#add-form').submit(function(event) {
        event.preventDefault();

        var productName = $('input[name="product_name"]').val();
        var quantity = $('input[name="quantity"]').val();

        $.ajax({
            url: '/api/cart/add',
            type: 'POST',
            data: {
                product_name: productName,
                quantity: quantity
            },
            dataType: 'json',
            success: function(response) {
                getCartItems();
            }
        });
    });

    $('#update-form').submit(function(event) {
        event.preventDefault();

        var productId = $('input[name="product_id"]').val();
        var newQuantity = $('input[name="new_quantity"]').val();

        $.ajax({
            url: '/api/cart/update',
            type: 'POST',
            data: {
                product_id: productId,
                new_quantity: newQuantity
            },
            dataType: 'json',
            success: function(response) {
                getCartItems();
            }
        });
    });

    $('#delete-form').submit(function(event) {
        event.preventDefault();

        var productId = $('input[name="product_id"]').val();

        $.ajax({
            url: '/api/cart/remove',
            type: 'POST',
            data: {
                product_id: productId
            },
            dataType: 'json',
            success: function(response) {
                getCartItems();
            }
        });
    });

    function getCartItems() {
        $.ajax({
            url: '/api/cart',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var cartItems = response.items;
                var html = '';

                for (var i = 0; i < cartItems.length; i++) {
                    html += '<div>' + cartItems[i].name + ' - ' + cartItems[i].price + '</div>';
                    html += '<button class="update-btn" data-product-id="' + cartItems[i].id + '">Actualizar</button>';
                    html += '<button class="delete-btn" data-product-id="' + cartItems[i].id + '">Eliminar</button>';
                }

                $('#cart-items').html(html);
            }
        });
    }

    $(document).on('click', '.update-btn', function() {
        var productId = $(this).data('product-id');
        $('input[name="product_id"]').val(productId);
    });

    $(document).on('click', '.delete-btn', function() {
        var productId = $(this).data('product-id');
        $('input[name="product_id"]').val(productId);
    });
});
