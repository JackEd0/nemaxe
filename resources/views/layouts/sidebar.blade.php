<h4 class="animated bounce">Categories</h4>
<div class="hline"></div>
@foreach($card_types as $card_type)
    <p>
        <a href="#" onclick="$('#type_value').val({{ $card_type->id }}); $('#quick_search_form').submit()">
            <i class="fa fa-angle-right"></i> {{ $card_type->name }}
        </a>
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
                <a href="{{ url('/epreuves/' . $latest_card->id) }}">
                    {{ "{$latest_card->card_type_name} {$latest_card->grade_short_name} {$latest_card->field_name} " }}
                </a>
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
<form style="display: none;" action="/search" method="post" id="quick_search_form">
    {{ csrf_field() }}
    <input type="text" name="card_type" id="type_value">
    <input type="text" name="search" id="search_value">
</form>
