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
                if (res.data.redirect) {
                    location.href = res.data.redirect + `?status=${res.data.status}&message=${res.data.message}&ic=check`;
                } else {
                    snackbar(res.data.message, 'check');
                    usernameSubmitBtn.disabled = false;
                }

            } else {
                if (res.data.redirect) {
                    location.href = res.data.redirect + `?status=${res.data.status}&message=${res.data.message}`;
                }
                snackbar(res.data.message, 'circle-exclamation');
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
                if (res.data.redirect) {
                    location.href = res.data.redirect + `?status=${res.data.status}&message=${res.data.message}&ic=check`;
                } else {
                    snackbar(res.data.message, 'check');
                    nameSubmitBtn.disabled = false;
                }


            } else {
                if (res.data.redirect) {
                    location.href = res.data.redirect + `?status=${res.data.status}&message=${res.data.message}`;
                }
                snackbar(res.data.message, 'circle-exclamation');
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
                if (res.data.redirect) {
                    location.href = res.data.redirect + `?status=${res.data.status}&message=${res.data.message}&ic=check`;
                } else {
                    snackbar(res.data.message, 'check');
                    aboutSubmitBtn.disabled = false;
                }


            } else {
                if (res.data.redirect) {
                    location.href = res.data.redirect;
                }
                snackbar(res.data.message, 'circle-exclamation');
            }

        }).catch(function (error) {
            snackbar(error.response.status, 'triangle-exclamation');
        })
    }

    aboutSubmitBtn.disabled = false;

});
/* #Update About# */


/* Update Password */
const passwordForm = document.getElementById('password-form');
const passwordSubmitBtn = document.querySelector("#password-form [type='submit']");

passwordForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const actionURL = passwordForm.getAttribute('action');
    const currentPasswordInput = document.getElementById('current_password');
    const currentPassword = currentPasswordInput.value;

    const newPasswordInput = document.getElementById('new_password');
    const newPassword = newPasswordInput.value;

    const confirmNewPasswordInput = document.getElementById('confirm_new_password');
    const confirmNewPassword = confirmNewPasswordInput.value;
    const formData = new FormData();

    passwordSubmitBtn.disabled = true; //prevent consecutive submission of the form 
    formData.append('current_password', currentPassword);
    formData.append('new_password', newPassword);
    formData.append('confirm_new_password', confirmNewPassword);
    //post
    axios.post(actionURL, formData).then(res => {
        if (res.data.status == 'success') {
            if (res.data.redirect) {
                location.href = res.data.redirect + `?status=${res.data.status}&message=${res.data.message}&ic=check`;
            } else {
                snackbar(res.data.message, 'check');
                passwordSubmitBtn.disabled = false;
                currentPasswordInput.value = '';
                newPasswordInput.value = '';
                confirmNewPasswordInput.value = '';
            }
        } else {
            if (res.data.redirect) {
                location.href = res.data.redirect;
            }
            snackbar(res.data.message, 'circle-exclamation');

        }


    }).catch(function (error) {
        snackbar(error.response.status, 'triangle-exclamation');
    })

    passwordSubmitBtn.disabled = false;

});
/* #Update Password# */


/* Update Profile Photo */
const photoForm = document.getElementById('photo-form');
const photoSubmitBtn = document.querySelector("#photo-form [type='submit']");

photoForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const actionURL = photoForm.getAttribute('action');
    const photoInput = document.getElementById('current_password');
    const photo = photoInput.value;

    const formData = new FormData();

    passwordSubmitBtn.disabled = true; //prevent consecutive submission of the form 
    formData.append('photo', photo);
    //post
    axios.post(actionURL, formData).then(res => {
        if (res.data.status == 'success') {
            if (res.data.redirect) {
                location.href = res.data.redirect + `?status=${res.data.status}&message=${res.data.message}&ic=check`;
            } else {
                snackbar(res.data.message, 'check');
                passwordSubmitBtn.disabled = false;
            }
        } else {
            if (res.data.redirect) {
                location.href = res.data.redirect;
            } else {
                snackbar(res.data.message, 'circle-exclamation');
            }
        }
    }).catch(function (error) {
        snackbar(error.response.status, 'triangle-exclamation');
    })

    passwordSubmitBtn.disabled = false;

});
/* #Update Profile Photo# */

