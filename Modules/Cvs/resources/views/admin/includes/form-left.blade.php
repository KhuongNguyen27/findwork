<div class="card">
    <div class="card-header">
        <div class="text-uppercase fw-bold">{{ __('form_profile_information') }}</div>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <label class="mb-3">{{ __('profile_name') }}</label>
            <input type="text" value="{{ old('name') ?? ($item->name ?? '') }}" name="name" placeholder="Tên CV mẫu"
                class="form-control">
            @if ($errors->any())
            <p style="color:red">
                {{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="mb-4">
            <label class="mb-3">{{ __('career') }}</label>
            <select name="career_ids[]" class="form-select select2" multiple="multiple">
                <!-- <option value="" {{ (old('career_ids')) === 'null'? 'selected' : '' }}>
                    {{ __('Left click to select multiple designs') }}
                </option> -->
                @if(isset($item))
                @foreach ($careers as $career)
                <option
                    {{ ($item->careers->pluck('id') !== null && in_array($career->id, $item->careers->pluck('id')->toArray())) ? 'selected' : '' }}
                    value="{{ $career->id }}">
                    {{ $career->name }}
                </option>
                @endforeach
                @else
                @foreach ($careers as $career)
                <option {{ (old('career_ids') !== null && in_array($career->id, old('career_ids'))) ? 'selected' : '' }}
                    value="{{ $career->id }}">
                    {{ $career->name }}
                </option>
                @endforeach
                @endif
            </select>
            @if ($errors->any())
            <p style="color:red">
                {{ $errors->first('career_ids') }}</p>
            @endif
        </div>
        <div class="mb-4">
            <label class="mb-3">Thiết kế</label>
            <select name="style_ids[]" class="form-select select2" multiple="multiple">
                <!-- <option value="" {{ (old('style_ids')) === 'null'? 'selected' : '' }}>
                    {{ __('Left click to select multiple designs') }}
                </option> -->
                @if(isset($item))
                @foreach ($styles as $style)
                <option
                    {{ ($item->styles->pluck('id') !== null && in_array($style->id, $item->styles->pluck('id')->toArray())) ? 'selected' : '' }}
                    value="{{ $style->id }}">
                    {{ $style->name }}
                </option>
                @endforeach
                @else
                @foreach ($styles as $style)
                <option {{ (old('style_ids') !== null && in_array($style->id, old('style_ids'))) ? 'selected' : '' }}
                    value="{{ $style->id }}">
                    {{ $style->name }}
                </option>
                @endforeach
                @endif
            </select>
            @if ($errors->any())
            <p style="color:red">
                {{ $errors->first('style_ids') }}</p>
            @endif
        </div>
        <div class="mb-4">
            <label class="mb-3">{{ __('language') }}</label>
            <select name="language" class="form-control">
                <option value="" {{ old('language') === 'null' ? 'selected' : ''}}>{{ __('select_language') }}</option>
                <option value="1"
                    {{ isset($item) && $item->language == "1" ? 'selected' : (old('language') == "1" ? 'selected' : ''  ) }}>
                    {{ __('vietnamese') }}
                </option>
                <option value="3"
                    {{ isset($item) && $item->language == "3" ? 'selected' : (old('language') == "3" ? 'selected' : "") }}>
                    {{ __('english') }}
                </option>
                <option value="2"
                    {{ isset($item) && $item->language == "2"? 'selected' : (old('language') == "2" ? 'selected' : "") }}>
                    {{ __('japanese') }}
                </option>
            </select>
            @if ($errors->any())
            <p style="color:red">
                {{ $errors->first('language') }}</p>
            @endif
        </div>
    </div>
</div>