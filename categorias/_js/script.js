var inputFile = document.querySelector("#picture-input");
var pictureImage = document.querySelector(".picture-image");
var pictureImageTxt = "Escolha uma imagem";
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


var inputFileEdit = document.querySelector("#picture-input-edit");
var pictureImageEdit = document.querySelector(".picture-image-edit");
var pictureImageEditTxt = "Escolha uma imagem";
pictureImageEdit.innerHTML = pictureImageEditTxt;

inputFileEdit.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture-img");

      pictureImageEdit.innerHTML = "";
      pictureImageEdit.appendChild(img);
    });

    reader.readAsDataURL(file);
  } else {
    pictureImageEdit.innerHTML = pictureImageEditTxt;
  }
});
