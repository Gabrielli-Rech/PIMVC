const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
})

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
})

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".form-box.register").scrollIntoView({ behavior: "smooth" });
});

window.scrollTo(0, document.body.scrollHeight);
