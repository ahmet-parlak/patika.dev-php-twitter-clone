function friendshipRequest(element) {
    const actionUrl = element.getAttribute('action');

    //post
    axios.post(actionUrl).then(res => {
        snackbar(res.data.message);

        if (res.data.status == 'success') {
            element.innerHTML = 'Cancel  <i class="fa-solid fa-user-minus ml-2"></i>';
            element.setAttribute('title', 'Request Sent');
            element.onclick = cancelFriendshipRequest.bind(this, element);
        }

        if (res.data.redirect) {
            window.location.href = res.data.redirect;
        }
    });
}

function cancelFriendshipRequest(element) {
    const actionUrl = element.getAttribute('action');
    const formData = new FormData();

    formData.append('request', 'cancel');
    //post
    axios.post(actionUrl, formData).then(res => {
        snackbar(res.data.message);

        if (res.data.status == 'success') {
            element.innerHTML = 'Send Request  <i class="fa-solid fa-user-plus ml-2"></i>';
            element.setAttribute('title', 'Friendship Request');
            element.onclick = friendshipRequest.bind(this, element);
        }

        if (res.data.redirect) {
            window.location.href = res.data.redirect;
        }
    });
}

function acceptFriendshipRequest(element) {
    const actionUrl = element.getAttribute('action');
    const formData = new FormData();

    formData.append('request', 'accept');
    //post
    axios.post(actionUrl, formData).then(res => {
        snackbar(res.data.message);

        if (res.data.status == 'success') {
            element.innerHTML = 'Friends  <i class="fa-solid fa-user-group ml-2"></i>';
            element.setAttribute('title', 'Friendship Request');
            element.onclick = friendshipRequest.bind(this, element);
        }

        if (res.data.redirect) {
            window.location.href = res.data.redirect;
        }
    });
}

function rejectFriendshipRequest(element) {
    const actionUrl = element.getAttribute('action');
    const formData = new FormData();

    formData.append('request', 'reject');
    //post
    axios.post(actionUrl, formData).then(res => {
        snackbar(res.data.message);

        if (res.data.status == 'success') {
            element.innerHTML = 'Friends  <i class="fa-solid fa-user-group ml-2"></i>';
            element.setAttribute('title', 'Friendship Request');
            element.onclick = friendshipRequest.bind(this, element);
        }

        if (res.data.redirect) {
            window.location.href = res.data.redirect;
        }
    });
}

function unfriend(element) {
    const actionUrl = element.getAttribute('action');
    const formData = new FormData();

    formData.append('request', 'unfriend');
    //post
    axios.post(actionUrl, formData).then(res => {
        snackbar(res.data.message);

        if (res.data.status == 'success') {
            element.innerHTML = 'Friends  <i class="fa-solid fa-user-group ml-2"></i>';
            element.setAttribute('title', 'Friendship Request');
            element.onclick = friendshipRequest.bind(this, element);
        }

        if (res.data.redirect) {
            window.location.href = res.data.redirect;
        }
    });
}