@extends('admin.layouts.master')
@section('title', 'Create MilestoneYear')
@section('breadcrumb', 'MilestoneYear')
@section('breadcrumb-info', 'Create MilestoneYear')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/milestone-year') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.milestone-year.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $(document).on('change','#auto_translate',function() {
            let val = $(this).prop('checked') ? '1' : '0';
            let name    =   [];
            let content =   [];
            let simplified_name = [];
            let simplified_content = [];

            for (let i = 0; i < 100; i++) {
                name.push($(`#name${i}_tc`).val())
                content.push($(`#content${i}_tc`).val())

                simplified_name.push($(`#name${i}_sc`))
                simplified_content.push($(`#content${i}_sc`))
            }
                if (val == 1) {
                    $.ajax({
                        url: "{{ url('/admin/milestone-year-auto-translate') }}",
                        data: {'val': val, 'name': name,'con':content},
                        type: 'get',
                        success: function (response) {
                            console.log(response)
                            response['name'].forEach(function(value,index){
                                {
                                    value !== '' ? simplified_name[index].val(value) : alert('Name field must be less than 5000 characters')
                                }
                            })
                            response['content'].forEach(function(value,index){
                                {
                                    value !== '' ? simplified_content[index].val(value) : alert('Content field must be less than 5000 characters')
                                }
                            })
                        }
                    });
                }
                // else {
                //     simplified_name.val('')
                // }
        });
    </script>
@endpush


