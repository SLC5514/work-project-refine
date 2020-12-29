
@if($activities->count())
    <div class="activities">
        <div class="title">相关活动</div>
        <ul row sm-gutter-48 md-gutter-0>
            @foreach($activities as $item)
                @if($loop->last)
                <li col col-24 md-24 sm-12 sm-only>
                @else
                <li col col-24 md-24 sm-12>
                @endif
                    <a href="{{$item->detail_link}}" row xs-gutter-24 sm-gutter-0>
                        <div class="img-box" col col-24 xs-11><img src="{{$item->img_src}}" alt="" /></div>
                        <div class="info-box" col col-24 xs-13>
                            <p>
                                {{$item->title}}
                            </p>
                            <span class="ellipsis">{{date('Y.m.d', strtotime($item->begin_at))}} {{$item->venue}}</span>
                        </div>
                    </a>
                </li>
                @endforeach
        </ul>
        <a class="text-btn" href="/activity/" target="_blank">阅读更多内容，狠戳这里</a>
    </div>
@endif
