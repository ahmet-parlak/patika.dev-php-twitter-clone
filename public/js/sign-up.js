/* Sign-up */

const signupForm = document.getElementById('sign-up-form');
const submitBtn = document.querySelector("input[type='submit']");
signupForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const actionURL = signupForm.getAttribute('action');
    const username = document.getElementById('username').value;
    const name = document.getElementById('name').value;
    const password = document.getElementById('password').value;
    const confirm_password = document.getElementById('confirm_password').value;
    const formData = new FormData();

    formData.append('username', username);
    formData.append('name', name);
    formData.append('password', password);
    formData.append('confirm_password', confirm_password);

    submitBtn.disabled = true; //prevent consecutive submission of the form 
    removeToast();
    loadingToggle();

    //post
    axios.post(actionURL, formData).then(res => {
        toast(res.data.status, res.data.message);
        if (res.data.redirect) {
            window.location.href = res.data.redirect;
        }
        submitBtn.disabled = false;
        loadingToggle();
    });

});