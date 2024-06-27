@extends('admin.layouts.master')
@section('title', 'Create Faq')
@section('breadcrumb', 'Faq')
@section('breadcrumb-info', 'Create Faq')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/faq') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.faq.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_name=$('#name_sc');
            if (val==1){
                let name = $('#name_tc').val();
                let content = tinymce.get("content_tc").getContent({format : 'text'});
                $.ajax({
                    url: "{{ url('/admin/faq-auto-translate') }}",
                    data: {'val': val, 'name': name,'cont':content},
                    type: 'get',
                    success: function (response) {
                        response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                        response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_name.val('')
                tinymce.get("content_sc").setContent('')
            }

        });

    </script>
    <script>
      $('.category_id').click(function() {
        var cval = $(this).val();
        if (cval == 2) {
            $('.control-label-dose').html('Number Of Dose');
            $('.number_of_dose').attr('hidden',false)
        } else {
            $('.control-label-dose').html('Number Of Item');
            $('.number_of_dose').attr('hidden',false)
        }
        $('.sub_category_id').prop('checked', false);
        var subCategories = <?= json_encode($subCategories) ?>;
        subCategories.forEach(function(item, key) {
            if (cval == item.category_id) {
                $('#sub_category_id' + item.id).removeAttr('disabled');
            } else {
                $('#sub_category_id' + item.id).prop("disabled", true);
            }
        })
    });
</script>
@endpush


