/* Loading */
function loadingToggle(elementClass = 'body') {
  document.querySelector(`${elementClass} .loading`).classList.toggle('invisible');
}
/* #Loading# */



/* Toast Message */
function toast(type = 'info', messsage = '') {

  const types = {
    'info': `<svg class="h-4 w-4 text-blue-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </svg>`,
    'warning': `<svg class="h-4 w-4 text-orange-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
      </svg>`,
    'success': `<svg class="h-4 w-4 text-green-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </svg>`,
    'error': `<svg class="h-4 w-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
      </svg>`
  }

  let component = `
    <div class=" bg-white border rounded-md shadow-lg dark:bg-gray-800 dark:border-gray-700" role="alert">
    <div class="flex p-4">
        <div class="flex-shrink-0">
            ${types[type]}
        </div>
        <div class="ml-3">
            <p class="text-sm text-gray-700 dark:text-gray-400">
            ${messsage}
            </p>
        </div>
    </div>
    </div>`;

  document.querySelector('.toast-message').innerHTML = (component);
}

function removeToast() {
  document.querySelector('.toast-message').innerHTML = '';
}
/* #Toast Message# */



/* Snackbar */
function snackbar(message = 'Successful', faIcon = 'twitter') {
  const snackbarDiv = document.createElement('div');
  snackbarDiv.id = 'snackbar';
  snackbarDiv.role = 'alert';
  snackbarDiv.classList.add("fixed", "left-1/2", "-translate-x-1/2", "top-5", "flex", "items-center", "w-full", "max-w-xs", "p-4", "space-x-4", "text-gray-500", "bg-white", "divide-x", "divide-gray-200", "rounded-lg", "shadow", "space-x", "transition-all", "ease-in-out", "duration-500", "opacity-0");

  if (faIcon == 'twitter') {
    snackbarDiv.innerHTML = `<i class="fa-brands fa-${faIcon} text-xl text-default"></i>`;
  } else {
    snackbarDiv.innerHTML = `<i class="fa-solid fa-${faIcon} text-xl text-default"></i>`;
  }

  const snackbarContent = document.createElement('div');
  snackbarContent.classList.add("pl-4", "text-base", "text-dark", "font-medium");
  snackbarContent.textContent = message;

  snackbarDiv.appendChild(snackbarContent);

  document.querySelector("body").appendChild(snackbarDiv);


  /* Show Snackbar */
  setTimeout(() => {
    snackbarDiv.classList.remove('opacity-0');
  }, 0);

  /* Hide Snackbar */
  setTimeout(() => {
    snackbarDiv.classList.add('opacity-0');

    /* RemoveSnackbar */
    setTimeout(() => {
      snackbarDiv.remove();
    }, 2600);

  }, 2500);

}
/* #Snackbar# */

/* Add Tweet */
async function addTweet(tweet, toTop = false) {
  const tweets = document.querySelector(".tweets");  //tweets parent div

  const parent = document.createElement('div');  //tweet div
  parent.classList.add("border-t", "p-4", "flex", "space-x-4", "transition-all", "ease-in-out", "duration-500", "opacity-0");

  if (toTop) {
    tweets.insertBefore(parent, tweets.firstChild);
  } else {
    tweets.appendChild(parent);  //append tweet to tweets on bottom
  }

  const userPhoto = document.createElement('img');  //photo div
  userPhoto.classList.add("w-11", "h-11", "bg-gray-300", "rounded-full");
  userPhoto.src = tweet.user.photo_url ?? '';
  userPhoto.onerror = (e) => { e.target.src = 'public/images/profile/default.png' };
  parent.appendChild(userPhoto);  //append photo to user parent


  const userParent = document.createElement('div');  //user div
  userParent.classList.add("flex", "flex-col");

  parent.appendChild(userParent);  //append user to parent

  const userNameParent = document.createElement('div');  //username div
  userNameParent.classList.add("flex", "space-x-2");

  const userName = document.createElement('a'); //user name
  userName.classList.add("font-bold");
  userName.href = tweet.user.profile_url;
  userName.textContent = tweet.user.name

  const userUsername = document.createElement('p'); //username
  userUsername.classList.add("text-gray-500");
  userUsername.textContent = `@${tweet.user.username} • ${tweet.date}`;

  userNameParent.appendChild(userName);  //append user name to user name
  userNameParent.appendChild(userUsername); //append username to user name

  userParent.appendChild(userNameParent);

  const tweetContent = document.createElement('p');
  tweetContent.classList.add("mt-2");
  tweetContent.textContent = tweet.content;

  userParent.appendChild(tweetContent);

  /* Show Tweet */
  await timeout();
  parent.classList.remove('opacity-0');
}
/* #Add Tweet# */

async function addTweetFromData(data) {
  const tweet = {
    content: data.content,
    user: {
      name: data.name,
      username: data.username,
      photo_url: data.photo_url,
      profile_url: data.profile_url
    },
    date: data.date,
  };

  addTweet(tweet);
}


/* Log Out */
function logout(e) {
  const actionURL = e.getAttribute('action');
  loadingToggle('.log-out');
  e.disabled = true;
  axios.post(actionURL).then(res => {
    //toast(res.data.status, res.data.message);
    if (res.data.redirect) {
      window.location.href = res.data.redirect;
    }
    e.disabled = false;
    loadingToggle('.log-out');
  });
}
/* #Log Out# */


function timeout(ms = 0) {
  return new Promise(resolve => setTimeout(resolve, ms));
}