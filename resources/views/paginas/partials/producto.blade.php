<a href="{{ route('producto', ['slug' => $p->slug ]) }}" class="card producto text-decoration-none bg-light d-flex justify-content-center align-items-center px-0 text-dark" style="height: 470px; border: 1px solid #D9D9D9; border-radius: 24px;">
    <div class="py-4">
        @if (count($p->images))
            @if (count($p->images))
                @if (Storage::disk('public')->exists($p->images()->first()->image))
                    <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product mb-3" style="min-height:233px; max-height:233px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product mb-3" style="min-height:233px; max-height:233px; object-fit: cover;">
                @endif 
            @else
                <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product mb-3" style="min-height:233px; max-height:233px; object-fit: cover;">  
            @endif
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product mb-3" style="min-height:233px; max-height:233px; object-fit: cover;">
        @endif
    </div>

    <div style="border-bottom: 1px solid #D9D9D9;height: 1px;width: 100%;"></div>
    <div class="card-body d-block w-100 px-2">
        <div class="d-flex justify-content-between text-uppercase font-size-16">
            <span class="font-size-16 d-block mb-3" style="color: {{ ($p->category->color) ? $p->category->color : '#333333'}}; font-weight:700;">{{ $p->category->name }}</span>
            <div class="">
                <span class="text-uppercase">COD.</span>
                <span>{{ $p->code }}</span>
            </div>
        </div>
        <p class="card-text mb-0 ">
            <span class="fw-bold font-size-20 text-truncate">{{ Str::limit($p->name, 20) }}</span>
        </p>
    </div>
</a>

