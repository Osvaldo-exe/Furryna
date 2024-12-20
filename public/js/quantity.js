// ================= Update Quantity ==================
function updateQuantity(button, change) {
  const quantityElement = document.getElementById('quantity');

  let quantity = parseInt(quantityElement.value);
  quantity = Math.max(1, quantity + change); // Prevent quantity < 1
  quantityElement.value = quantity;
  
  // Ensure the button content stays as "+" or "-"
  button.innerText = change > 0 ? "+" : "-";
  updateSummary();
}

// ================= Update Summary ==================
function updateSummary() {
  const cartItems = document.querySelectorAll(".row.main");
  const totalPriceElement = document.getElementById("total-price");
  let totalPrice = 0;

  cartItems.forEach((item) => {
      const quantity = document.getElementById('quantity').value;
      const unitPrice = document.getElementById('unitPrice').value;
      const itemPrice = quantity * unitPrice;

      totalPrice += itemPrice;
  });

  totalPriceElement.innerText = Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR'
  }).format(totalPrice); // Show only the total price
}

document.getElementById('cartForm').addEventListener('submit', function (event) {
  const quantity = document.getElementById('quantity').value;
  document.getElementById('hiddenQuantity').value = quantity;
});

// ================= Comments Section =================
document.addEventListener("DOMContentLoaded", updateSummary);

document.getElementById('post-comment').addEventListener('click', function () {
  const commentText = document.getElementById('commentText').value;

  if (commentText.trim() !== '') {
      const commentDiv = document.createElement('div');
      commentDiv.className = 'comment';
      commentDiv.textContent = commentText;

      const commentsDisplay = document.getElementById('commentsDisplay');
      commentsDisplay.appendChild(commentDiv);

      document.getElementById('commentText').value = '';
  } else {
      alert('Please write a comment before posting!');
  }
});