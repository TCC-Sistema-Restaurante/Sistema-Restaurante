const inputFile = document.querySelector("#picture-input");
const pictureImage = document.querySelector(".picture-image");
const pictureImageTxt = "Escolha uma imagem";
pictureImage.innerHTML = pictureImageTxt;

inputFile.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture-img");

      pictureImage.innerHTML = "";
      pictureImage.appendChild(img);
    });

    reader.readAsDataURL(file);
  } else {
    pictureImage.innerHTML = pictureImageTxt;
  }
});

// Modals

const bg_modal = document.querySelector(".modals ");

// Add
var btn_add = document.querySelector("#btn-add");
const modal_add = document.querySelector(".modal-add");

btn_add.addEventListener("click", () => {
  bg_modal.style.display = "flex";
  modal_add.style.display = "flex";
});

//Delet
var btn_delet = document.querySelector(".edit-delet>#btn-delet");
const modal_delet = document.querySelector(".modal-delet");
btn_delet.addEventListener("click", () => {
  bg_modal.style.display = "flex";
  modal_delet.style.display = "flex";
});

var btn_cancel = document.querySelector("#btn-cancel");

btn_cancel.addEventListener("click", () => {
  bg_modal.style.display = "none";
  modal_add.style.display = "none";
  modal_delet.style.display = "none";
});
