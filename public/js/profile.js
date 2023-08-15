/* Update Username */
const usernameForm = document.getElementById('username-form');
const usernameSubmitBtn = document.querySelector("#username-form [type='submit']");
const usernameInput = document.getElementById('username');
let usernameInitialValue = usernameInput.value
usernameForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const actionURL = usernameForm.getAttribute('action');
    const username = usernameInput.value;
    const formData = new FormData();

    usernameSubmitBtn.disabled = true; //prevent consecutive submission of the form 
    if (username.length > 0 && usernameInitialValue != username) {
        formData.append('username', username);
        //post
        axios.post(actionURL, formData).then(res => {
            if (res.data.status == 'success') {
                snackbar(res.data.message, 'check');
                usernameSubmitBtn.disabled = false;
                isSuccess = true;
            } else {
                snackbar(res.data.message, 'circle-exclamation');
            }

            if (res.data.redirect) {
                location.href = res.data.redirect;
            }
        }).catch(function (error) {
            snackbar(error.response.status, 'triangle-exclamation');
        })
    }
    usernameInput.value = usernameInitialValue
    usernameSubmitBtn.disabled = false;

});
/* #Update Username# */