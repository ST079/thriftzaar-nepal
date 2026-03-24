setTimeout(() => {
  document.querySelector(".alert")?.remove();
}, 5000);

document.querySelectorAll(".remove-from-cart").forEach((button) => {
  button.addEventListener("click", function () {
    const id = this.dataset.id;
    fetch("cart-process-remove.php?id=" + id)
      .then((response) => response.text())
      .then((data) => {
        if (data.trim() === "success") {
          location.reload();
        } else {
          alert("Failed to remove item.");
        }
      })
      .catch((error) => {
        alert("Something went wrong.");
      });
  });
});

const productValidate = () => {
  const product_name = document.getElementById("name");
  const buying_price = document.getElementById("cp");
  const selling_price = document.getElementById("sp");
  const description = document.getElementById("description");
  let error = 0;

  // Clear previous error messages
  document.getElementById("buying-price-error").innerText = "";
  document.getElementById("selling-price-error").innerText = "";

  if (product_name.value.length > 100 || product_name.value.length < 4) {
    document.getElementById("product-name-error").innerHTML =
      "Maximum 100 characters, Minimum 4 characters. No HTML or emoji allowed.";
    error++;
  }

  if (isNaN(buying_price.value) || parseFloat(buying_price.value) < 0) {
    document.getElementById("buying-price-error").innerText =
      "Buying price must be a number and cannot be negative.";
    error++;
  }

  if (isNaN(selling_price.value) || parseFloat(selling_price.value) < 0) {
    document.getElementById("selling-price-error").innerText =
      "Selling price must be a number and cannot be negative.";
    error++;
  }

  if (error == 0) {
    return true;
  }
  return false;
};

const categoryValidate = () => {
  const category_name = document.getElementById("cname");
  let error = 0;
  // Clear previous error messages
  document.getElementById("category-name-error").innerText = "";
  if (category_name.value.length > 50 || category_name.value.length < 3) {
    document.getElementById("category-name-error").innerHTML =
      "Maximum 50 characters, Minimum 3 characters.";
    error++;
  }
  if (error == 0) {
    return true;
  }
  return false;
};
