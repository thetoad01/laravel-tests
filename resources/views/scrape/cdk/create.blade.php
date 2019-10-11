@extends('layouts.app')

@section('title', 'Add CDK Website to Scrape')

@section('content')
    <h1 class="text-center">Add CDK Website to Scrape</h1>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="/scrape/cdk" method="POST">
                    @csrf
                    <div class="md-form">
                        <input type="text" class="form-control {{ $errors->has('sitemap_url') ? 'border-danger' : '' }}" id="sitemap_url" name="sitemap_url" value="{{ old('sitemap_url') }}">
                        <label for="sitemap_url">Sitemap URL</label>
                    </div>

                    <select name="state" id="state" class="mdb-select md-form">
                        <option value="" disabled selected>Choose State</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>

                    @if ($errors->all())
                        <ul class="list-unstyled alert alert-danger">
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <button type="submit" class="btn btn-sm btn-success">Add Sitemap</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
// Material Select Initialization
$(document).ready(function() {
    $('.mdb-select').materialSelect();
});
</script>    
@endsection
