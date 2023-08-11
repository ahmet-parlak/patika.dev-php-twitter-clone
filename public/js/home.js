/* Post Tweet */
const tweetForm = document.getElementById('tweet-form');
const submitBtn = document.querySelector("#tweet-form [type='submit']");
tweetForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const actionURL = tweetForm.getAttribute('action');
    const content = document.getElementById('tweet_content').value;
    const formData = new FormData();

    formData.append('tweet_content', content);
    submitBtn.disabled = true; //prevent consecutive submission of the form 

    if (content.length > 0 & content.length < 180) {

        //post
        axios.post(actionURL, formData).then(res => {
            toast(res.data.status, res.data.message);
            if (res.data.redirect) {
                window.location.href = res.data.redirect;
            }

        }).catch(function (error) {
            console.log(error.response.status);
        }).then(() => {
            submitBtn.disabled = false;
        });
    } else {
        submitBtn.disabled = false;
    }

});
/* #Post Tweet# */


/* Tweet Content Length */
function charCount(e) {
    const element = document.getElementById('char-count');
    const charCount = e.value.length;
    let content = '';
    if (charCount > 0) {
        submitBtn.disabled = false;
        content = `${charCount}/180`;
    } else {
        submitBtn.disabled = true;
    }
    element.innerHTML = content;

}
/* #Tweet Content Length# */