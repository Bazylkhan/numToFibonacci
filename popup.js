const popupLink = document.querySelector(".popupLink");
const popupBody = document.querySelector(".popup__body");
const x = document.querySelector(".popup__close");

popupLink.addEventListener("click", () => {
  popupBody.classList.toggle("opened");
  popupLink.classList.toggle("closed");
});

x.addEventListener("click", () => {
  popupBody.classList.toggle("opened");
  popupLink.classList.toggle("closed");
});
