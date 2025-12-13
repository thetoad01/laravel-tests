@extends('layouts.app')

@section('title', 'Laravel Tests Home')

@section('heads')
<meta name="robots" content="noindex,nofollow">
@endsection

@section('content')
    <div class="mt-3">
        <h1>Welcome Home!</h1>
    </div>

    <p>Question:  Can you route to something.php in Laravel? <a href="/something.php">Click here to find out!</a></p>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                </div><!-- ./col-sm-6 -->

                <div class="col-sm-6 col-xs-12">
                    <div class="list-group">
                        <div class="list-group">
                            <div class="list-group-item active">VIN Decode</div>
                            <a class="list-group-item" href="{{ route('nhtsa.index') }}">NHTSA</a>
                        </div>
                    </div>    
                </div><!-- ./col-sm-6 -->
            </div><!-- ./row -->
        </div><!-- ./card-body -->
    </div><!-- ./card -->
@endsection

@section('scripts')
@endsection
