@props([
    'selected' => '',
])

<select name="state" id="state" {{ $attributes->merge(['class' => 'browser-default custom-select mb-2']) }}>
    <option value="" disabled selected>Choose State</option>
    <option value="AL" @if ($selected == 'AL') selected @endif>Alabama</option>
    <option value="AK" @if ($selected == 'AK') selected @endif>Alaska</option>
    <option value="AZ" @if ($selected == 'AZ') selected @endif>Arizona</option>
    <option value="AR" @if ($selected == 'AR') selected @endif>Arkansas</option>
    <option value="CA" @if ($selected == 'CA') selected @endif>California</option>
    <option value="CO" @if ($selected == 'CO') selected @endif>Colorado</option>
    <option value="CT" @if ($selected == 'CT') selected @endif>Connecticut</option>
    <option value="DE" @if ($selected == 'DE') selected @endif>Delaware</option>
    <option value="DC" @if ($selected == 'DC') selected @endif>District Of Columbia</option>
    <option value="FL" @if ($selected == 'FL') selected @endif>Florida</option>
    <option value="GA" @if ($selected == 'GA') selected @endif>Georgia</option>
    <option value="HI" @if ($selected == 'HI') selected @endif>Hawaii</option>
    <option value="ID" @if ($selected == 'ID') selected @endif>Idaho</option>
    <option value="IL" @if ($selected == 'IL') selected @endif>Illinois</option>
    <option value="IN" @if ($selected == 'IN') selected @endif>Indiana</option>
    <option value="IA" @if ($selected == 'IA') selected @endif>Iowa</option>
    <option value="KS" @if ($selected == 'KS') selected @endif>Kansas</option>
    <option value="KY" @if ($selected == 'KY') selected @endif>Kentucky</option>
    <option value="LA" @if ($selected == 'LA') selected @endif>Louisiana</option>
    <option value="ME" @if ($selected == 'ME') selected @endif>Maine</option>
    <option value="MD" @if ($selected == 'MD') selected @endif>Maryland</option>
    <option value="MA" @if ($selected == 'MA') selected @endif>Massachusetts</option>
    <option value="MI" @if ($selected == 'MI') selected @endif>Michigan</option>
    <option value="MN" @if ($selected == 'MN') selected @endif>Minnesota</option>
    <option value="MS" @if ($selected == 'MS') selected @endif>Mississippi</option>
    <option value="MO" @if ($selected == 'MO') selected @endif>Missouri</option>
    <option value="MT" @if ($selected == 'MT') selected @endif>Montana</option>
    <option value="NE" @if ($selected == 'NE') selected @endif>Nebraska</option>
    <option value="NV" @if ($selected == 'NV') selected @endif>Nevada</option>
    <option value="NH" @if ($selected == 'NH') selected @endif>New Hampshire</option>
    <option value="NJ" @if ($selected == 'NJ') selected @endif>New Jersey</option>
    <option value="NM" @if ($selected == 'NM') selected @endif>New Mexico</option>
    <option value="NY" @if ($selected == 'NY') selected @endif>New York</option>
    <option value="NC" @if ($selected == 'NC') selected @endif>North Carolina</option>
    <option value="ND" @if ($selected == 'ND') selected @endif>North Dakota</option>
    <option value="OH" @if ($selected == 'OH') selected @endif>Ohio</option>
    <option value="OK" @if ($selected == 'OK') selected @endif>Oklahoma</option>
    <option value="OR" @if ($selected == 'OR') selected @endif>Oregon</option>
    <option value="PA" @if ($selected == 'PA') selected @endif>Pennsylvania</option>
    <option value="RI" @if ($selected == 'RI') selected @endif>Rhode Island</option>
    <option value="SC" @if ($selected == 'SC') selected @endif>South Carolina</option>
    <option value="SD" @if ($selected == 'SD') selected @endif>South Dakota</option>
    <option value="TN" @if ($selected == 'TN') selected @endif>Tennessee</option>
    <option value="TX" @if ($selected == 'TX') selected @endif>Texas</option>
    <option value="UT" @if ($selected == 'UT') selected @endif>Utah</option>
    <option value="VT" @if ($selected == 'VT') selected @endif>Vermont</option>
    <option value="VA" @if ($selected == 'VA') selected @endif>Virginia</option>
    <option value="WA" @if ($selected == 'WA') selected @endif>Washington</option>
    <option value="WV" @if ($selected == 'WV') selected @endif>West Virginia</option>
    <option value="WI" @if ($selected == 'WI') selected @endif>Wisconsin</option>
    <option value="WY" @if ($selected == 'WY') selected @endif>Wyoming</option>
</select>
