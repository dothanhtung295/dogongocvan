@extends('Ims::Ims')
@section('title')
    {{ $contact['contact_setting']['contact_meta_title'] ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ $contact['contact_setting']['contact_meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $contact['contact_setting']['contact_meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $contact['setting']['contact_meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $contact['contact_setting']['contact_meta_desc'] ?? '' }}" />
    <meta property="og:url" content={{ Request::url() ?? '' }} />
    <meta property="og:image" content={{ route('uploads', $ims['logo']->content ?? '') }} />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ mix('css/contact.css') }}">
@endsection

@section('content')
    <main class="cursor-default bg-[#FCFCF8]">
        <iframe class="w-full mt-[81px]" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d18601.077084344204!2d106.25051705441136!3d20.233396612174865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zWMOjIEjhuqNpIE1pbmgsIEh1eeG7h24gSOG6o2kgSOG6rXUsIHThu4luaCBOYW0gxJDhu4tuaCwgVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1690518232304!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="container bg-white mt-[-80px] relative">
            <div class="flex pt-[33px] relative max-md:flex-col md:flex-col lg:flex-row">
                <div class="lg:w-[38.67%] pl-[3.55%] pr-[6.63%] w-full">
                    <h3 class="text-[20px] md:text-[30px] text-[#530507] uppercase font-CormorantGaramondBold w-[70%]">{{ $contact['contact_lang']['name_company'] ?? '' }}</h3>
                    <div class="mt-[30px]">
                        <div class="flex items-center font-LexonRegular text-[#7F7F7F]">
                            <svg class="mr-[17px]" xmlns="http://www.w3.org/2000/svg" width="16.506" height="22.38" viewBox="0 0 16.506 22.38">
                                <g id="Group_58636" data-name="Group 58636" transform="translate(0.5 0.5)">
                                    <path id="Exclusion_1" data-name="Exclusion 1"
                                        d="M7.756,21.044v0C7.678,20.951,0,11.806,0,7.652A7.713,7.713,0,0,1,7.756,0a7.709,7.709,0,0,1,7.75,7.652c0,4.184-7.67,13.3-7.748,13.39Zm0-17.57a4.18,4.18,0,1,0,4.235,4.178A4.213,4.213,0,0,0,7.756,3.474Z"
                                        transform="translate(0 0)" fill="#ce4d00" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1" />
                                </g>
                            </svg>
                            Địa chỉ
                        </div>
                        <div class="ml-[33px] text-[17px] font-LexonMedium mt-[10px]">{{ Config('ims.conf.address') }}</div>
                    </div>
                    <div class="mt-[25px]">
                        <div class="flex items-center font-LexonRegular text-[#7F7F7F]">
                            <svg class="mr-[17px]" xmlns="http://www.w3.org/2000/svg" width="15.525" height="15.525" viewBox="0 0 15.525 15.525">
                                <path id="Icon_awesome-phone-alt" data-name="Icon awesome-phone-alt"
                                    d="M15.082,10.971l-3.4-1.455a.728.728,0,0,0-.849.209l-1.5,1.838A11.239,11.239,0,0,1,3.96,6.189L5.8,4.685a.726.726,0,0,0,.209-.849L4.551.44A.733.733,0,0,0,3.718.019L.564.746A.728.728,0,0,0,0,1.456a14.068,14.068,0,0,0,14.07,14.07.728.728,0,0,0,.71-.564l.728-3.154a.737.737,0,0,0-.425-.837Z"
                                    transform="translate(0 0)" fill="#ce4d00" />
                            </svg>
                            Hotline
                        </div>
                        <div class="ml-[33px] text-[17px] font-LexonMedium mt-[10px]">{{ Config('ims.conf.hotline') }}</div>
                    </div>
                    <div class="mt-[25px]">
                        <div class="flex items-center font-LexonRegular text-[#7F7F7F]">
                            <svg class="mr-[17px]" xmlns="http://www.w3.org/2000/svg" width="16.667" height="13.333" viewBox="0 0 16.667 13.333">
                                <path id="Path_2306" data-name="Path 2306"
                                    d="M17,4H3.667A1.664,1.664,0,0,0,2.008,5.667L2,15.667a1.672,1.672,0,0,0,1.667,1.667H17a1.672,1.672,0,0,0,1.667-1.667v-10A1.672,1.672,0,0,0,17,4Zm0,3.333L10.333,11.5,3.667,7.333V5.667l6.667,4.167L17,5.667Z"
                                    transform="translate(-2 -4)" fill="#ce4d00" />
                            </svg>
                            Email:
                        </div>
                        <div class="ml-[33px] text-[17px] font-LexonMedium mt-[10px]">{{ Config('ims.conf.email') }}</div>
                    </div>
                </div>
                <div class="lg:w-[61.33%] md:mr-[30px] max-md:mt-[30px]">
                    <h3 class="text-[#530507] text-[18px] md:text-[25px] max-md:leading-6 leading-[45px] font-LexonSemiBold w-full">
                        {!! html_entity_decode($ims['global_lang']['advise'] ?? '') !!}</h3>

                    <p class="text-[#232323] max-md:mt-[20px] leading-[19px] font-LexonLight">
                        {!! html_entity_decode($ims['global_lang']['message_register'] ?? '') !!}
                    </p>
                    <form action="" method="post" class="form-contact-common mt-5">
                        {{ csrf_field() }}
                        <div class="flex gap-x-[15px] max-md:flex-col md:flex-col lg:flex-row">
                            <div class="flex flex-col lg:w-1/2 w-full justify-center">
                                <span class=" inline-block error-name text-[12px] text-[#ff3c3cef] font-BeVietnamProRegular italic text-left h-[12px] mb-[5px]"></span>
                                <input name="fullname" id="fullname"
                                    class="border border-[#DED9CA] pl-3 py-[12px] text-[#232323] placeholder:text-[#A2A2A2] placeholder:font-LexonLight font-LexonLight text-[15px] leading-[19px]"
                                    type="text" placeholder="{{ $ims['global_lang']['pla_name'] ?? '' }}">
                            </div>
                            <div class="flex flex-col lg:w-1/2 w-full justify-center">
                                <span class="error-phone text-[12px] text-[#ff3c3cef] font-BeVietnamProRegular italic text-left inline-block h-[12px] mb-[5px]"></span>
                                <input name="phone" id="phone"
                                    class="border border-[#DED9CA] pl-3 py-[12px] text-[#232323] placeholder:text-[#A2A2A2] placeholder:font-LexonLight font-LexonLight text-[15px] leading-[19px]"
                                    type="text" placeholder="{{ $ims['global_lang']['pla_phone'] ?? 'Nhập số điện thoại' }}">
                            </div>
                        </div>
                        <div class="w-full">
                            <span class="error-email text-[12px] text-[#ff3c3cef] font-BeVietnamProRegular italic text-left inline-block h-[12px] mb-[5px]"></span>
                            <input name="email" id="email"
                                class="border border-[#DED9CA] w-full pl-3 py-[12px] text-[#232323] placeholder:text-[#A2A2A2] placeholder:font-LexonLight font-LexonLight text-[15px] leading-[19px]"
                                type="text" placeholder="{{ $ims['global_lang']['pla_email'] ?? 'Nhập số địa chỉ' }}">
                        </div>
                        <div class="w-full">
                            <span class="error-content text-[12px] text-[#ff3c3cef] font-BeVietnamProRegular italic text-left inline-block h-[12px] mb-[5px]"></span>
                            <textarea name="content" id="content"
                                class=" w-full border border-[#DED9CA] pl-3 pt-[13px] text-[#232323] placeholder:text-[#A2A2A2] placeholder:font-LexonLight font-LexonLight text-[15px] leading-[19px]" name="content"
                                id="" cols="30" rows="8" placeholder="{{ $ims['global_lang']['pla_content'] ?? '' }}"></textarea>
                        </div>
                        <button type="button" id="send-form-common"
                            class="text-[#ffffff] bg-[#530507] py-[13px] px-[30px] my-[15px] float-right text-[16px] leading-[25px] font-LexonRegular">{{ $ims['global_lang']['send'] ?? '' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script type="module">
            $(function () {
                $('#send-form-common').click(function(e) {
                e.preventDefault();
                var full_name = $('.form-contact-common #fullname').val();
                var phone = $('.form-contact-common #phone').val();
                var email = $('.form-contact-common #email').val();
                var content = $('.form-contact-common #content').val();
                var error = false;
                if (full_name == '') {
                    $('.form-contact-common .error-name').text('Tên không được để trống');
                    error = true;
                    $('.form-contact-common #name').focus();
                } else {
                    var regex_name =
                        /^([a-zA-Z-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i;
                    if (!regex_name.test(full_name)) {
                        $('.form-contact-common .error-name').text(
                            'Họ tên không được chứa số và ký tự đặc biệt.');
                        error = true;
                        $('.form-contact-common #name').focus();
                    }
                    if (full_name.length > 50) {
                        $('.form-contact-common .error-name').text('Tên không được vượt quá 50 ký tự.');
                        error = true;
                        $('.form-contact-common #name').focus();
                    }
                }
                if (phone == '') {
                    $('.form-contact-common .error-phone').text('SDT không được để trống');
                    error = true;
                    $('.form-contact-common #phone').focus();
                }else
                {
                    if (phone.length > 10) {
                        $('.form-contact-common .error-phone').text('SDT chỉ bao gồm 10 số.');
                        error = true;
                        $('.form-contact-common #phone').focus();
                    }
                }
                if (email == '') {
                    $('.form-contact-common .error-email').text('Email không được để trống');
                    error = true;
                    $('.form-contact-common #email').focus();
                } else {
                    var regex_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    if (!regex_email.test(email)) {
                        $('.form-contact-common .error-email').text('Email không đúng định dạng.');
                        error = true;
                        $('.form-contact-common #email').focus();
                    }
                }

                if (content == '') {
                    $('.form-contact-common .error-content').text('Nội dung không được để trống');
                    error = true;
                    $('.form-contact-common #content').focus();
                }
                var regex = /^(0)(3[2-9]|2[0-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}([0-9]?)$/;
                if (!regex.test(phone) && phone.length > 0) {
                    $('.form-contact-common .error-phone').text('SDT sai định dạng');
                    error = true;
                    $('.form-contact-common #phone').focus();
                }
                if (error) {
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: '{{route('contact.form')}}',
                    data: $('.form-contact-common').serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (!response.errors) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            });
            $('.form-contact-common #fullname').keyup((e) => {
                if (e.target.value.length > 0) {
                    $('.form-contact-common .error-name').text("");
                }
            })
            $('.form-contact-common #phone').keyup((e) => {
                if (e.target.value.length > 0) {
                    $('.form-contact-common .error-phone').text("");
                }
                var regex = /^(0)(3[2-9]|2[0-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}([0-9]?)$/;
                if (!regex.test(e.target.value)) {
                    $('.form-contact-common .error-phone').text('SDT sai định dạng');
                    error = true;
                    $('.form-contact-common #phone').focus();
                }else
                {
                    if (e.target.value.length > 10) {
                        $('.form-contact-common .error-phone').text('SDT chỉ bao gồm 10 số.');
                        error = true;
                        $('.form-contact-common #phone').focus();
                    }
                }
            })
            $('.form-contact-common #email').keyup((e) => {
                if (e.target.value.length > 0) {
                    $('.form-contact-common .error-email').text("");
                }
                var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (!regex.test(e.target.value)) {
                    $('.form-contact-common .error-email').text('Email không đúng định dạng');
                    error = true;
                    $('.form-contact-common #email').focus();
                }
            })
            $('.form-contact-common #content').keyup((e) => {
                if (e.target.value.length > 0) {
                    $('.form-contact-common .error-content').text("");
                }
            })
            });
    </script>
@endsection
