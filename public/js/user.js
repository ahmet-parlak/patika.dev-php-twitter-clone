function friendshipRequest(element) {
    const actionUrl = element.getAttribute('action');

    //post
    axios.post(actionUrl).then(res => {
        snackbar(res.data.message);

        if (res.data.status == 'success') {
            element.innerHTML = "Request Sent";
            element.onclick = null;
        }

        if (res.data.redirect) {
            window.location.href = res.data.redirect;
        }
    });
}