<?php

    /**
     * Verify and return custom slug string
     *
     * @return slug
     */
    function slugify($text)
    {
        # remove ? mark from string
        $slug = preg_replace('/\?/u', ' ', trim($text));
        $slug = preg_replace('/\s+/u', '-', trim($slug));

        # slug repeat check
        $latest = request()->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$'")
                        ->latest('id')
                        ->value('slug');

        if ($latest) {
            $pieces = explode('-', $latest);
            $number = intval(end($pieces));
            $slug .= '-' . ($number + 1);
        }

        return $slug;
    }
