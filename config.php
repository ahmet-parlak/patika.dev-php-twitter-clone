<?php
session_start();
const BASEDIR = __DIR__;
const URL = 'http://localhost/patika.dev/php/twitter-clone/';

const HOST = 'localhost';
const DB = 'patika_twitter_clone';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';


const DEFAULT_PAGE_TITLE = 'Twitter Clone | Patika.dev';
const DEFAULT_PROFILE_PHOTO_URL = URL . "public/images/profile/default.png";

const MIN_PASSWORD_LENGTH = 6;
const MIN_USERNAME_LENGTH = 3;
const MIN_NAME_LENGTH = 2;
const MAX_ABOUT_LENGTH = 150;

?>