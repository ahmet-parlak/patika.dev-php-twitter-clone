<?php
namespace App\Controllers;

use App\Model\Tweet;
use Core\Controller;

class TweetController extends Controller
{
    public function tweet()
    {
        $data = $this->request->post();

        /* Validation */
        if (!$this->request->required(['tweet_content'], $data)) //Expected data
        {
            warningResponse(message: 'Please enter username and password.');
        }

        $tweetContent = $data['tweet_content'];

        if (strlen($tweetContent) > 180) {
            warningResponse(message: 'The number of characters in a tweet can be up to 180!');
        } else {

            $tweetModel = new Tweet($tweetContent);

            $post = $tweetModel->create();

            if ($post) {
                successResponse(message: 'The tweet has been sent');
            }else{
                errorResponse();
            }
        }

    }
}