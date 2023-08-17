/* Load Flow */
function loadFlow(element) {
    const discoverBtn = document.querySelector("#discover");
    const friendsBtn = document.querySelector("#friends");
    discoverBtn.classList.toggle('flow-active');
    friendsBtn.classList.toggle('flow-active');
    const actionURL = element.getAttribute('action');

}
/* #Load Flow# */


/* Post Tweet */
const tweetForm = document.getElementById('tweet-form');
const submitBtn = document.querySelector("#tweet-form [type='submit']");
tweetForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const actionURL = tweetForm.getAttribute('action');
    const contentElement = document.getElementById('tweet_content');
    const content = contentElement.value;
    const formData = new FormData();

    submitBtn.disabled = true; //prevent consecutive submission of the form 

    if (content.length > 0 & content.length < 180) {
        formData.append('tweet_content', content);
        //post
        axios.post(actionURL, formData).then(res => {
            snackbar(res.data.message);
            if (res.data.status == 'success') {
                addTweet(res.data.data, true);
            }
        }).catch(function (error) {
            snackbar(error.response.status);
        })
    }
    contentElement.value = ''
    charCount(contentElement);
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

const tweet = {
    content: "This is an example tweet.",
    user: {
        name: "Name",
        username: "username",
        photo_url: "",
        profile_url: ""
    },
    date: "1h",
};