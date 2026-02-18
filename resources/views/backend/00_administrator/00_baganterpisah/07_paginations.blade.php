<div class="custom-pagination-container"
     style="margin-top: 50px; display: flex; flex-direction: column; align-items: center; text-align: center; font-size: 15px; font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;">

    <!-- Info Box dengan desain lebih elegan -->
    <div class="custom-pagination-info-box"
        style="padding: 14px 24px; border-radius: 12px; margin-bottom: 20px;
               background-color: white; border: 1px solid #e2e8f0;
               box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
               display: flex; align-items: center; justify-content: center;
               transition: all 0.2s ease;">
        <div class="custom-pagination-info" style="color: #1e293b; font-weight: 500; text-align: center;">
            <span style="color: #64748b;">📊 Menampilkan</span>
            <span style="color: #2563eb; font-weight: 600; background: #eff6ff; padding: 2px 8px; border-radius: 6px; margin: 0 4px;">{{ $data->firstItem() }}</span>
            <span style="color: #64748b;">-</span>
            <span style="color: #2563eb; font-weight: 600; background: #eff6ff; padding: 2px 8px; border-radius: 6px; margin: 0 4px;">{{ $data->lastItem() }}</span>
            <span style="color: #64748b;">dari</span>
            <span style="color: #2563eb; font-weight: 600; background: #eff6ff; padding: 2px 8px; border-radius: 6px; margin: 0 4px;">{{ $data->total() }}</span>
            <span style="color: #64748b;">total</span>
            <span style="color: #0f172a; font-weight: 600; margin-left: 4px;">{{ $title }}</span>
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
        style="display: flex; padding-left: 0; list-style: none; gap: 6px; margin: 0; flex-wrap: wrap; justify-content: center;">

        {{-- Previous dengan desain minimalis --}}
        <li class="custom-page-item {{ $data->onFirstPage() ? 'disabled' : '' }}" style="display:flex; align-items:center;">
            <a class="custom-page-link" href="{{ $data->onFirstPage() ? '#' : $paginator->previousPageUrl() }}"
               style="background-color: {{ $data->onFirstPage() ? '#f1f5f9' : 'white' }};
                      color: {{ $data->onFirstPage() ? '#94a3b8' : '#2563eb' }};
                      padding: 8px 16px; border-radius: 10px; text-decoration: none;
                      display: flex; align-items: center; gap: 6px;
                      transition: all 0.2s ease; border: 1px solid {{ $data->onFirstPage() ? '#e2e8f0' : '#e2e8f0' }};
                      font-weight: 500; box-shadow: 0 2px 4px rgba(0,0,0,0.02);
                      {{ $data->onFirstPage() ? '' : 'hover:background-color: #f8fafc; hover:border-color: #2563eb;' }}"
               onmouseover="this.style.backgroundColor='{{ $data->onFirstPage() ? '#f1f5f9' : '#f8fafc' }}'; this.style.borderColor='{{ $data->onFirstPage() ? '#e2e8f0' : '#2563eb' }}';"
               onmouseout="this.style.backgroundColor='{{ $data->onFirstPage() ? '#f1f5f9' : 'white' }}'; this.style.borderColor='#e2e8f0';">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" style="width: 16px; height: 16px;">
                    <path d="M15 19l-7-7 7-7"/>
                </svg>
                Previous
            </a>
        </li>

        {{-- First page + leading ellipsis --}}
        @if($start > 1)
            <li style="display:flex; align-items:center;">
                <a class="custom-page-link" href="{{ $paginator->url(1) }}"
                   style="background-color: white; color: #334155; padding: 8px 14px; border-radius: 10px; text-decoration: none;
                          border: 1px solid #e2e8f0; transition: all 0.2s ease; font-weight: 500;
                          box-shadow: 0 2px 4px rgba(0,0,0,0.02);"
                   onmouseover="this.style.backgroundColor='#eff6ff'; this.style.borderColor='#2563eb'; this.style.color='#2563eb';"
                   onmouseout="this.style.backgroundColor='white'; this.style.borderColor='#e2e8f0'; this.style.color='#334155';">
                    1
                </a>
            </li>

            @if($start > 2)
                <li style="display:flex; align-items:center;">
                    <span style="padding: 8px 10px; color: #94a3b8; font-weight: 500;">•••</span>
                </li>
            @endif
        @endif

        {{-- Middle pages dengan desain yang clean --}}
        @for ($page = $start; $page <= $end; $page++)
            <li class="custom-page-item {{ $page == $current ? 'active' : '' }}" style="display:flex; align-items:center;">
                <a class="custom-page-link" href="{{ $paginator->url($page) }}"
                   style="background-color: {{ $page == $current ? '#2563eb' : 'white' }};
                          color: {{ $page == $current ? 'white' : '#334155' }};
                          padding: 8px 14px; border-radius: 10px; text-decoration: none;
                          border: 1px solid {{ $page == $current ? '#2563eb' : '#e2e8f0' }};
                          transition: all 0.2s ease; font-weight: {{ $page == $current ? '600' : '500' }};
                          box-shadow: 0 2px 4px rgba(0,0,0,0.02);"
                   onmouseover="this.style.backgroundColor='{{ $page == $current ? '#2563eb' : '#eff6ff' }}';
                                this.style.borderColor='#2563eb';
                                {{ $page != $current ? 'this.style.color='#2563eb';' : '' }}"
                   onmouseout="this.style.backgroundColor='{{ $page == $current ? '#2563eb' : 'white' }}';
                              this.style.borderColor='{{ $page == $current ? '#2563eb' : '#e2e8f0' }}';
                              {{ $page != $current ? 'this.style.color='#334155';' : '' }}">
                    {{ $page }}
                </a>
            </li>
        @endfor

        {{-- Trailing ellipsis + last page --}}
        @if($end < $last)
            @if($end < $last - 1)
                <li style="display:flex; align-items:center;">
                    <span style="padding: 8px 10px; color: #94a3b8; font-weight: 500;">•••</span>
                </li>
            @endif
            <li style="display:flex; align-items:center;">
                <a class="custom-page-link" href="{{ $paginator->url($last) }}"
                   style="background-color: white; color: #334155; padding: 8px 14px; border-radius: 10px; text-decoration: none;
                          border: 1px solid #e2e8f0; transition: all 0.2s ease; font-weight: 500;
                          box-shadow: 0 2px 4px rgba(0,0,0,0.02);"
                   onmouseover="this.style.backgroundColor='#eff6ff'; this.style.borderColor='#2563eb'; this.style.color='#2563eb';"
                   onmouseout="this.style.backgroundColor='white'; this.style.borderColor='#e2e8f0'; this.style.color='#334155';">
                    {{ $last }}
                </a>
            </li>
        @endif

        {{-- Next dengan desain matching previous --}}
        <li class="custom-page-item {{ !$data->hasMorePages() ? 'disabled' : '' }}" style="display:flex; align-items:center;">
            <a class="custom-page-link" href="{{ $data->hasMorePages() ? $paginator->nextPageUrl() : '#' }}"
               style="background-color: {{ !$data->hasMorePages() ? '#f1f5f9' : 'white' }};
                      color: {{ !$data->hasMorePages() ? '#94a3b8' : '#2563eb' }};
                      padding: 8px 16px; border-radius: 10px; text-decoration: none;
                      display: flex; align-items: center; gap: 6px;
                      transition: all 0.2s ease; border: 1px solid {{ !$data->hasMorePages() ? '#e2e8f0' : '#e2e8f0' }};
                      font-weight: 500; box-shadow: 0 2px 4px rgba(0,0,0,0.02);"
               onmouseover="this.style.backgroundColor='{{ !$data->hasMorePages() ? '#f1f5f9' : '#f8fafc' }}'; this.style.borderColor='{{ !$data->hasMorePages() ? '#e2e8f0' : '#2563eb' }}';"
               onmouseout="this.style.backgroundColor='{{ !$data->hasMorePages() ? '#f1f5f9' : 'white' }}'; this.style.borderColor='#e2e8f0';">
                Next
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" style="width: 16px; height: 16px;">
                    <path d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </li>
    </ul>
</div>
