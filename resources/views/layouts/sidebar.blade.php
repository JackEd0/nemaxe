<?php
/**
 * Created by PhpStorm.
 * User: Edouard Home
 * Date: 31/01/2017
 * Time: 19:08
 */
?>

<h4 class="animated bounce">Categories</h4>
<div class="hline"></div>
@foreach($card_types as $card_type)
    <p><a href="#"><i class="fa fa-angle-right"></i> {{ $card_type->name }}</a> <span class="badge badge-theme pull-right">9</span></p>
@endforeach
<div class="spacing"></div>

<h4>Latest courses</h4>
<div class="hline"></div>
<ul class="popular-posts">
    <li>
        <a href="#"><img class="thumbnail" src="/img/solid/thumb01.jpg" alt="Popular Post"></a>
        <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
        <p>By John Doe | In <a href="#">Category</a></p>
        <em>Posted on 02/21/14</em>
    </li>
    <li>
        <a href="#"><img class="thumbnail" src="/img/solid/thumb02.jpg" alt="Popular Post"></a>
        <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
        <p>By John Doe | In <a href="#">Category</a></p>
        <em>Posted on 03/01/14</em>
    <li>
        <a href="#"><img class="thumbnail" src="/img/solid/thumb03.jpg" alt="Popular Post"></a>
        <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
        <p>By John Doe | In <a href="#">Category</a></p>
        <em>Posted on 05/16/14</em>
    </li>
    <li>
        <a href="#"><img class="thumbnail" src="/img/solid/thumb04.jpg" alt="Popular Post"></a>
        <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
        <p>By John Doe | In <a href="#">Category</a></p>
        <em>Posted on 05/16/14</em>
    </li>
</ul>

<div class="spacing"></div>
