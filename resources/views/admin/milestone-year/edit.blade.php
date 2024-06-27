@extends('admin.layouts.master')
@section('title', 'Edit MilestoneYear')
@section('breadcrumb', 'MilestoneYear')
@section('breadcrumb-info', 'Edit MilestoneYear')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($milestoneyear, [
                    'method' => 'PATCH',
                    'url' => ['/admin/milestone-year', $milestoneyear->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.milestone-year.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-milestone-img').filemanager('file');
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
                console.log('yes')
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
            else {
                console.log('no')
                simplified_name.forEach(function(value,index){
                    value.val('')
                })
                simplified_content.forEach(function(value,index){
                    value.val('')
                })
            }
        });

    </script>
@endpush



