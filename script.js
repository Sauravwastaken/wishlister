navHandler("navMore", "hiddenNav");

modalHandler("addProductBtn", "addProductContainer", "closeModal");
modalHandler("addCatagoryBtn", "addCatagoryContainer", "closeCatagoryModal");

//! Editing Product

let editProductBtn = document.querySelectorAll(".data-table-edit");
// console.log(editProductBtn);
let editProductContainer = document.querySelector("#editProductContainer");
let closeEditProductModal = document.querySelector("#closeEditProductModal");

let editProductId = document.querySelector("#edit-product-id");
let editProductName = document.querySelector("#edit-product-name");
let editProductPrice = document.querySelector("#edit-product-price");
let editProductLink = document.querySelector("#edit-product-link");
console.log(editProductLink);
let editProductCatagory = document.querySelector("#edit-product-catagory");

Array.from(editProductBtn).forEach((element) => {
  element.addEventListener("click", () => {
    let product = element.parentElement.parentElement.children;
    let productId = product[0].id;
    let productName = product[0].textContent.trim();
    let productCatagory = product[1].id.slice(18);
    let productPrice = product[2].textContent.substring(1);
    let productLink = product[0].children[1];
    if (productLink) {
      productLink = productLink.href;
    } else {
      productLink = "";
    }

    editProductId.value = productId;
    editProductName.value = productName;
    editProductPrice.value = productPrice;
    editProductLink.value = productLink;
    editProductCatagory.value = productCatagory;

    editProductContainer.classList.add("showModal");
  });
});

closeEditProductModal.addEventListener("click", () => {
  editProductContainer.classList.remove("showModal");
});

//! Deleting Product

let deleteProductBtn = document.querySelectorAll(".data-table-delete");
let deleteProductContainer = document.querySelector("#deleteProductContainer");
let closeDeleteProductModal = document.querySelector(
  "#closeDeleteProductModal"
);
let deleteProductIdInput = document.querySelector("#delete-product-id");
Array.from(deleteProductBtn).forEach((element) => {
  console.log(element);
  element.addEventListener("click", () => {
    console.log(element.id.slice(16));
    deleteProductIdInput.value = element.id.slice(16);
    deleteProductContainer.classList.add("showModal");
  });
});

closeDeleteProductModal.addEventListener("click", () => {
  deleteProductContainer.classList.remove("showModal");
});

//! More highlight

let hiddenNav = document.querySelector("#hiddenNav");
let navMore = document.querySelector("#navMore");
Array.from(hiddenNav.children).forEach((element) => {
  console.log(element);
  if (element.classList.contains("nav-item-active")) {
    navMore.classList.add("nav-item-active");
  }
});

//! Function Definition

function navHandler(btn, container) {
  btn = document.querySelector(`#${btn}`);
  container = document.querySelector(`#${container}`);

  if (btn) {
    btn.addEventListener("click", () => {
      container.classList.toggle("show-hidden-nav");
    });
  }
}

function modalHandler(btn, container, close) {
  btn = document.querySelector(`#${btn}`);
  container = document.querySelector(`#${container}`);
  close = document.querySelector(`#${close}`);

  btn.addEventListener("click", () => {
    container.classList.add("showModal");
  });

  close.addEventListener("click", () => {
    container.classList.remove("showModal");
  });
}
