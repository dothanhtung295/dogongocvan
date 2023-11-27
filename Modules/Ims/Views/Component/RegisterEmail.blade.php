<section class="register-email-container object-cover text-[#3A3A3A] bg-[#FCFCF8] pt-[1px] cursor-default" >
    <div class="container mt-[30px] flex max-md:flex-wrap-reverse"style="background: url('{{ route('uploads', $ims['banner-form-email']->content ?? '') }}') repeat; background-size: cover;">
        <div class="flex flex-col justify-center py-[30px] md:py-[51px] w-full md:w-[56.95%] md:px-[4.15%]">
            <p class="font-LexonSemiBold text-[25px] uppercase text-[#530507] text-left">
                {{ $ims['banner_register']->title ?? '' }}</p>
            <div class="font-LexonLight py-[20px] md:pb-[45px]  md:pt-[30px]">
                {!! html_entity_decode($ims['banner_register']->short ?? '') !!}
            </div>
            <form action="{{ route('register.email') }}" class="form-contact-common w-full" method="POST">
                {{ csrf_field() }}
                <p class="error__email font-LexonLight mb-[5px] inline-block h-[12px] text-[12px] italic text-[#530507] max-sm:ml-[80px]">
                </p>
                <div class="flex w-full relative items-center justify-between max-sm:justify-center bg-[#707070] bg-opacity-[0.12] brightness-[-50px]">
                    <button type="button" class="button__submit-email absolute top-0 right-0 flex cursor-pointer items-center h-full pr-[15px]">
                        <span class="font-LexonMedium pr-[10px]">Đăng ký</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="12.716" viewBox="0 0 20 12.716">
                            <path id="Path_134434" data-name="Path 134434"
                                d="M0,6.258c.128-.4.437-.481.813-.481,7.376,0,9.461,0,16.837,0h.369c-.106-.115-.168-.186-.235-.253L13.4,1.132c-.047-.047-.1-.092-.139-.141a.579.579,0,0,1-.019-.822.571.571,0,0,1,.818.007c.056.049.108.1.16.154l5.467,5.476c.408.409.411.688.009,1.091l-5.553,5.564a.592.592,0,0,1-.871.108.548.548,0,0,1-.091-.736,2.244,2.244,0,0,1,.246-.276Q15.612,9.369,17.8,7.182c.062-.062.121-.128.23-.242h-.363c-7.384,0-9.478,0-16.862,0A.761.761,0,0,1,0,6.506Z"
                                fill="#3a3a3a" />
                        </svg>
                    </button>
                    <input required
                            class="pl_email placeholder:font-LexonLight w-full border-transparent focus:border-transparent focus:ring-0 bg-transparent pr-[30%]"
                            type="text" name="email" id="email" placeholder="{{ $ims['global_lang']['pl_email'] ?? '' }}">
                </div>
            </form>
        </div>
        <div class="w-full md:w-[44.05%] image mt-[-30px] aspect-[479/404]">
            <img src="{{ route('uploads', $ims['banner_register']->content ?? '') }}" alt="{{ $ims['banner_register']->title ?? '' }}"
                class="w-full max-w-[479px] rounded-[40px] rounded-bl-none">
        </div>
    </div>

</section>
