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


/* Update Name */
const nameForm = document.getElementById('name-form');
const nameSubmitBtn = document.querySelector("#name-form [type='submit']");
const nameInput = document.getElementById('name');
let nameInitialValue = nameInput.value
nameForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const actionURL = nameForm.getAttribute('action');
    const name = nameInput.value;
    const formData = new FormData();

    nameSubmitBtn.disabled = true; //prevent consecutive submission of the form 
    if (name.length > 0 && nameInitialValue != name) {
        formData.append('name', name);
        //post
        axios.post(actionURL, formData).then(res => {
            if (res.data.status == 'success') {
                snackbar(res.data.message, 'check');
                nameSubmitBtn.disabled = false;
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
    nameInput.value = nameInitialValue
    nameSubmitBtn.disabled = false;

});
/* #Update Username# */


/* Update About */
const aboutForm = document.getElementById('about-form');
const aboutSubmitBtn = document.querySelector("#about-form [type='submit']");
const aboutInput = document.getElementById('about');
let aboutInitialValue = aboutInput.value
aboutForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const actionURL = aboutForm.getAttribute('action');
    const about = aboutInput.value;
    const formData = new FormData();

    aboutSubmitBtn.disabled = true; //prevent consecutive submission of the form 
    if (aboutInitialValue != about) {
        formData.append('about', about);
        //post
        axios.post(actionURL, formData).then(res => {
            if (res.data.status == 'success') {
                snackbar(res.data.message, 'check');
                aboutSubmitBtn.disabled = false;
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

    aboutSubmitBtn.disabled = false;

});
/* #Update Abput# */

