//  working for notification pop-up

const notBtn = document.querySelector("#notification-btn");
let notBody = document.querySelector(".nofification-cont");
notBtn.addEventListener("click", () => {
  notBody.classList.toggle("active");
})
//  working for user pop-ups

const userbtn = document.querySelector("#user-btn");
let userBox = document.querySelector(".dp-box");
userbtn.addEventListener("click", () => {
  userBox.classList.toggle("active");
})
//  working for menu pop-up

const menubtn = document.querySelector("#bars");
let bodycont = document.querySelector(".body-cont");
menubtn.addEventListener("click", () => {
  console.log("suhs");
  bodycont.classList.toggle("active");
})
//  working for copy to clipboard
btns = document.querySelectorAll("button");
btns.forEach(btn => {
  btn.addEventListener("click", (e) => {
    index = e.target.getAttribute("data-index");
    // console.log(inputs[index-1]);
    input = document.querySelectorAll("#addreess")[index - 1];
    input.select();
    input.setSelectionRange(0, 9999);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
  });
});
