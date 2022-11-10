<?php 

function getMediaName(array $mediaArray)
{
    $name = '';
    if (isset($mediaArray['original_name'])) {
        $name = $mediaArray['original_name'];
    } else if (isset($mediaArray['original_title'])) {
        $name = $mediaArray['original_title'];
    } else if (isset($mediaArray['name'])) {
        $name = $mediaArray['name'];
    }
    return $name;
}

function getMediaPosterUrl(array $mediaArray)
{
    $url = null;
    if (isset($mediaArray['poster_path'])) {
        $url = config('constants.imgUrl') . $mediaArray['poster_path'];
    } else if (isset($mediaArray['backdrop_path'])) {
        $url = config('constants.imgUrl') . $mediaArray['backdrop_path'];
    }
    return $url;
}

function getMediaBackdropUrl(array $mediaArray)
{
    $url = null;
    if (isset($mediaArray['backdrop_path'])) {
        $url = config('constants.imgUrl') . $mediaArray['backdrop_path'];
    } else if (isset($mediaArray['poster_path'])) {
        $url = config('constants.imgUrl') . $mediaArray['poster_path'];
    }
    return $url;
}

function getMediaResume(array $mediaArray)
{
    $resume = '';
    if (isset($mediaArray['overview'])) {
        $resume = $mediaArray['overview'];
    } 
    return $resume;
}

function getMediaYear(array $mediaArray)
{
    $date = '';
    if (isset($mediaArray['first_air_date'])) {
        $date = $mediaArray['first_air_date'];
    } else if (isset($mediaArray['release_date'])) {
        $date = $mediaArray['release_date'];
    }
    return explode('-', $date)[0];
}