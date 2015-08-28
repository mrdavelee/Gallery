    <?php
    header('Content-type: application/json');
    // Tags variable is used here to provide future use of search terms passed as arguments

    $tags = 'chamonix,ski,snow';
    //$data = 'http://api.flickr.com/services/feeds/photos_public.gne?tags=' . $tags . '&format=json&jsoncallback=?';
    $data = 'http://api.flickr.com/services/feeds/photos_public.gne?tags=' . $tags . '&format=json';

    // Flickr provides the option to import data as preformatted JSON. As this removes all possible risk of corruption this was used here.
    // Curl is used to avoid any issues using file_get_contents()
    $flickrCi = curl_init($data);
    curl_setopt($flickrCi,CURLOPT_RETURNTRANSFER, TRUE);
    $flickrInput = curl_exec($flickrCi);
    curl_close($flickrCi);

    $flickrInput = str_replace('jsonFlickrFeed(','',$flickrInput);
        $flickrInput = str_replace('})','}',$flickrInput);
        echo $flickrInput;

     ?>