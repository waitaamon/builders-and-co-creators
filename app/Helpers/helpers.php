<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 2/20/19
 * Time: 8:34 AM
 */

namespace App\Helpers;

use PhpParser\Node\Expr\Cast\Object_;

if (! function_exists('extractTopics')) {
    function extract_topics($topics) {
        //topics
        $tpcs = [];
        if(gettype($topics) == 'string') {
            foreach (json_decode($topics) as $topic) {
                array_push($tpcs, $topic->value);
            }
        }else if(gettype($topics) == 'array') {
            foreach ($topics as $topic) {
                array_push($tpcs, $topic['value']);
            }
        }

        return $tpcs;
    }
}