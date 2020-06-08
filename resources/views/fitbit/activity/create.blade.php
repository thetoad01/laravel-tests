@extends('layouts.app')

@section('title', 'Add Fitbit Data')

@section('content')
<div class="container my-4">
    <h1 class="mb-3">Add Fitbit Activity Data</h1>

    <form action="{{ route('fitbit.activity.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        @error('file')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="input-group">
            <button type="submit" class="btn btn-sm btn-success">Upload</button>
        </div>
    </form>

    <div class="card my-5">
        <div class="card-header">How to get CSV file</div>

        <div class="card-body">
            <ol>
                <li>Log into fitbit.com</li>
                <li>Click on the gear (usually in upper right).</li>
                <li>Click on the device to get the data from.</li>
                <li>On the right hand menu click on "Data Export"</li>
                <li>Under "Time Period" select one period.</li>
                <li>
                    <span class="text-danger">Important:</span>
                    Under "Include Data" make sure that "Activities" is the only box checked.
                </li>
                <li>Under "File Format" select CSV (default).</li>
                <li>Click the "Download"button.</li>
                <li>Select the file using "Browse" above and click the upload button.</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endsection