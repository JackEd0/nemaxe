<h4 class="animated bounce text-capitalize">{{ __('categories') }}</h4>
<div class="hline"></div>
@foreach($card_types as $card_type)
    <p>
        <a href="#" onclick="$('#type_value').val({{ $card_type->id }}); $('#quick_search_form').submit()">
            <i class="fa fa-angle-right"></i> {{ $card_type->name }}
        </a>
        <span class="badge badge-theme pull-right">{{ $card_types_quantity[$card_type->id] }}</span>
    </p>
@endforeach
<div class="spacing"></div>

<h4>{{ __('latest tests') }}</h4>
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
