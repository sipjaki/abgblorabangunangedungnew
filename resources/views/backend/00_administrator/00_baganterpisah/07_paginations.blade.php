<div class="custom-pagination-container"
     style="margin-top: 50px; display: flex; flex-direction: column; align-items: center; text-align: center; font-size: 15px;">

    <!-- Info Box -->
    <div class="custom-pagination-info-box"
        style="padding: 12px 20px; border-radius: 8px; margin-bottom: 15px;
               background-color: #020243; border: 1px solid #020243; box-shadow: 0 4px 8px rgba(0,0,0,0.12);
               display: flex; align-items: center; justify-content: center; transition: all 0.15s ease-in-out;">
        <div class="custom-pagination-info" style="color: white; font-weight: 600; text-align: center;">
            📊 Data Ke <span style="color: currentColor;">{{ $data->firstItem() }}</span>
            Sampai <span style="color: currentColor;">{{ $data->lastItem() }}</span>
            Dari <span style="color: currentColor;">{{ $data->total() }}</span> Jumlah
            <span style="color: currentColor;">{{ $title }}</span>
        </div>
    </div>

    @php
        $window = 2;
        $last = $data->lastPage();
        $current = $data->currentPage();
        $start = max($current - $window, 1);
        $end = min($current + $window, $last);
        $paginator = $data->appends(request()->except('page'));
    @endphp

    <ul class="custom-pagination-paginate"
        style="display: flex; padding-left: 0; list-style: none; gap: 10px; margin: 0; flex-wrap: wrap; justify-content: center;">

        {{-- Previous --}}
        <li class="custom-page-item {{ $data->onFirstPage() ? 'disabled' : '' }}" style="display:flex; align-items:center;">
            <a class="custom-page-link" href="{{ $data->onFirstPage() ? '#' : $paginator->previousPageUrl() }}"
               style="background-color: #3B82F6; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;
                      display:flex; align-items:center; transition: all 0.15s ease; border:1px solid #3B82F6;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" style="width:16px; height:16px; margin-right:8px;">
                    <path d="M15 19l-7-7 7-7"/>
                </svg>
                Previous
            </a>
        </li>

        {{-- First page + leading ellipsis --}}
        @if($start > 1)
            <li style="display:flex; align-items:center;">
                <a class="custom-page-link" href="{{ $paginator->url(1) }}"
                   style="background-color:#1E3A8A;color:white;padding:8px 12px;border-radius:5px;text-decoration:none;border:1px solid #1E3A8A;">
                    1
                </a>
            </li>

            @if($start > 2)
                <li style="display:flex; align-items:center;"><span style="padding:8px 10px;">...</span></li>
            @endif
        @endif

        {{-- Middle pages --}}
        @for ($page = $start; $page <= $end; $page++)
            <li class="custom-page-item {{ $page == $current ? 'active' : '' }}" style="display:flex; align-items:center;">
                <a class="custom-page-link" href="{{ $paginator->url($page) }}"
                   style="background-color: {{ $page == $current ? '#3B82F6' : '#1E3A8A' }};
                          color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none;
                          border: 1px solid {{ $page == $current ? '#3B82F6' : '#1E3A8A' }};">
                    {{ $page }}
                </a>
            </li>
        @endfor

        {{-- Trailing ellipsis + last page --}}
        @if($end < $last)
            @if($end < $last - 1)
                <li style="display:flex; align-items:center;"><span style="padding:8px 10px;">...</span></li>
            @endif
            <li style="display:flex; align-items:center;">
                <a class="custom-page-link" href="{{ $paginator->url($last) }}"
                   style="background-color:#1E3A8A;color:white;padding:8px 12px;border-radius:5px;text-decoration:none;border:1px solid #1E3A8A;">
                    {{ $last }}
                </a>
            </li>
        @endif

        {{-- Next --}}
        <li class="custom-page-item {{ !$data->hasMorePages() ? 'disabled' : '' }}" style="display:flex; align-items:center;">
            <a class="custom-page-link" href="{{ $data->hasMorePages() ? $paginator->nextPageUrl() : '#' }}"
               style="background-color: #3B82F6; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;
                      display:flex; align-items:center; transition: all 0.15s ease; border:1px solid #3B82F6;">
                Next
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" style="width:16px; height:16px; margin-left:8px;">
                    <path d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </li>
    </ul>
</div>
