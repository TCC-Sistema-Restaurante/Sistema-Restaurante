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

/*  jQuery Nice Select - v1.0
    https://github.com/hernansartorio/jquery-nice-select
    Made by Hernán Sartorio  */


