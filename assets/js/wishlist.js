function addToWishlist(productId) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/techhub-ecommerce/controllers/wishlistController.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        let res = JSON.parse(this.responseText);
        document.getElementById("wishlist_msg").innerText = res.message;
    };

    xhr.send("product_id=" + productId);
}
