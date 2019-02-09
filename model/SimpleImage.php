<?php

class SimpleImage
{

    public $image;
    public $image_type;

    function load($filename)
    {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];

        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
            $_SESSION['error'] = '';
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
            $_SESSION['error'] = '';
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
            imagealphablending($this->image, false);
            imagesavealpha($this->image, true);
            $_SESSION['error'] = '';
        } else {
            $_SESSION['error'] = '<p> Не верный формат <p>';
            return false;
        }
    }

    function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
            imagedestroy($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
            imagedestroy($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
            imagedestroy($this->image);
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }


    function getWidth()
    {
        return imagesx($this->image);
    }

    function getHeight()
    {
        return imagesy($this->image);
    }

    function resizeToHeight($height)
    {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }

    function resizeToWidth($width)
    {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width, $height);
    }


    function resize($width, $height)
    {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
}
