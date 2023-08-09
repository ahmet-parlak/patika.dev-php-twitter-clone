const loginForm = document.getElementById('login-form');
const submitBtn = document.querySelector("input[type='submit']");
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const actionURL = loginForm.getAttribute('action');
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const formData = new FormData();

    formData.append('username', username);
    formData.append('password', password);

    submitBtn.disabled = true; //prevent consecutive submission of the form 

    //post
    axios.post(actionURL, formData).then(res => {
        if (res.data.redirect) {
            window.location.href = res.data.redirect;
        }
    });

});