document.addEventListener("DOMContentLoaded", function() {
    function calculateTotalPrice() {
        const cartItems = document.querySelectorAll(".cart-item");
        let totalPrice = 0;
        let finalPrice = 0;
        let admin = 0;

        cartItems.forEach((item) => {
            const unitPriceElement = item.querySelector(".unit-price");
            const quantityElement = item.querySelector(".quantity");

            const unitPrice = parseFloat(unitPriceElement.getAttribute("data-price"));  // Harga per unit
            const quantity = parseInt(quantityElement.textContent);  // Jumlah barang

            const itemPrice = unitPrice * quantity; // Harga per item
            totalPrice += itemPrice; // Menambahkan harga per item ke total harga
        });

        // Menampilkan total harga
        const formattedTotal = totalPrice.toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR",
        });
        document.getElementById("total-price").textContent = formattedTotal;

        if(totalPrice === 0){
            admin = 0
        }
        else{
            admin = 2000
        }

        const formattedAdmin = admin.toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR",
        });
        document.getElementById("admin-price").textContent = formattedAdmin;

        finalPrice = totalPrice + admin;

        const formattedFinal = finalPrice.toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR",
        });
        document.getElementById("final-price").textContent = formattedFinal;
    }

    // Panggil fungsi untuk menghitung total harga setelah halaman dimuat
    calculateTotalPrice();
});
