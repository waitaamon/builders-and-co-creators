<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 2/20/19
 * Time: 8:34 AM
 */

namespace App\Helpers;

if (! function_exists('extractTopics')) {
    function extract_topics($topics) {
        //topics
        $tpcs = [];

        foreach ($topics as $topic) {
            array_push($tpcs, $topic->value);
        }
        return $tpcs;
    }
}