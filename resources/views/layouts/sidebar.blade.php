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
    <p>
        <a href="#"><i class="fa fa-angle-right"></i> {{ $card_type->name }}</a>
        <span class="badge badge-theme pull-right">9</span>
    </p>
@endforeach
<div class="spacing"></div>

<h4>Latest courses</h4>
<div class="hline"></div>
<ul class="popular-posts">
    @foreach ($latest_cards as $i => $latest_card)
        <li>
            <a href="{{ url('/epreuves/' . $latest_card->id) }}">
                <img class="thumbnail" src="/img/solid/thumb0{{ $i+1 }}.jpg" alt="Popular Post">
            </a>
            <p>
                <a href="{{ url('/epreuves/' . $latest_card->id) }}">{{ $latest_card->title }}</a>
            </p>
            <p>
                By {{ $latest_card->user_username }} |
                In <a href="#">{{ $latest_card->card_type_name }}</a>
            </p>
            <em>Posted on {{ substr($latest_card->created_at, 0, 10) }}</em>
        </li>
    @endforeach
</ul>

<div class="spacing"></div>
