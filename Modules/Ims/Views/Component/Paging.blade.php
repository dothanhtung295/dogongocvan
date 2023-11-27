@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
        class="flex items-center justify-between text-[15px] font-normal font-inter">
        <div class=" m-auto">
            <span class="relative z-0 inline-flex space-x-3 items-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span
                            class="items-center justify-center min-w-[40px] min-h-[40px] bg-[#E4E4E4] text-[#343434] rounded-full hidden">
                            <i class="fas fa-angle-left "></i>
                        </span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="group flex items-center justify-center min-w-[40px] min-h-[40px] bg-white border border-[#7F7F7F]  text-[15px] font-LexonLight leading-6 text-[#343434] rounded-full hover:text-[#ffffff] hover:bg-[#CE4D00] "
                        aria-label="{{ __('pagination.previous') }}">
                        <svg class="group-hover:fill-[#fff] fill-[#3a3a3a] rotate-90" xmlns="http://www.w3.org/2000/svg" width="12.175" height="19.148" viewBox="0 0 12.175 19.148">
                            <path id="Path_105159" data-name="Path 105159" d="M0,5.992c.123-.386.418-.46.779-.46,7.062,0,9.059,0,16.121,0h.353c-.1-.11-.161-.178-.225-.243L12.834,1.084C12.789,1.039,12.743,1,12.7.949a.554.554,0,0,1-.019-.787.546.546,0,0,1,.784.007c.053.047.1.1.153.148l5.234,5.243c.391.392.394.659.008,1.045l-5.317,5.327a.567.567,0,0,1-.834.1.525.525,0,0,1-.087-.7,2.149,2.149,0,0,1,.235-.265q2.089-2.1,4.179-4.189c.06-.06.116-.122.22-.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,1,0,6.229Z" transform="translate(12.175) rotate(90)"/>
                        </svg>

                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span
                                class="flex items-center justify-center min-w-[40px] min-h-[40px] bg-white  border border-[#7F7F7F] text-[15px] font-LexonLight leading-6 text-[#343434] hover:text-[#ffffff] hover:bg-[#CE4D00] rounded-full ">{{ $element }}</span>
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span
                                        class="flex items-center justify-center min-w-[40px] min-h-[40px] bg-[#CE4D00] text-white rounded-full">
                                        {{ $page }}
                                    </span>
                                </span>
                            @else
                                <span class="min-h-[40px] min-w-[40px]">
                                    <a href="{{ $url }}"
                                        class="flex items-center justify-center min-w-[40px] min-h-[40px] bg-white  border border-[#7F7F7F] text-[15px] font-LexonLight leading-6 text-[#343434] hover:text-[#ffffff] hover:bg-[#CE4D00] rounded-full "
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                </span>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="group flex items-center justify-center min-w-[40px] min-h-[40px] bg-white  border border-[#7F7F7F]  text-[15px] font-LexonLight leading-6 text-[#343434] rounded-full hover:text-[#ffffff] hover:bg-[#CE4D00] "
                        aria-label="{{ __('pagination.next') }}">
                        <svg  class="group-hover:fill-[#fff] rotate-90" xmlns="http://www.w3.org/2000/svg" width="12.175" height="19.148" viewBox="0 0 12.175 19.148">
                            <path id="Path_105159" data-name="Path 105159" d="M0,6.183c.123.386.418.46.779.46,7.062,0,9.059,0,16.121,0h.353c-.1.11-.161.178-.225.243l-4.194,4.208c-.045.045-.091.088-.133.135a.554.554,0,0,0-.019.787.546.546,0,0,0,.784-.007c.053-.047.1-.1.153-.148l5.234-5.243c.391-.392.394-.659.008-1.045L13.545.244a.567.567,0,0,0-.834-.1.525.525,0,0,0-.087.7,2.149,2.149,0,0,0,.235.265Q14.948,3.2,17.038,5.3c.06.06.116.122.22.232h-.347c-7.07,0-9.074,0-16.144,0A.728.728,0,0,0,0,5.946Z" transform="translate(0 19.148) rotate(-90)"/>
                          </svg>

                    </a>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span
                            class="hidden items-center justify-center min-w-[40px] min-h-[40px] bg-[#93CEF2] text-[#343434] rounded-full"
                            aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @endif
            </span>
        </div>
        </div>
    </nav>
@endif
