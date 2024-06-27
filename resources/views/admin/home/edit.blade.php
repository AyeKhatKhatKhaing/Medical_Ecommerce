@extends('admin.layouts.master')
@section('title', 'Edit Page')
@section('breadcrumb', 'Page')
@section('breadcrumb-info', 'Edit Page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($home, [
                    'method' => 'POST',
                    'url' => ['/admin/home'],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.home.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // $(function() {
        //     $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        //         localStorage.setItem('lastTab', $(this).attr('href'));
        //     });

        //     var lastTab = localStorage.getItem('lastTab');
        //     if (lastTab) {
        //         $('[href="' + lastTab + '"]').tab('show');
        //     }
        // });

        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');
        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_banner=$('#onsale_banner_title_sc');
            let simplified_promotion=$('#promotion_title_sc');
            let simplified_reward=$('#member_reward_title_sc');
            let simplified_cookies_text=$('#cookies_text_sc');

            if (val==1){
                let banner = $('#onsale_banner_title_tc').val();
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

        function homeremoveImage(col,key,id){

            $.ajax({
                url: "{{ url('/admin/home/homeRemoveImage') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data: {'col':col,'key': key ,'id':id},
                success: function(response) {
                    location.reload(true);
                }
            })
        }

    </script>
@endpush
