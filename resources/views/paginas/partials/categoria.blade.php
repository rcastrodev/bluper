<a href="{{ route('categoria', ['slug'=> $c->slug ]) }}" class="card categoria text-decoration-none" style="">
        @if ($c->image)
            <img src="{{ asset($c->image) }}" class="img-fluid" style="min-height: 288px; max-height:288px; object-fit: cover; border-radius:24px;">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid" style="min-height: 288px; max-height:288px; object-fit: cover; border-radius:24px;">
        @endif
    <div class="card-body align-items-center d-flex justify-content-center">
        <p class="card-text text-center mb-0 ps-2 text-uppercase font-size-20 text-truncate" style="color: {{ ($c->color) ? $c->color : '#333333'}}; font-weight:700;">{{ Str::limit($c->name, 40) }}</p>
    </div>
</a>