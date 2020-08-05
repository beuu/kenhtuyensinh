<?php
function categoryParent($datas ,$parent = 0, $str="", $select =0){
    foreach ($datas as $data) {
        $id = $data['id'];
        $title = $data['title'];
        if ($data['pid'] == $parent) {
            if ($select != 0 && $id == $select) {
                echo "<option value='$id' selected='selected' > $str $title </option>";
            }else {
                echo "<option value='$id'> $str $title </option>";
            }
            categoryParent($datas ,$id, $str."--", $select);
        }
    }

}
function categoryParentSelect2($datas ,$parent = 0, $str="", $select){
    foreach ($datas as $data) {
        $id = $data['id'];
        $title = $data['title'];
        if ($data['pid'] == $parent) {
            if (!empty($select) && in_array($id, $select)) {
                echo "<option value='$id' selected='selected' > $str $title </option>";
            }else {
                echo "<option value='$id'> $str $title </option>";
            }
            categoryParentSelect2($datas ,$id, $str."--", $select);
        }
    }}
function tagSelect2($datas , $select){
    foreach ($datas as $data) {
        $id = $data['id'];
        $title = $data['name'];
            if (!empty($select) && in_array($id, $select)) {
                echo "<option value='$id' selected='selected' >$title </option>";
            }else {
                echo "<option value='$id'> $title </option>";
            }
        tagSelect2($datas , $select);
    }}

function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false) {
    if (is_array($ending)) {
        extract($ending);
    }
    if ($considerHtml) {
        if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) { return $text; }
        $totalLength=mb_strlen($ending); $openTags=array(); $truncate='' ; preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/',
            $text, $tags, PREG_SET_ORDER);
        foreach ($tags as $tag) {
            if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
                if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
                    array_unshift($openTags, $tag[2]);
                } else if (preg_match('/<\ /([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
                    $pos = array_search($closeTag[1], $openTags);
                    if ($pos !== false) {
                        array_splice($openTags, $pos, 1);
                    }
                }
            }
            $truncate .= $tag[1];

            $contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ',
                $tag[3]));
            if ($contentLength + $totalLength > $length) {
                $left = $length - $totalLength;
                $entitiesLength = 0;
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities,
                    PREG_OFFSET_CAPTURE)) {
                    foreach ($entities[0] as $entity) {
                        if ($entity[1] + 1 - $entitiesLength <= $left) { $left--; $entitiesLength +=mb_strlen($entity[0]); }
                        else { break; } } } $truncate .=mb_substr($tag[3], 0 , $left + $entitiesLength); break; } else {
                $truncate .=$tag[3]; $totalLength +=$contentLength; } if ($totalLength>= $length) {
                break;
            }
        }

    } else {
        if (mb_strlen($text) <= $length) { return $text; } else { $truncate=mb_substr($text, 0, $length -
            strlen($ending)); } } if (!$exact) { $spacepos=mb_strrpos($truncate, ' ' ); if
    (isset($spacepos)) { if ($considerHtml) { $bits=mb_substr($truncate, $spacepos);
        preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
        if (!empty($droppedTags)) {
            foreach ($droppedTags as $closingTag) {
                if (!in_array($closingTag[1], $openTags)) {
                    array_unshift($openTags, $closingTag[1]);
                }
            }
        }
    }
        $truncate = mb_substr($truncate, 0, $spacepos);
    }
    }

    $truncate .= $ending;

    if ($considerHtml) {
        foreach ($openTags as $tag) {
            $truncate .= '</'.$tag.'>';
        }
    }

    return $truncate;
}
function menuselect($name = "menu", $menulist = array())
{
    $html = '<select name="' . $name . '">';

    foreach ($menulist as $key => $val) {
        $active = '';
        if (request()->input('menu') == $key) {
            $active = 'selected="selected"';
        }
        $html .= '<option ' . $active . ' value="' . $key . '">' . $val . '</option>';
    }
    $html .= '</select>';
    return $html;
}
function showMenus($data, $parent_id = 0,$url, $char = 'dropdown', $drop = 'dropdown-toggle', $togel = 'dropdown')
{
    $pa =[];
    foreach ($data as $key => $value) {
        array_push($pa,$value['parent']);
    }
    foreach ($data as $item)
    {
        if ($item['parent'] == $parent_id && in_array($item['id'],$pa) ) {
            if ($item['depth']>=1) {
                echo '<li   class="'.$drop.$item['class'].' dropdown nav-item">';
            }else {
                if($item['class'] == ""){
                    echo '<li   class="nav-item dropdown '.$item['class'].'">';
                }else{
                    echo '<li   class="dropdown '.$item['class'].'">';
                }

            }
            echo '<a href="' .$url. $item['link'] . '" class="nav-link dropdown-toggle" data-toggle="'.$togel.'">' . $item['label'] . '</a>';
            echo '<ul  class="dropdown-menu">';
            showMenus($data, $item['id'],$url, $char='dropdown-menu', $drop='dropdown-toggle', $togel='dropdown');
            echo '</ul>';
            echo '</li>';
        }else if($item['parent'] == $parent_id) {
            echo '<li class="nav-item '.$item['class'].'">';
            echo '<a class="nav-link" href="' .$url.$item['link'] . '">' . $item['label'] . '</a>';
            echo '</li>';
        }

    }

}
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ,$length =900) {
    $closing_p = '</p>';
    $strlen = 0;
    $paragraphs = explode( $closing_p, $content );
    if (count($paragraphs) >= $insertion ) {
        foreach ($paragraphs as $index => $paragraph) {
            if ( trim( $paragraph ) ) {
                $paragraphs[$index] .= $closing_p;
            }
            $strlen += strlen($paragraph);
            if ( $paragraph_id == $index + 1 && $strlen >= $length ) {
                $paragraphs[$index] .= $insertion;
            }
        }
        return implode( '', $paragraphs );
    }
    return $content;
}

function ads_in_post( $content ) {
    $ad_code = '<div id="admbackground"
    style="padding: 0px;z-index: 1;display:none;margin: 0px auto;position: relative;overflow: initial;height: 600px;">
    <div id="admbackground_1" style="position: absolute;clip: rect(0px, 414px, 600px, -16px);height: 600px;">
        <div id="adm_inpage"
            style="display: inline-block;width: 414px;height: 600px;;position: fixed;top: 75px;left: 0;-webkit-backface-visibility: hidden;-webkit-transform: translate3d(0,0,0);">
            <div id="adm-inpage-h" style="display: block;height:600px;position: relative;">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- diendantuyensinh24h.com - 300x600 thích ứng giua bv mobile -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1895892504965300"
     data-ad-slot="4043291956"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
if (window.innerWidth<768){
     (adsbygoogle = window.adsbygoogle || []).push({});
}
</script>
            </div>
            <div id="adm-inpage-w" style="display: none; height:414px">

            </div>
        </div>
    </div>
</div>';

    return prefix_insert_after_paragraph( $ad_code, 3, $content );
}


function html_cut($text, $max_length)
{
    $tags   = array();
    $result = "";

    $is_open   = false;
    $grab_open = false;
    $is_close  = false;
    $in_double_quotes = false;
    $in_single_quotes = false;
    $tag = "";

    $i = 0;
    $stripped = 0;

    $stripped_text = strip_tags($text);

    while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
    {
        $symbol  = $text{$i};
        $result .= $symbol;

        switch ($symbol)
        {
            case '<':
                $is_open   = true;
                $grab_open = true;
                break;

            case '"':
                if ($in_double_quotes)
                    $in_double_quotes = false;
                else
                    $in_double_quotes = true;

                break;

            case "'":
                if ($in_single_quotes)
                    $in_single_quotes = false;
                else
                    $in_single_quotes = true;

                break;

            case '/':
                if ($is_open && !$in_double_quotes && !$in_single_quotes)
                {
                    $is_close  = true;
                    $is_open   = false;
                    $grab_open = false;
                }

                break;

            case ' ':
                if ($is_open)
                    $grab_open = false;
                else
                    $stripped++;

                break;

            case '>':
                if ($is_open)
                {
                    $is_open   = false;
                    $grab_open = false;
                    array_push($tags, $tag);
                    $tag = "";
                }
                else if ($is_close)
                {
                    $is_close = false;
                    array_pop($tags);
                    $tag = "";
                }

                break;

            default:
                if ($grab_open || $is_close)
                    $tag .= $symbol;

                if (!$is_open && !$is_close)
                    $stripped++;
        }

        $i++;
    }
    $ctag = count($tags);

    $ctag = count($tags);

    $index =1;
    while ($tags)
        switch($index)
        {
            case count($tags):
                $result .= "...</".array_pop($tags).">";
                break;
            default:
                $result .= "</".array_pop($tags).">";
        }
    $index++;

    return $result;
}
