$(document).ready(function () {

    loadCart();
    loadWishlist();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // menampilkanJumlahItemproductYangAdaDiKeranjang
    function loadCart() {

        // tambahkanItemDiBadgeKeranjang
        $.ajax({
            method: "get",
            url: "/load-cart-count",
            success: function (response) {
                $('.cartCount').html('');
                $('.cartCount').html(response.count);
            }
        });
    }

    function loadWishlist() {

        // tambahkanItemDiBadgeWishlist
        $.ajax({
            method: "get",
            url: "/load-wishlist-count",
            success: function (response) {
                $('.wishlistCount').html('');
                $('.wishlistCount').html(response.count);
            }
        });
    }

    $(".addToCartBtn").click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.quantityBtn').val();

        // urlToRedirectOnAddedProductToCart
        $.ajax({
            method: "post",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty
            },
            success: function (response) {
                swal(response.success);

                // mengembalikanItemBadgeKeranjangSemula
                loadCart();
            }
        });
    })

    // addToWishlist
    $(".addToWishlist").click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: "post",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id
            },
            success: function (response) {
                swal(response.success);

                // mengembalikanItemBadgeWishlist
                loadWishlist();
            }
        });
    })

    // addProductInUserCart
    $(".incrementBtn").click(function (e) {
        e.preventDefault();
        var incrementValue = $(this).closest(".product_data").find('.quantityBtn').val();
        var value = parseInt(incrementValue, 10);
        value = isNaN(value) ? 0 : value;

        if (value < 10) {
            value++;
            $(this).closest(".product_data").find('.quantityBtn').val(value);
        }
    })

    // minProductInUserCart
    $(".decrementBtn").click(function (e) {
        e.preventDefault();
        var decrementValue = $(this).closest(".product_data").find('.quantityBtn').val();
        var value = parseInt(decrementValue, 10);
        value = isNaN(value) ? 0 : value;

        if (value > 1) {
            value--;
            $(this).closest(".product_data").find('.quantityBtn').val(value);
        }
    })


    // deleteCart
    $(".deleteCartBtn").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find('.prod_id').val();

        $.ajax({
            method: "post",
            url: "/delete-to-cart",
            data: {
                'prod_id': prod_id
            },
            success: function (response) {
                window.location.reload();
                swal(response.success);
            }
        });
    })

    // deleteWishlist
    $(".removeWishlistItem").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find('.prod_id').val();

        $.ajax({
            method: "post",
            url: "/delete-to-wishlist",
            data: {
                'prod_id': prod_id
            },
            success: function (response) {
                window.location.reload();
                swal(response.success);
            }
        });
    })

    // totalPrice * qtyProduct
    $(".changeQtyBtn").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find('.prod_id').val();
        var qty = $(this).closest(".product_data").find('.quantityBtn').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty
        }

        $.ajax({
            method: "post",
            url: "/update-to-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });
    })

});
