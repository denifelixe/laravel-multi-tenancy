<?php 

function subdomain()
{
	if (request()->getHttpHost() != env('APP_ROOT_DOMAIN')) {

        //get subdomain from the hostname
        $subdomain = str_replace('.' . env('APP_ROOT_DOMAIN'), '', request()->getHttpHost());

        return $subdomain;

    }

    return '';
}