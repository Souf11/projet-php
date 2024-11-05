document.addEventListener("DOMContentLoaded", () => {
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    const signUpForm = document.querySelector('.sign-up-container form');
    const signInForm = document.querySelector('.sign-in-container form');


    const showSignupPassword = document.getElementById('show-signup-password');
    const signupPasswordField = document.getElementById('signup-password');
    showSignupPassword.addEventListener('change', () => {
        signupPasswordField.type = showSignupPassword.checked ? 'text' : 'password';
    });

    const showLoginPassword = document.getElementById('show-login-password');
    const loginPasswordField = document.getElementById('login-password');
    showLoginPassword.addEventListener('change', () => {
        loginPasswordField.type = showLoginPassword.checked ? 'text' : 'password';
    });
});
