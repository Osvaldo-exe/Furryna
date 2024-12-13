document.addEventListener("DOMContentLoaded", function () {
    // Event listener untuk tombol "+" dan "-"
    document.addEventListener("click", function (event) {
        if (event.target.matches(".btn-quantity")) {
            const button = event.target;
            const parentDiv = button.closest(".quantity-wrapper");
            const input = parentDiv.querySelector(".quantity");
            const change = parseInt(button.getAttribute("data-change"));

            let quantity = parseInt(input.value) || 1;
            quantity = Math.max(1, quantity + change); // Pastikan minimal 1
            input.value = quantity;

            updateSummary(); // Panggil fungsi untuk memperbarui total harga
        }
    });

    // Event listener untuk input jumlah
    document.addEventListener("input", function (event) {
        if (event.target.matches(".quantity")) {
            const input = event.target;
            let quantity = parseInt(input.value) || 1;
            if (quantity < 1) {
                quantity = 1; // Pastikan nilai minimal 1
                input.value = quantity;
            }
            updateSummary(); // Perbarui total harga
        }
    });

    updateSummary();

    function updateSummary() {
        const cartItems = document.querySelectorAll(".cart-item");
        const totalPriceElement = document.getElementById("total-price");
        const finalPriceElement = document.getElementById('final-price');
        let totalPrice = 0;
        let finalPrice = 0;

        cartItems.forEach((item) => {
            const quantity = parseInt(item.querySelector(".quantity").value) || 1;
            const unitPrice = parseFloat(item.querySelector(".unit-price").getAttribute("data-price")) || 0;
            const itemPrice = quantity * unitPrice;

            totalPrice += itemPrice;
        });

        totalPriceElement.innerText = Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        }).format(totalPrice);

        finalPrice = totalPrice + 2000;

        finalPriceElement.innerText = Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        }).format(finalPrice);
    }
});
