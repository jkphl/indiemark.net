<?php

/**
 * IndieMark radard chart
 *
 * @category    IndieMark
 * @package     Jkphl\IndieMark
 * @author      Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @copyright   Copyright © 2016 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 */

/***********************************************************************************
 *  The MIT License (MIT)
 *
 *  Copyright © 2016 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"), to deal in
 *  the Software without restriction, including without limitation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ***********************************************************************************/

//header('Content-Type: image/svg+xml');

$axes = [
    'identity' => 'Identity',
    'authentication' => 'Authentication',
    'posts' => 'Posts',
    'syndication' => 'Syndication',
    'posting-ui' => 'Posting UI',
    'navigation' => 'Navigation',
    'search' => 'Search',
    'aggregation' => 'Aggregation',
    'web-actions' => 'Web Actions',
    'security' => 'Security',
    'responses' => 'Handling responses',
];
$maxlevel = 6;

$size = empty($_GET['s']) ? 200 : max(10, intval($_GET['s']));
$radar = [];
if (empty($_GET['a']) || !is_array($_GET['a'])) {
    $_GET['a'] = [];
}
foreach ($axes as $axis => $label) {
    $radar[$axis] = empty($_GET['a'][$axis]) ? 0 : max(0, min($maxlevel, floatval($_GET['a'][$axis])));
}

?><?xml version = "1.0"?>
<svg viewBox="<?= "0 0 $size $size"; ?>" width="<?= $size; ?>" height="<?= $size; ?>" version="1.1"
     xmlns="http://www.w3.org/2000/svg">
    <defs>
        <radialGradient id="iwc" fx=".1">
            <stop  offset="0" style="stop-color:#FBB03B"/>
            <stop  offset="0.0088" style="stop-color:#FBAE3A"/>
            <stop  offset="0.1552" style="stop-color:#F78931"/>
            <stop  offset="0.2921" style="stop-color:#F36F2A"/>
            <stop  offset="0.4147" style="stop-color:#F26025"/>
            <stop  offset="0.511" style="stop-color:#F15A24"/>
            <stop  offset="0.6495" style="stop-color:#F15724"/>
            <stop  offset="0.7658" style="stop-color:#F04C24"/>
            <stop  offset="0.8742" style="stop-color:#EF3B24"/>
            <stop  offset="0.977" style="stop-color:#ED2324"/>
            <stop  offset="1" style="stop-color:#ED1C24"/>
        </radialGradient>
    </defs>
<!--    <circle fill="url(#iwc)" cx="60" cy="60" r="50"/>-->
    <path d="M300,200 h-150 a150,150 0 1,0 150,-150 z"
          fill="url(#iwc)" stroke="blue" stroke-width="5" />
    <path d="M275,175 v-150 a150,150 0 0,0 -150,150 z"
          fill="url(#iwc)" stroke="blue" stroke-width="5" />
</svg>