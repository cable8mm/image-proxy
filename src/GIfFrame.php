<?php

namespace Cable8mm\ImageProxy;

class GifFrame
{
    public function __construct($lc_mod, $palette, $image, $head, $box_dims, $gr_mod)
    {
        $this->pos_x = $box_dims[0];
        $this->pos_y = $box_dims[1];
        $this->width = $box_dims[2];
        $this->height = $box_dims[3];

        $this->lc_mod = $lc_mod;
        $this->gr_mod = $gr_mod;
        $this->palette = $palette;

        if (strlen($gr_mod) == 8) {
            $this->transp = ord($gr_mod[3]) & 1 ? 1 : 0;
        } else {
            $this->transp = 0;
        }

        $this->head = $head;
        $this->image = $image;
    }

    public function __set($name, $value)
    {
        $var = '_' . $name;
        $this->$var = $value;
    }

    public function __get($name)
    {
        $var = '_' . $name;
        if (isset($this->$var)) {
            return $this->$var;
        } else {
            return '';
        }
    }
}
