<div class="w-full bg-[#ECF4FF] rounded-[20px] sm:p-[20px_50px_30px] p-[15px_20px_15px]">
    <form class="form-register-common" action="{{ route('contact') }}" method="POST">
        @csrf
        <div class="flex flex-col sm:gap-[19px] gap-[10px] sm:pb-[30px] pb-[20px]">
            <div class="flex flex-col w-full">
                <label for="full_name"
                    class="font-BeVietnamProMedium text-[17px] leading-[22px] text-[#232323] pb-[11px]">{{ $ims['global_lang']['name'] ?? '' }}</label>
                <input name="full_name" id="full_name" value="{{ old('full_name') ?? '' }}"
                    class="bg-white rounded-[5px] font-BeVietnamProRegular text-[15px] leading-[20px] text-[#A2A2A2] placeholder:text-[#A2A2A2] placeholder:text-[15px] p-[14px_24px] border-none focus:ring-0 focus:border-none"
                    type="text" placeholder="{{ $ims['global_lang']['pla_name'] ?? '' }}">
                @error('full_name')
                    <span
                        class="error-name text-[12px] text-red-700 italic text-left block h-[15px] my-[5px]">{{ $message ?? '' }}</span>
                @enderror
            </div>
            <div class="flex flex-col w-full">
                <label for="phone"
                    class="font-BeVietnamProMedium text-[17px] leading-[22px] text-[#232323] pb-[11px]">{{ $ims['global_lang']['phone'] ?? '' }}</label>
                <input name="phone" id="phone"
                    class="bg-white rounded-[5px] font-BeVietnamProRegular text-[15px] leading-[20px] text-[#A2A2A2] placeholder:text-[#A2A2A2] placeholder:text-[15px] p-[14px_24px] border-none focus:ring-0 focus:border-none"
                    type="text" placeholder="{{ $ims['global_lang']['pla_phone'] ?? '' }}">
                @error('phone')
                    <span
                        class="error-name text-[12px] text-red-700 italic text-left block h-[15px] my-[5px]">{{ $message ?? '' }}</span>
                @enderror
            </div>
            <div class="flex flex-col w-full">
                <label for="receiving_points"
                    class="font-BeVietnamProMedium text-[17px] leading-[22px] text-[#232323] pb-[11px]">{{ $ims['global_lang']['receiving_points'] ?? '' }}</label>
                <input name="receiving_points" id="receiving_points"
                    class="bg-white rounded-[5px] font-BeVietnamProRegular text-[15px] leading-[20px] text-[#A2A2A2] placeholder:text-[#A2A2A2] placeholder:text-[15px] p-[14px_24px] border-none focus:ring-0 focus:border-none"
                    type="text" placeholder="{{ $ims['global_lang']['pla_receiving_points'] ?? '' }}">
                @error('receiving_points')
                    <span
                        class="error-name text-[12px] text-red-700 italic text-left block h-[15px] my-[5px]">{{ $message ?? '' }}</span>
                @enderror
            </div>
            <div class="flex flex-col w-full">
                <label for="pay_points"
                    class="font-BeVietnamProMedium text-[17px] leading-[22px] text-[#232323] pb-[11px]">{{ $ims['global_lang']['pay_points'] ?? '' }}</label>
                <input name="pay_points" id="pay_points"
                    class="bg-white rounded-[5px] font-BeVietnamProRegular text-[15px] leading-[20px] text-[#A2A2A2] placeholder:text-[#A2A2A2] placeholder:text-[15px] p-[14px_24px] border-none focus:ring-0 focus:border-none"
                    type="text" placeholder="{{ $ims['global_lang']['pla_pay_points'] ?? '' }}">
                @error('pay_points')
                    <span
                        class="error-name text-[12px] text-red-700 italic text-left block h-[15px] my-[5px]">{{ $message ?? '' }}</span>
                @enderror
            </div>
            <div class="sm:flex items-start gap-[17px] sm:space-y-0 space-y-[10px]">
                <div class="flex flex-col w-full">
                    <label for="style"
                        class="font-BeVietnamProMedium text-[17px] leading-[22px] text-[#232323] pb-[11px]">{{ $ims['global_lang']['style_contact'] ?? '' }}</label>
                    <select name="style" id="style"
                        class="bg-white rounded-[5px] font-BeVietnamProRegular text-[15px] leading-[20px] text-[#A2A2A2] placeholder:text-[#A2A2A2] placeholder:text-[15px] p-[14px_24px] border-none focus:ring-0 focus:border-none">
                        <option disabled value="">{{ $ims['global_lang']['pla_style_contact'] ?? '' }}</option>
                        @foreach ($list_brand as $item)
                            <option value="{{ $item['title'] ?? '' }}">{{ $item['title'] ?? '' }}</option>
                        @endforeach
                    </select>
                    @error('style')
                        <span
                            class="error-name text-[12px] text-red-700 italic text-left block h-[15px] my-[5px]">{{ $message ?? '' }}</span>
                    @enderror
                </div>
                <div class="flex flex-col w-full">
                    <label for="date_rent"
                        class="font-BeVietnamProMedium text-[17px] leading-[22px] text-[#232323] pb-[11px]">{{ $ims['global_lang']['date_rent'] ?? '' }}</label>
                    <input name="date_rent" id="date_rent"
                        class="bg-white rounded-[5px] font-BeVietnamProRegular text-[15px] leading-[20px] text-[#A2A2A2] placeholder:text-[#A2A2A2] placeholder:text-[15px] p-[14px_24px] border-none focus:ring-0 focus:border-none"
                        type="date"
                        autocomplete="off"
                        placeholder="{{ $ims['global_lang']['pla_date_rent'] ?? '' }}">
                    @error('date_rent')
                        <span
                            class="error-name text-[12px] text-red-700 italic text-left block h-[15px] my-[5px]">{{ $message ?? '' }}</span>
                    @enderror
                </div>
            </div>
            @if (!empty($list_product))
                <div class="flex flex-col w-full">
                    <div class="list-option flex flex-wrap my-[-5px] mx-[-8.5px]">
                        @foreach ($list_product as $item)
                            <div class="item w-1/2 py-[5px] px-[8.5px] gap-[10px]">
                                <div class="flex items-center gap-[10px]">
                                    <input id="product_id" type="checkbox" name="product_id[]" value="{{ $item['id'] ?? '' }}"
                                        class="w-[19px] h-[19px] text-blue-600 bg-white border-[#8B8B8B] border-[1px] rounded-[3px] focus:ring-0">
                                    <label for="name"
                                        class="font-BeVietnamProRegular text-[15px] leading-[20px] text-[#232323]">{{$item['title'] ?? ''}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('product_id')
                        <span
                            class="error-name text-[12px] text-red-700 italic text-left block h-[15px] my-[5px]">{{ $message ?? '' }}</span>
                    @enderror
                </div>
            @endif
        </div>
        <div class="w-full flex justify-center">
            <button type="submit" id="send-form-register"
                class="min-w-[182px] bg-[#216BB4] py-[13px] font-BeVietnamProSemiBold text-white text-[14px] leading-[19px] uppercase flex justify-center items-center"
                type="button">
                {{ $ims['global_lang']['send'] ?? '' }}
            </button>
        </div>
    </form>
</div>

