<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 2/20/19
 * Time: 8:34 AM
 */

namespace App\Helpers;

use PhpParser\Node\Expr\Cast\Object_;

if (! function_exists('extractData')) {
    function extract_data($items) {
        //topics
        $itm = [];
        if(gettype($items) == 'string') {
            foreach (json_decode($items) as $item) {
                array_push($itm, $item->value);
            }
        }else if(gettype($items) == 'array') {
            foreach ($items as $item) {
                array_push($itm, $item['value']);
            }
        }

        return $itm;
    }
}