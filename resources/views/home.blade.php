<?php
/**
 * Created by PhpStorm.
 * User: Edouard Home
 * Date: 26/01/2017
 * Time: 13:50
 */
$subbar = 'Home';
?>
@extends('layouts.master')
@section('title')
    Accueil
@stop

@section('blue-wrap')
    Search - Find - Enjoy
@stop

@section('content')
    <div class="row">
        <div class="col-sm-8 mb">
            @foreach($cards as $i => $card)
            <div class="col-sm-6">
                <p><a href="#"><img class="img-responsive" src="/img/solid/post01.jpg"></a></p>
                <a href="single-post.html"><h3 class="ctitle">{{ $card->title }}.</h3></a>
                <p><csmall>Posted: April 25, 2014.</csmall> | <csmall2>By: {{ $card->author }} - {{ $comments_number[$i] }} Comments</csmall2> | <csmall><a href="#">{{ $card->category }}</a></csmall></p>
                <p><a href="single-post.html">[Read More]</a></p>
                <div class="hline"></div>
            </div>
            @endforeach
            <div class="spacing"></div>
        </div>
        <div class="col-sm-4" id="sidebar-wrapper">
            <h4>Categories</h4>
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
        </div>
    </div>
@endsection
