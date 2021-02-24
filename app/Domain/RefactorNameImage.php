<?php


namespace App\Domain;


class RefactorNameImage
{
    static function setTimestamp($imageName)
    {
        $formats = [
            'jpg',
            'jpeg',
            'png',
            'bmp',
            'gif',
            'svg',
            'webp',
        ];

        foreach ($formats as $format){
            if(strstr($imageName, $format)){
                return date('Ymdhms').'.'.$format;
            }
        }
    }
}
