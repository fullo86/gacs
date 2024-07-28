@extends('layouts.main')
@section('title', 'GenieAscBot | Telegram BOT')

@section('bot-commands-page')
<style>
    .grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 10px;
}

.grid-item {
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.button-container {
    display: flex;
    width: 100%;
    gap: 10px; 
}

.button-container .btn {
    flex: 1; 
    width: 100%; 
}
</style>

<div class="col-xl-12 col-sm-12 col-12">
    <div class="card mb-3">
        <h1 class="text-center my-3">BOT Command Settings</h1>
            <div class="card-body">
                <div class="grid-container">
                    @foreach ($list_cmd->botcmd as $value)
                    {{-- <form action="{{ route('update-cmd', $value->pivot->bot_id) }}" method="post" id="form-{{ $value->id }}" class="status-form">
                        @method('PUT')
                        @csrf             --}}
                        <div class="grid-item">
                            <div class="form-check">
                                <input class="form-check-input" name="{{ $value->pivot->id }}" type="checkbox" value="{{ $value->pivot->id }}"  id="flexCheck{{ $value->id }}" @if($value->pivot->status == 'active') @checked(true) @endif>
                                <label class="form-check-label" for="flexCheck{{ $value->pivot->id }}">{{ $value->description_en }}</label>
                            </div>
                        </div>
                    {{-- </form> --}}
                    @endforeach                
                </div>
            </div>
    </div>
</div>

{{-- <div class="text-center mt-3 px-5 py-4">
    <div class="button-container">
        <button class="btn btn-secondary btn-md" type="button">Cancel</button>
        <button class="btn btn-primary btn-md" type="submit">Update Settings</button>
    </div>
</div>             --}}

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').on('change', function() {
            var checkbox = $(this);
            var formId = 'form-' + checkbox.val(); // Mengambil ID form berdasarkan nilai checkbox
            var form = $('#' + formId);

            // Mengirim data menggunakan AJAX
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        alert('Status updated successfully');
                    } else {
                        alert('Failed to update status');
                    }
                },
                error: function() {
                    alert('An error occurred');
                }
            });
        });
    });
</script> --}}


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua elemen checkbox
        document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Ambil id dari checkbox yang diklik
                const checkboxId = this.id;
                // Ambil form terkait berdasarkan id checkbox
                const form = document.querySelector(`#form-${checkboxId.replace('flexCheck', '')}`);
                
                if (form) {
                    // Kirim form
                    form.submit();
                }
            });
        });
    });
    </script>    
@endsection