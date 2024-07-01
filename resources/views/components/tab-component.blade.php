<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <ul class="nav nav-tabs " id="myTab" role="tablist">
        @foreach ($tab as $item)
        <li class="nav-item">
            <a class="nav-link" id="tab-{{$item}}" data-toggle="tab" href="#{{$item}}" role="tab" aria-controls="{{$item}}"
                aria-selected="true">{{$item}}</a>
        </li>
        @endforeach        
    </ul>
    <div class="tab-content bg-white p-3 rounded-bottom">
        @foreach ($tab as $i)
            @if ($loop->first)
                <div class="tab-pane fade active show" id="{{$i}}">
                    <h1>{{$i}}</h1>
                </div>
            @else
            <div class="tab-pane fade" id="{{$i}}">
                <h1>{{$i}}</h1>
            </div>
            @endif
        @endforeach
        
    </div>
</div>