@extends('Ims::Ims')
@section('title')
    {{ $post['detail']['title'] ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ $post['detail']['meta_desc'] ?? '' }}" />
    <meta name="keywords" content="{{ $post['detail']['meta_key'] ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" name="title" content="{{ $post['detail']['meta_title'] ?? '' }}" />
    <meta property="og:description" content="{{ $post['detail']['meta_desc'] ?? '' }}" />
    <meta property="og:url" content="{{ $ims['url'] ?? '' }}" />
    <meta property="og:image" content="{{ route('uploads', $ims['logo']->content ?? '') }}" />
@endsection

@section('content')

<main class="cursor-default bg-[#FCFCF8]">
    @include('Ims::Component.Banner')
    <div class="container mt-[81px] mb-[40px]">
        <h3 class="title font-LexonBold text-[18px] md:text-[25px] text-[#530507] text-center uppercase">{{$post['detail']->title ?? ''}}</h3>
        <div class="mt-[30px]">
            {!! html_entity_decode($post['detail']->content ?? '') !!}
        </div>
    </div>
</main>
@endsection

@section('css')
    <style>
        @media screen and (max-width: 567px) {

            .box__content p,
            .box__content span {

                font-size: 14px !important;
            }
        }

        tbody tr:nth-child(even) {
            background-color: #E6F6FF;
        }

        .box__content p,
        .box__content span {
            font-family: InterRegular !important;
        }
    </style>
@endsection
