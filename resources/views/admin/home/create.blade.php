
@extends('admin.layouts.master')
@section('title', 'Create Page')
@section('breadcrumb', 'Page')
@section('breadcrumb-info', 'Create Page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/home') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.home.form', ['formMode' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');

        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_banner=$('#banner_title_sc');
            let simplified_promotion=$('#promotion_title_sc');
            let simplified_reward=$('#member_reward_title_sc');
            let simplified_cookies_text=$('#cookies_text_sc');

            if (val==1){
                let banner = $('#banner_title_tc').val();
                let promation = $('#promotion_title_tc').val();
                let reward = $('#member_reward_title_tc').val();
                let cookies_text = tinymce.get("cookies_text_tc").getContent({format : 'text'});
                $.ajax({
                    url: "{{ url('/admin/home-auto-translate') }}",
                    data: {'val': val, 'banner': banner, 'promation': promation,'reward': reward,'cookies_text': cookies_text},
                    type: 'get',
                    success: function (response) {
                        response['banner']!==''?simplified_banner.val(response['banner']):alert('Banner title field must be less than 5000 characters')
                        response['promation']!==''?simplified_promotion.val(response['promation']):alert('Promation title field must be less than 5000 characters')
                        response['reward']!==''?simplified_reward.val(response['reward']):alert('Member reward title field must be less than 5000 characters')
                        response['cookies_text']!==''?tinymce.get("cookies_text_sc").setContent(response['cookies_text']):alert('Cookies Text field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_banner.val('')
                simplified_promotion.val('')
                simplified_reward.val('')
                tinymce.get("cookies_text_sc").setContent('')
            }

        });

    </script>
@endpush
