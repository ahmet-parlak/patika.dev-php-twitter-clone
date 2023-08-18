function friendshipRequest(element) {
    const actionUrl = element.getAttribute('action');

    //post
    axios.post(actionUrl).then(res => {
        snackbar(res.data.message);

        if (res.data.status == 'success') {
            element.innerHTML = 'Cancel  <i class="fa-solid fa-user-minus ml-2"></i>';
            element.setAttribute('title', 'Request Sent');
            element.onclick = cancelFriendshipRequest.bind(this, element);
            element.classList.add("hover:bg-red-500");
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
            element.classList.remove("hover:bg-red-500");
            element.onclick = friendshipRequest.bind(this, element);
            element.closest('div').querySelector('span')?.remove();
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
            element.parentElement.parentElement.querySelector('span')?.remove();

            const div = element.closest('div');
            div.innerHTML = '';
            div.innerHTML = `<button action="${actionUrl}"
            class="self-center bg-default h-min hover:bg-red-500 text-white py-2 px-5 rounded-full font-bold hover:shadow-xl"
            title="Unfriend" onclick="unfriend(this)">
            Unfriend<i class="fa-solid fa-user-minus ml-2"></i>
        </button>`;
            element.setAttribute('title', 'Unfriend');
            element.onclick = unfriend.bind(this, element);

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
            element.parentElement.parentElement.querySelector('span')?.remove();
            element.innerHTML = '<i class="fa-solid fa-trash"></i>';
            element.setAttribute('title', 'Remove');
            element.onclick = removeFriendshipRequest.bind(this, element);
        }
    });
}

function removeFriendshipRequest(element) {
    const actionUrl = element.getAttribute('action');
    const formData = new FormData();

    formData.append('request', 'remove');
    //post
    axios.post(actionUrl, formData).then(res => {
        snackbar(res.data.message);

        if (res.data.status == 'success') {
            element.parentElement.parentElement.querySelector('span')?.remove();
            const parent = element.parentElement;
            parent.innerHTML = `<button action="${actionUrl}"
            class="bg-default text-white py-2 px-5 rounded-full font-bold hover:shadow-xl hover:bg-blue-600"
            title="Friendship Request" onclick="friendshipRequest(this)">
            Send Request<i class="fa-solid fa-user-plus ml-2"></i>
        </button>`;
            parent.setAttribute('title', 'Friendship Request');
            parent.onclick = friendshipRequest.bind(this, parent);
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
            element.innerHTML = 'Send Request<i class="fa-solid fa-user-plus ml-2"></i>';
            element.setAttribute('title', 'Friendship Request');
            element.classList.remove("hover:bg-red-500");
            element.onclick = friendshipRequest.bind(this, element);
        }
        if (res.data.redirect) {
            window.location.href = res.data.redirect;
        }
    });
}